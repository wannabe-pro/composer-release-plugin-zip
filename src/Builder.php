<?php

namespace WannaBePro\Composer\Plugin\Release\Zip;

use Composer\Util\Filesystem;
use Traversable;
use ZipArchive;
use WannaBePro\Composer\Plugin\Release\Builder as BaseBuilder;

/**
 * Zip builder.
 */
class Builder extends BaseBuilder
{
    /**
     * @inheritDoc
     */
    public function build(Traversable $files, $update = false)
    {
        if (iterator_count($files) > 0) {
            $this->io->write("Build {$this->target}:");
            (new Filesystem())->ensureDirectoryExists(dirname($this->target));
            $zip = new ZipArchive();
            if ($zip->open($this->target, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
                foreach ($files as $from => $to) {
                    $path = $this->getZipPath($to);
                    if ($zip->addFile($from, $path)) {
                        $this->io->write("* add file {$from} as {$path} in archive.");
                    } else {
                        $this->io->writeError("Error on append file {$from} as {$path} in archive .");
                        break;
                    }
                }
                $zip->close();
            } else {
                $this->io->writeError("Zip archive {$this->target} was not writable.");
            }
        } else {
            $this->io->writeError("No files found for {$this->target}.");
        }
    }

    /**
     * Get relative path for ZIP.
     *
     * @param string $path The path
     *
     * @return string
     */
    protected function getZipPath($path)
    {
        return $this->remove('/', str_replace('\\', '/', $path));
    }

    /**
     * Remove prefix from string.
     *
     * @param string $needle The prefix.
     * @param string $haystack The string.
     *
     * @return string
     */
    protected function remove($needle, $haystack)
    {
        $pos = strpos($haystack, $needle);
        if ($pos === 0) {
            return substr_replace($haystack, '', $pos, strlen($needle));
        }

        return $haystack;
    }
}
