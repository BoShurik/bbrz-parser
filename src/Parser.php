<?php
/**
 * User: boshurik
 * Date: 21.08.16
 * Time: 12:16
 */

namespace BoShurik\BloodBowl\Replay;

use BoShurik\BloodBowl\Replay\Parser\OriginalParser;
use BoShurik\BloodBowl\Replay\Parser\ParserInterface;

class Parser
{
    /**
     * @var Extractor
     */
    private $extractor;
    /**
     * @var ParserInterface
     */
    private $parser;

    public static function create(): Parser
    {
        return new self(Extractor::create(), new OriginalParser());
    }

    public function __construct(Extractor $extractor, ParserInterface $parser)
    {
        $this->extractor = $extractor;
        $this->parser = $parser;
    }

    /**
     * @param string $path
     * @return Model\Match
     */
    public function parse($path)
    {
        $xml = $this->extractor->extract($path);

        return $this->parser->parse($xml);
    }
}