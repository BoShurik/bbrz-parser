<?php
/**
 * User: boshurik
 * Date: 21.08.16
 * Time: 12:16
 */

namespace BoShurik\BloodBowl\Replay;

use BoShurik\BloodBowl\Replay\Parser\LegendaryParser;
use BoShurik\BloodBowl\Replay\Parser\OriginalParser;
use BoShurik\BloodBowl\Replay\Parser\ParserInterface;

class Parser
{
    /**
     * @var Extractor
     */
    private $extractor;

    public static function create(): Parser
    {
        return new self(Extractor::create());
    }

    public function __construct(Extractor $extractor)
    {
        $this->extractor = $extractor;
    }

    /**
     * @param string $path
     * @return Model\Match
     */
    public function parse($path)
    {
        $xml = $this->extractor->extract($path);
        $parser = $this->createParser($xml);

        return $parser->parse($xml);
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return ParserInterface
     */
    private function createParser(\SimpleXMLElement $xml)
    {
        if (strpos($xml->ClientVersion, '3.') === 0) {
            return new LegendaryParser();
        }

        return new OriginalParser();
    }
}