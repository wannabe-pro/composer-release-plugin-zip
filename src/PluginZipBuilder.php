<?php

namespace WannaBePro\Composer\Plugin\Release;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Plugin ZIP builder.
 */
class PluginZipBuilder implements PluginInterface
{
    /**
     * Activate plugin.
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        Plugin::addBuilder(ZipBuilder::class);
    }
}
