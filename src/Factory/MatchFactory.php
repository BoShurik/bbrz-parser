<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:11
 */

namespace BoShurik\BloodBowl\Replay\Factory;

use BoShurik\BloodBowl\Replay\Model\Match;

class MatchFactory
{
    /**
     * @var TeamsFactory
     */
    private $teamsFactory;

    /**
     * @var CompetitionFactory
     */
    private $competitionFactory;

    public static function build(): self
    {
        return new self(TeamsFactory::build(), CompetitionFactory::build());
    }

    public function __construct(TeamsFactory $teamsFactory, CompetitionFactory $competitionFactory)
    {
        $this->teamsFactory = $teamsFactory;
        $this->competitionFactory = $competitionFactory;
    }

    public function create(\SimpleXMLElement $xml): Match
    {
        $gameInfo = $xml->xpath('/Replay/ReplayStep[1]/GameInfos');
        $gameInfo = current($gameInfo);

        $resultRow = $xml->xpath('/Replay/ReplayStep[last()]/RulesEventGameFinished/MatchResult/Row[1]');
        $resultRow = current($resultRow);

        list($homeTeam, $awayTeam) = $this->teamsFactory->create($xml);

        return new Match(
            (string)$gameInfo->Id,
            new \DateTime((string)$resultRow->Finished, new \DateTimeZone('UTC')),
            $homeTeam,
            $awayTeam,
            $this->competitionFactory->create($gameInfo)
        );
    }
}