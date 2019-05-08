<?php
/**
 * User: boshurik
 * Date: 21.08.16
 * Time: 12:16
 */

namespace BoShurik\BloodBowl\Replay;

use BoShurik\BloodBowl\Replay\Factory\MatchFactory;

class Parser
{
    /**
     * @var Extractor
     */
    private $extractor;

    /**
     * @var MatchFactory
     */
    private $factory;

    public static function create(): self
    {
        return new self(Extractor::create(), MatchFactory::build());
    }

    public function __construct(Extractor $extractor, MatchFactory $factory)
    {
        $this->extractor = $extractor;
        $this->factory = $factory;
    }

    /**
     * @param string $path
     * @return Model\Match
     */
    public function parse($path)
    {
        $xml = $this->extractor->extract($path);

        return $this->factory->create($xml);
    }
}