<?php
/**
 * User: boshurik
 * Date: 05.09.17
 * Time: 19:06
 */

namespace BoShurik\BloodBowl\Replay\Parser;

use BoShurik\BloodBowl\Replay\Model\Coach;
use BoShurik\BloodBowl\Replay\Model\Competition;
use BoShurik\BloodBowl\Replay\Model\League;
use BoShurik\BloodBowl\Replay\Model\Match;
use BoShurik\BloodBowl\Replay\Model\Player\Casualty;
use BoShurik\BloodBowl\Replay\Model\Player\Player;
use BoShurik\BloodBowl\Replay\Model\Player\Skill;
use BoShurik\BloodBowl\Replay\Model\Player\Type;
use BoShurik\BloodBowl\Replay\Model\Race;
use BoShurik\BloodBowl\Replay\Model\Statistic\BallStatistic;
use BoShurik\BloodBowl\Replay\Model\Statistic\PossessionStatistic;
use BoShurik\BloodBowl\Replay\Model\Statistic\Statistic;
use BoShurik\BloodBowl\Replay\Model\Statistic\PlayerStatistic as PlayerStatistic;
use BoShurik\BloodBowl\Replay\Model\Statistic\TacklesStatistic;
use BoShurik\BloodBowl\Replay\Model\Statistic\WinningsStatistic;
use BoShurik\BloodBowl\Replay\Model\Team;

