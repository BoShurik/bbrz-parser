<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 19:49
 */

namespace BoShurik\BloodBowl\Replay\Factory\Statistic;

use BoShurik\BloodBowl\Replay\Model\Statistic\Statistic;

class StatisticFactory
{
    /**
     * @var WinningsStatisticFactory
     */
    private $winningsStatisticFactory;

    /**
     * @var TacklesStatisticFactory
     */
    private $tacklesStatisticFactory;

    /**
     * @var BallStatisticFactory
     */
    private $ballStatisticFactory;

    /**
     * @var PossessionStatisticFactory
     */
    private $possessionStatisticFactory;

    public static function build(): self
    {
        return new self(
            WinningsStatisticFactory::build(),
            TacklesStatisticFactory::build(),
            BallStatisticFactory::build(),
            PossessionStatisticFactory::build()
        );
    }

    public function __construct(
        WinningsStatisticFactory $winningsStatisticFactory,
        TacklesStatisticFactory $tacklesStatisticFactory,
        BallStatisticFactory $ballStatisticFactory,
        PossessionStatisticFactory $possessionStatisticFactory
    ) {

        $this->winningsStatisticFactory = $winningsStatisticFactory;
        $this->tacklesStatisticFactory = $tacklesStatisticFactory;
        $this->ballStatisticFactory = $ballStatisticFactory;
        $this->possessionStatisticFactory = $possessionStatisticFactory;
    }

    public function create(\SimpleXMLElement $resultRow, $prefix): Statistic
    {
        return new Statistic(
            (integer)$resultRow->{$prefix . 'Score'},
            (integer)$resultRow->{$prefix . 'Value'},
            $this->winningsStatisticFactory->create($resultRow, $prefix),
            $this->tacklesStatisticFactory->create($resultRow, $prefix),
            $this->ballStatisticFactory->create($resultRow, $prefix),
            $this->possessionStatisticFactory->create($resultRow, $prefix)
        );
    }
}