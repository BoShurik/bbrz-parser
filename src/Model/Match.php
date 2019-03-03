<?php
/**
 * User: boshurik
 * Date: 21.08.16
 * Time: 12:17
 */

namespace BoShurik\BloodBowl\Replay\Model;

final class Match
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dateTime;

    /**
     * @var Team
     */
    private $homeTeam;

    /**
     * @var Team
     */
    private $awayTeam;

    /**
     * @var Competition
     */
    private $competition;

    public function __construct(string $id, \DateTime $dateTime, Team $homeTeam, Team $awayTeam, Competition $competition)
    {
        $this->id = $id;
        $this->dateTime = $dateTime;
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->competition = $competition;
    }

    public function __toString()
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function hasWinner(): bool
    {
        return $this->homeTeam->getStatistic()->getScore() != $this->awayTeam->getStatistic()->getScore();
    }

    /**
     * @return Team|null
     */
    public function getWinner(): ?Team
    {
        if (!$this->hasWinner()) {
            return null;
        }

        return $this->homeTeam->getStatistic()->getScore() > $this->awayTeam->getStatistic()->getScore()
            ? $this->homeTeam
            : $this->awayTeam
        ;
    }

    /**
     * @return Team|null
     */
    public function getLoser(): ?Team
    {
        if (!$this->hasWinner()) {
            return null;
        }

        return $this->homeTeam->getStatistic()->getScore() > $this->awayTeam->getStatistic()->getScore()
            ? $this->awayTeam
            : $this->homeTeam
        ;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    /**
     * @return Team
     */
    public function getHomeTeam(): Team
    {
        return $this->homeTeam;
    }

    /**
     * @return Team
     */
    public function getAwayTeam(): Team
    {
        return $this->awayTeam;
    }

    /**
     * @return Competition
     */
    public function getCompetition(): Competition
    {
        return $this->competition;
    }
}