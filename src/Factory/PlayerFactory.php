<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:35
 */

namespace BoShurik\BloodBowl\Replay\Factory;

use BoShurik\BloodBowl\Replay\Factory\Statistic\PlayerStatisticFactory;
use BoShurik\BloodBowl\Replay\Model\Player\Casualty;
use BoShurik\BloodBowl\Replay\Model\Player\Player;
use BoShurik\BloodBowl\Replay\Model\Player\Skill;
use BoShurik\BloodBowl\Replay\Model\Player\Type;

class PlayerFactory
{
    /**
     * @var PlayerStatisticFactory
     */
    private $playerStatisticFactory;

    public static function build(): self
    {
        return new self(PlayerStatisticFactory::build());
    }

    public function __construct(PlayerStatisticFactory $playerStatisticFactory)
    {
        $this->playerStatisticFactory = $playerStatisticFactory;
    }

    public function create(\SimpleXMLElement $element): Player
    {
        $player = $this->createPlayer($element->PlayerData, (integer)$element->Xp, (integer)$element->Casualty1, (integer)$element->Casualty2);
        $player->setStatistic($this->playerStatisticFactory->create($element->Statistics));

        return $player;
    }

    /**
     * @param \SimpleXMLElement $element
     * @param null $experience
     * @param null $casualty1
     * @param null $casualty2
     * @return Player
     */
    private function createPlayer(\SimpleXMLElement $element, $experience = null, $casualty1 = null, $casualty2 = null)
    {
        $skills = array_map(function($id) {
            if (empty($id)) {
                return null;
            }
            return new Skill((integer)$id);
        }, explode(',', trim((string)$element->ListSkills, "()")));

        $casualties = array_map(function($id) {
            if (empty($id)) {
                return null;
            }
            return new Casualty((integer)$id);
        }, explode(',', trim((string)$element->ListCasualties, "()")));

        $journeyman = (boolean)$element->Contract;

        $gainedCasualties = array();
        if ($casualty1) {
            $gainedCasualties[] = new Casualty($casualty1);
        }
        if ($casualty2) {
            $gainedCasualties[] = new Casualty($casualty2);
        }

        return new Player(
            (string)$element->LobbyId,
            (integer)$element->Number,
            new Type((integer)$element->IdPlayerTypes),
            (string)$element->Name,
            (integer)$element->Ma,
            (integer)$element->St,
            (integer)$element->Ag,
            (integer)$element->Av,
            (integer)$element->Level,
            (integer)$element->Experience,
            array_filter($skills),
            array_filter($casualties),
            $journeyman,
            $experience,
            $gainedCasualties
        );
    }
}