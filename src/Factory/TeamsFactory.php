<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:27
 */

namespace BoShurik\BloodBowl\Replay\Factory;

use BoShurik\BloodBowl\Replay\Factory\Statistic\StatisticFactory;
use BoShurik\BloodBowl\Replay\Model\Race;
use BoShurik\BloodBowl\Replay\Model\Team;

class TeamsFactory
{
    /**
     * @var CoachFactory
     */
    private $coachFactory;

    /**
     * @var RosterFactory
     */
    private $rosterFactory;

    /**
     * @var StatisticFactory
     */
    private $statisticFactory;

    public static function build(): self
    {
        return new self(CoachFactory::build(), RosterFactory::build(), StatisticFactory::build());
    }

    public function __construct(CoachFactory $coachFactory, RosterFactory $rosterFactory, StatisticFactory $statisticFactory)
    {
        $this->coachFactory = $coachFactory;
        $this->rosterFactory = $rosterFactory;
        $this->statisticFactory = $statisticFactory;
    }

    public function create(\SimpleXMLElement $xml): array
    {
        $races = $xml->xpath('/Replay/ReplayStep[1]/BoardState/ListTeams/TeamState/Data/IdRace');
        list($homeRace, $awayRace) = $races;

        $resultRow = $xml->xpath('/Replay/ReplayStep[last()]/RulesEventGameFinished/MatchResult/Row[1]');
        $resultRow = current($resultRow);

        list($homeTeamRoster, $awayTeamRoster) = $this->rosterFactory->create($xml);
        list($homeTeamConceded, $awayTeamConceded) = $this->parseConceded($resultRow);

        $homeTeam = new Team(
            (string)$resultRow->ShardedIdTeamListingHome->Value,
            (string)$resultRow->TeamHomeName,
            new Race((integer)$homeRace),
            $this->coachFactory->create($resultRow, 'Home'),
            $this->statisticFactory->create($resultRow, 'Home'),
            $homeTeamRoster,
            $homeTeamConceded
        );
        $awayTeam = new Team(
            (string)$resultRow->ShardedIdTeamListingAway->Value,
            (string)$resultRow->TeamAwayName,
            new Race((integer)$awayRace),
            $this->coachFactory->create($resultRow, 'Away'),
            $this->statisticFactory->create($resultRow, 'Away'),
            $awayTeamRoster,
            $awayTeamConceded
        );

        return [$homeTeam, $awayTeam];
    }

    /**
     * @param \SimpleXMLElement $resultRow
     * @return array
     */
    private function parseConceded(\SimpleXMLElement $resultRow)
    {
        $homeTeamConceded = $awayTeamConceded = false;
        if ((integer)$resultRow->HomeMVP > 1) {
            $awayTeamConceded = true;
        } else if ((integer)$resultRow->AwayMVP > 1) {
            $homeTeamConceded = true;
        }

        return array($homeTeamConceded, $awayTeamConceded);
    }
}