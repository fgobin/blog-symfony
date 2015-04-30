<?php

namespace Blogger\CommandsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Blogger\CommandsBundle\Entity\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="rank", type="integer", nullable=true)
     */
    private $rank;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="birthDate", type="string", length=255, nullable=true)
     */
    private $birthDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer", nullable=true)
     */
    private $points;

    /**
     * @var string
     *
     * @ORM\Column(name="currentTournament", type="string", length=255, nullable=true)
     */
    private $currentTournament;

    /**
     * @var string
     *
     * @ORM\Column(name="currentRound", type="string", length=255, nullable=true)
     */
    private $currentRound;

    /**
     * @var integer
     *
     * @ORM\Column(name="countryRanking", type="integer", length=255, nullable=true)
     */
    private $countryRanking;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_r32", type="integer", length=255, nullable=true)
     */
    private $pp_R32;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_r16", type="integer", length=255, nullable=true)
     */
    private $pp_R16;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_qf", type="integer", length=255, nullable=true)
     */
    private $pp_QF;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_sf", type="integer", length=255, nullable=true)
     */
    private $pp_SF;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_f", type="integer", length=255, nullable=true)
     */
    private $pp_F;

    /**
     * @var integer
     *
     * @ORM\Column(name="pp_w", type="integer", length=255, nullable=true)
     */
    private $pp_W;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rank
     *
     * @param integer $rank
     * @return Player
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Player
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Player
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set birthDate
     *
     * @param string $birthDate
     * @return Player
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return string 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Player
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set currentTournament
     *
     * @param string $currentTournament
     * @return Player
     */
    public function setCurrentTournament($currentTournament)
    {
        $this->currentTournament = $currentTournament;

        return $this;
    }

    /**
     * Get currentTournament
     *
     * @return string 
     */
    public function getCurrentTournament()
    {
        return $this->currentTournament;
    }

    /**
     * Set currentRound
     *
     * @param string $currentRound
     * @return Player
     */
    public function setCurrentRound($currentRound)
    {
        $this->currentRound = $currentRound;

        return $this;
    }

    /**
     * Get currentRound
     *
     * @return string 
     */
    public function getCurrentRound()
    {
        return $this->currentRound;
    }

    /**
     * Set countryRanking
     *
     * @param integer $countryRanking
     * @return Player
     */
    public function setCountryRanking($countryRanking)
    {
        $this->countryRanking = $countryRanking;

        return $this;
    }

    /**
     * Get countryRanking
     *
     * @return integer 
     */
    public function getCountryRanking()
    {
        return $this->countryRanking;
    }

    /**
     * Set pp_R32
     *
     * @param integer $ppR32
     * @return Player
     */
    public function setPpR32($ppR32)
    {
        $this->pp_R32 = $ppR32;

        return $this;
    }

    /**
     * Get pp_R32
     *
     * @return integer 
     */
    public function getPpR32()
    {
        return $this->pp_R32;
    }

    /**
     * Set pp_R16
     *
     * @param integer $ppR16
     * @return Player
     */
    public function setPpR16($ppR16)
    {
        $this->pp_R16 = $ppR16;

        return $this;
    }

    /**
     * Get pp_R16
     *
     * @return integer 
     */
    public function getPpR16()
    {
        return $this->pp_R16;
    }

    /**
     * Set pp_QF
     *
     * @param integer $ppQF
     * @return Player
     */
    public function setPpQF($ppQF)
    {
        $this->pp_QF = $ppQF;

        return $this;
    }

    /**
     * Get pp_QF
     *
     * @return integer 
     */
    public function getPpQF()
    {
        return $this->pp_QF;
    }

    /**
     * Set pp_SF
     *
     * @param integer $ppSF
     * @return Player
     */
    public function setPpSF($ppSF)
    {
        $this->pp_SF = $ppSF;

        return $this;
    }

    /**
     * Get pp_SF
     *
     * @return integer 
     */
    public function getPpSF()
    {
        return $this->pp_SF;
    }

    /**
     * Set pp_F
     *
     * @param integer $ppF
     * @return Player
     */
    public function setPpF($ppF)
    {
        $this->pp_F = $ppF;

        return $this;
    }

    /**
     * Get pp_F
     *
     * @return integer 
     */
    public function getPpF()
    {
        return $this->pp_F;
    }

    /**
     * Set pp_W
     *
     * @param integer $ppW
     * @return Player
     */
    public function setPpW($ppW)
    {
        $this->pp_W = $ppW;

        return $this;
    }

    /**
     * Get pp_W
     *
     * @return integer 
     */
    public function getPpW()
    {
        return $this->pp_W;
    }
}
