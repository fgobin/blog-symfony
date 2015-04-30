<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 12.04.15.
 * Time: 10:51
 */

namespace Blogger\CommandsBundle\Command;

use Blogger\CommandsBundle\Entity\Player;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TennisRankingCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('tennis:check')
            ->setDescription('Check tennis ranking')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'Path to the xlsx file with tennis rankings'
            )
            ->addOption(
                'drop-old',
                null,
                InputOption::VALUE_NONE,
                'Drop old data in database and replace it with new'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fileName = $input->getArgument('file');
        $output->writeln($fileName);
        $phpExcelObject =  $this->getApplication()->getKernel()->getContainer()->get('phpexcel')->createPHPExcelObject($fileName);
        //change active sheet
        $phpExcelObject->setActiveSheetIndex(0);
        $activeSheet = $phpExcelObject->getActiveSheet();

        //number of rows and collumns
        $rowCount = intval($activeSheet->getHighestDataRow());
        //$colCount = $activeSheet->getHighestDataColumn();

        /**
         * DEFINE CONSTANTS
         */
        /*
         * COLLUMN NAMES
         */
        $rankColumn = 'A';
        $nameColumn = 'B';
        $countryColumn = 'D';
        $birthDateColumn = 'E';
        $pointsColumn = 'F';
        $currentTournamentColumn = 'O';
        $countryRanking = 'M';
        $currentRound = 'N';
        $pp_R32 = 'Z';
        $pp_R16 = 'AA';
        $pp_QF = 'AB';
        $pp_SF = 'AC';
        $pp_F = 'AD';
        $pp_W = 'AE';

        //margin of table (where data starts)
        $tableMargin = 6;

        //get entity manager
        $em = $this->getContainer()->get('doctrine')->getManager();

        //parse options
        if ($input->getOption('drop-old')) {
            $output->writeln("DELETING PLAYERS FROM DATABASE");

            $rsm = new ResultSetMapping();
            $query = $em->createNativeQuery('delete from player;', $rsm);
            $query->getResult();
        }

        $output->writeln("PARSING PLAYERS FROM EXCEL FILE");
        for ($i = $tableMargin; $i <= $rowCount; $i = $i + 1) {

            $activeCell = $nameColumn . "$i";
            $playerName = $activeSheet->getCell($activeCell)->getValue();

            $savedPlayer = $em->getRepository('BloggerCommandsBundle:Player')->findOneBy(array('name' => $playerName));

            if($savedPlayer == null) {
                $savedPlayer = new Player();
                $savedPlayer->setName($playerName);
            }

            $activeCell = $rankColumn . "$i";
            $savedPlayer->setRank(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $countryColumn . "$i";
            $savedPlayer->setCountry($activeSheet->getCell($activeCell)->getValue());

            $activeCell = $birthDateColumn . "$i";
            $savedPlayer->setBirthDate($activeSheet->getCell($activeCell)->getFormattedValue());

            $activeCell = $pointsColumn . "$i";
            $savedPlayer->setPoints(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $currentTournamentColumn . "$i";
            $savedPlayer->setCurrentTournament($activeSheet->getCell($activeCell)->getValue());

            $activeCell = $countryRanking . "$i";
            $savedPlayer->setCountryRanking(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $currentRound . "$i";
            $savedPlayer->setCurrentRound($activeSheet->getCell($activeCell)->getValue());

            //add point prediction
            $activeCell = $pp_R32 . "$i";
            $savedPlayer->setPpR32(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $pp_R16 . "$i";
            $savedPlayer->setPpR16(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $pp_QF . "$i";
            $savedPlayer->setPpQF(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $pp_SF . "$i";
            $savedPlayer->setPpSF(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $pp_F . "$i";
            $savedPlayer->setPpF(intval($activeSheet->getCell($activeCell)->getValue()));

            $activeCell = $pp_W . "$i";
            $savedPlayer->setPpW(intval($activeSheet->getCell($activeCell)->getValue()));

            $em->persist($savedPlayer);

        }
        $em->flush();
    }
}