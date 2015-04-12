<?php
/**
 * Created by PhpStorm.
 * User: filip
 * Date: 12.04.15.
 * Time: 10:51
 */

namespace Blogger\CommandsBundle\Command;

use Blogger\CommandsBundle\Entity\Player;
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
        $colCount = $activeSheet->getHighestDataColumn();
        //$output->writeln($rowCount);
        //$output->writeln($colCount);

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

        //margin of table (where data starts)
        $tableMargin = 6;

        $output->writeln("PARSING PLAYERS FROM XML FILE");

        //get entity manager
        $em = $this->getContainer()->get('doctrine')->getManager();

        for ($i = $tableMargin; $i <= $rowCount; $i = $i + 1) {

            $activeCell = $nameColumn . "$i";
            $playerName = $activeSheet->getCell($activeCell)->getValue();

            $savedPlayer = $em->getRepository('BloggerCommandsBundle:Player')->findOneBy(array('name' => $playerName));

            if($savedPlayer == null) {
                $player = new Player();
                $player->setName($playerName);

                $activeCell = $rankColumn . "$i";
                $player->setRank(intval($activeSheet->getCell($activeCell)->getValue()));

                $activeCell = $countryColumn . "$i";
                $player->setCountry($activeSheet->getCell($activeCell)->getValue());

                $activeCell = $birthDateColumn . "$i";
                $player->setBirthDate($activeSheet->getCell($activeCell)->getFormattedValue());

                $activeCell = $pointsColumn . "$i";
                $player->setPoints(intval($activeSheet->getCell($activeCell)->getValue()));

                $activeCell = $currentTournamentColumn . "$i";
                $player->setCurrentTournament($activeSheet->getCell($activeCell)->getValue());

                $em->persist($player);
                $em->flush();

            } else {
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

                $em->persist($savedPlayer);
                $em->flush();
            }
        }

    }
}