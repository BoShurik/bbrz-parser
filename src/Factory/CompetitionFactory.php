<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:20
 */

namespace BoShurik\BloodBowl\Replay\Factory;

use BoShurik\BloodBowl\Replay\Model\Competition;

class CompetitionFactory
{
    /**
     * @var LeagueFactory
     */
    private $leagueFactory;

    public static function build(): self
    {
        return new self(LeagueFactory::build());
    }

    public function __construct(LeagueFactory $leagueFactory)
    {
        $this->leagueFactory = $leagueFactory;
    }

    public function create(\SimpleXMLElement $gameInfoXml): Competition
    {
        return new Competition(
            $this->leagueFactory->create($gameInfoXml),
            (string)$gameInfoXml->RowCompetition->Id->Value,
            (string)$gameInfoXml->RowCompetition->Name
        );
    }
}