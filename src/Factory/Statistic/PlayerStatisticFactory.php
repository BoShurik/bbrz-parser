<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:42
 */

namespace BoShurik\BloodBowl\Replay\Factory\Statistic;

use BoShurik\BloodBowl\Replay\Model\Statistic\PlayerStatistic;

class PlayerStatisticFactory
{
    /**
     * @var TacklesStatisticFactory
     */
    private $tacklesStatisticFactory;

    /**
     * @var BallStatisticFactory
     */
    private $ballStatisticFactory;

    public static function build(): self
    {
        return new self(TacklesStatisticFactory::build(), BallStatisticFactory::build());
    }

    public function __construct(TacklesStatisticFactory $tacklesStatisticFactory, BallStatisticFactory $ballStatisticFactory)
    {
        $this->tacklesStatisticFactory = $tacklesStatisticFactory;
        $this->ballStatisticFactory = $ballStatisticFactory;
    }

    public function create(\SimpleXMLElement $element): PlayerStatistic
    {
        return new PlayerStatistic(
            (integer)$element->MatchPlayed,
            $this->tacklesStatisticFactory->create($element, ''),
            $this->ballStatisticFactory->create($element, '')
        );
    }
}