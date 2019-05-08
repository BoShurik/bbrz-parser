<?php
/**
 * User: boshurik
 * Date: 2019-05-13
 * Time: 18:59
 */

namespace BoShurik\BloodBowl\Replay\Factory;

use BoShurik\BloodBowl\Replay\Model\Player\Player;

class RosterFactory
{
    /**
     * @var PlayerFactory
     */
    private $playerFactory;

    public static function build(): self
    {
        return new self(PlayerFactory::build());
    }

    public function __construct(PlayerFactory $playerFactory)
    {
        $this->playerFactory = $playerFactory;
    }

    public function create(\SimpleXMLElement $xml): array
    {
        $createPlayerCallback = function(\SimpleXMLElement $element){
            return $this->playerFactory->create($element);
        };

        list($homeTeamData, $awayTeamData) = $xml->xpath('/Replay/ReplayStep[last()]/RulesEventGameFinished/MatchResult/CoachResults/CoachResult/TeamResult/PlayerResults');

        $homeTeamRoster = array_map($createPlayerCallback, iterator_to_array($homeTeamData, false));
        $awayTeamRoster = array_map($createPlayerCallback, iterator_to_array($awayTeamData, false));

        $this->sortPlayers($homeTeamRoster);
        $this->sortPlayers($awayTeamRoster);

        return [$homeTeamRoster, $awayTeamRoster];
    }

    /**
     * @param $players
     */
    private function sortPlayers(&$players)
    {
        usort($players, function(Player $a, Player $b){
            return $a->getNumber() <=> $b->getNumber();
        });
    }
}