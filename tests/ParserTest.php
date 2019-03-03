<?php
/**
 * User: boshurik
 * Date: 2019-03-03
 * Time: 13:41
 */

namespace BoShurik\BloodBowl\Replay\Tests;

use BoShurik\BloodBowl\Replay\Model\Match;
use BoShurik\BloodBowl\Replay\Parser;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    /**
     * @var Parser
     */
    private $parser;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->parser = new Parser();
    }

    /**
     * @dataProvider dataProvider
     *
     * @param string $filename
     * @param Match $expected
     */
    public function testParse(string $filename, Match $expected)
    {
        $result = $this->parser->parse($filename);

        $this->assertInstanceOf(Match::class, $result);

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        yield [__DIR__ . '/Fixtures/2016-01-09.bbrz', require __DIR__ . '/Fixtures/snapshots/2016-01-09.php'];
        yield [__DIR__ . '/Fixtures/2019-03-03.bbrz', require __DIR__ . '/Fixtures/snapshots/2019-03-03.php'];
    }
}