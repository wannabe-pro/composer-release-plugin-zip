<?php

namespace WannaBePro\Composer\Plugin\Release\Zip;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use WannaBePro\Composer\Plugin\Release\Plugin as ReleasePlugin;

/**
 * Plugin ZIP builder.
 */
class Plugin implements PluginInterface
{
    /**
     * Activate plugin.
     *
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        ReleasePlugin::addBuilder('zip', Builder::class);
    }
}
