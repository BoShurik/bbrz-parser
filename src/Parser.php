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
use Symfony\Component\Filesystem\Filesystem;

class Parser
{
    /**
     * @var Filesystem
     */
    private $fileSystem;

    public function __construct()
    {
        $this->fileSystem = new Filesystem();
    }

    /**
     * @param string $path
     * @return Model\Match
     */
    public function parse($path)
    {
        $xml = $this->extract($path);
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

    /**
     * @param string $path
     * @return \SimpleXMLElement
     */
    private function extract($path)
    {
        $zip = new \ZipArchive();
        if ($zip->open($path) !== true) {
            throw new \RuntimeException(sprintf('Can\'t open file "%s"', $path));
        }

        $tmpDirName = sprintf('%s/%s', sys_get_temp_dir(), uniqid());
        if (!$zip->extractTo($tmpDirName)) {
            throw new \RuntimeException(sprintf('Can\'t extract file "%s" to "%s"', $path, $tmpDirName));
        }
        $zip->close();

        $dir = dir($tmpDirName);
        $fileName = null;
        while (false !== ($entry = $dir->read())) {
            if (in_array($entry, array('.', '..'))) {
                continue;
            }
            $fileName = sprintf('%s/%s', $tmpDirName, $entry);
            break;
        }
        $dir->close();

        if (!$fileName) {
            throw new \RuntimeException(sprintf('Archive "%s" is empty', $path));
        }

        $xml = simplexml_load_file($fileName);

        $this->fileSystem->remove($tmpDirName);

        return $xml;
    }
}