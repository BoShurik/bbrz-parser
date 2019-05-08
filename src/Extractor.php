<?php
/**
 * User: boshurik
 * Date: 2019-05-08
 * Time: 18:58
 */

namespace BoShurik\BloodBowl\Replay;

use Symfony\Component\Filesystem\Filesystem;

class Extractor
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public static function create(): self
    {
        return new self(new Filesystem());
    }

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @param string $path
     * @return \SimpleXMLElement
     */
    public function extract(string $path): \SimpleXMLElement
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

        $this->filesystem->remove($tmpDirName);

        return $xml;
    }
}