class OriginalParser implements ParserInterface
{
    /**
     * @inheritdoc
     */
    public function parse(\SimpleXMLElement $xml)
    {
        $gameInfo = $xml->xpath('/Replay/ReplayStep[1]/GameInfos');
        $gameInfo = current($gameInfo);

        $id = (string)$gameInfo->Id;

        $races = $xml->xpath('/Replay/ReplayStep[1]/BoardState/ListTeams/TeamState/Data/IdRace');
        list($homeRace, $awayRace) = $races;

        $league = new League((string)$gameInfo->RowLeague->Id->Value, (string)$gameInfo->RowLeague->Name);
        $competition = new Competition($league, (string)$gameInfo->RowCompetition->Id->Value, (string)$gameInfo->RowCompetition->Name);

        $resultRow = $xml->xpath('/Replay/ReplayStep[last()]/RulesEventGameFinished/MatchResult/Row[1]');
        $resultRow = current($resultRow);

        $homeCoach = new Coach((string)$resultRow->CoachHomeName);
        $awayCoach = new Coach((string)$resultRow->CoachAwayName);

        list($homeTeamStatistic, $awayTeamStatistic) = $this->parseStatistic($resultRow);
        list($homeTeamRoster, $awayTeamRoster) = $this->parseRoster($xml);
        list($homeTeamConceded, $awayTeamConceded) = $this->parseConceded($resultRow);

        $homeTeam = new Team(
            (string)$resultRow->TeamHomeName,
            new Race((integer)$homeRace),
            $homeCoach,
            $homeTeamStatistic,
            $homeTeamRoster,
            $homeTeamConceded
        );
        $awayTeam = new Team(
            (string)$resultRow->TeamAwayName,
            new Race((integer)$awayRace),
            $awayCoach,
            $awayTeamStatistic,
            $awayTeamRoster,
            $awayTeamConceded
        );

        return new Match(
            $id,
            new \DateTime((string)$resultRow->Finished, new \DateTimeZone('UTC')),
            $homeTeam,
            $awayTeam,
            $competition
        );
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

    /**
     * @param \SimpleXMLElement $resultRow
     * @return array
     */
    private function parseStatistic(\SimpleXMLElement $resultRow)
    {
        return array(
            $this->createStatistic($resultRow, 'Home'),
            $this->createStatistic($resultRow, 'Away'),
        );
    }

    /**
     * @param \SimpleXMLElement $resultRow
     * @param string $prefix
     * @return Statistic
     */
    private function createStatistic(\SimpleXMLElement $resultRow, $prefix)
    {
        return new Statistic(
            (integer)$resultRow->{$prefix . 'Score'},
            (integer)$resultRow->{$prefix . 'Value'},
            $this->createWinningsStatistic($resultRow, $prefix),
            $this->createTacklesStatistic($resultRow, $prefix),
            $this->createBallStatistic($resultRow, $prefix),
            $this->createPossessionStatistic($resultRow, $prefix)
        );
    }

    /**
     * @param \SimpleXMLElement $resultRow
     * @param string $prefix
     * @return WinningsStatistic
     */
    private function createWinningsStatistic(\SimpleXMLElement $resultRow, $prefix)
    {
        return new WinningsStatistic(
            (integer)$resultRow->{$prefix . 'WinningsDice'},
            (integer)$resultRow->{$prefix . 'PopularityBeforeMatch'},
            (integer)$resultRow->{$prefix . 'PopularityGain'},
            (integer)$resultRow->{$prefix . 'CashSpentInducements'},
            (integer)$resultRow->{$prefix . 'CashBeforeMatch'},
            (integer)$resultRow->{$prefix . 'CashEarnedBeforeConcession'},
            (integer)$resultRow->{$prefix . 'CashEarned'}
        );
    }

    /**
     * @param \SimpleXMLElement $resultRow
     * @param string $prefix
     * @return TacklesStatistic
     */
    private function createTacklesStatistic(\SimpleXMLElement $resultRow, $prefix)
    {
        return new TacklesStatistic(
            (integer)$resultRow->{$prefix . 'InflictedTackles'},
            (integer)$resultRow->{$prefix . 'SustainedTackles'},
            (integer)$resultRow->{$prefix . 'InflictedInjuries'},
            (integer)$resultRow->{$prefix . 'SustainedInjuries'},
            (integer)$resultRow->{$prefix . 'InflictedStuns'},
            (integer)$resultRow->{$prefix . 'SustainedStuns'},
            (integer)$resultRow->{$prefix . 'InflictedKO'},
            (integer)$resultRow->{$prefix . 'SustainedKO'},
            (integer)$resultRow->{$prefix . 'InflictedCasualties'},
            (integer)$resultRow->{$prefix . 'SustainedCasualties'},
            (integer)$resultRow->{$prefix . 'InflictedDead'},
            (integer)$resultRow->{$prefix . 'SustainedDead'},
            (integer)$resultRow->{$prefix . 'InflictedPushOuts'}
        );
    }

    /**
     * @param \SimpleXMLElement $resultRow
     * @param string $prefix
     * @return BallStatistic
     */
    private function createBallStatistic(\SimpleXMLElement $resultRow, $prefix)
    {
        return new BallStatistic(
            (integer)$resultRow->{$prefix . 'SustainedInterceptions'},
            (integer)$resultRow->{$prefix . 'InflictedTouchdowns'},
            (integer)$resultRow->{$prefix . 'InflictedMetersPassing'},
            (integer)$resultRow->{$prefix . 'InflictedMetersRunning'},
            (integer)$resultRow->{$prefix . 'InflictedPasses'},
            (integer)$resultRow->{$prefix . 'InflictedCatches'}

        );
    }

    /**
     * @param \SimpleXMLElement $resultRow
     * @param string $prefix
     * @return PossessionStatistic
     */
    private function createPossessionStatistic(\SimpleXMLElement $resultRow, $prefix)
    {
        return new PossessionStatistic(
            (integer)$resultRow->{$prefix . 'PossessionBall'},
            (integer)$resultRow->{$prefix . 'OccupationOwn'},
            (integer)$resultRow->{$prefix . 'OccupationTheir'}
        );
    }

    /**
     * @param \SimpleXMLElement $element
     * @return PlayerStatistic
     */
    private function createPlayerStatistic(\SimpleXMLElement $element)
    {
        return new PlayerStatistic(
            (integer)$element->MatchPlayed,
            $this->createTacklesStatistic($element, ''),
            $this->createBallStatistic($element, '')
        );
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return array
     */
    private function parseRoster(\SimpleXMLElement $xml)
    {
        $createPlayerCallback = function(\SimpleXMLElement $element){
            $player = $this->createPlayer($element->PlayerData, (integer)$element->Xp, (integer)$element->Casualty1, (integer)$element->Casualty2);
            $player->setStatistic($this->createPlayerStatistic($element->Statistics));

            return $player;
        };

        list($homeTeamData, $awayTeamData) = $xml->xpath('/Replay/ReplayStep[last()]/RulesEventGameFinished/MatchResult/CoachResults/CoachResult/TeamResult/PlayerResults');

        $homeTeamRoster = array_map($createPlayerCallback, iterator_to_array($homeTeamData, false));
        $awayTeamRoster = array_map($createPlayerCallback, iterator_to_array($awayTeamData, false));

        $this->sortPlayers($homeTeamRoster);
        $this->sortPlayers($awayTeamRoster);

        return array($homeTeamRoster, $awayTeamRoster);
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