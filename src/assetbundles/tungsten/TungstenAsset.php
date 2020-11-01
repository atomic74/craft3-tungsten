<?php
/**
 * Tungsten plugin for Craft CMS 3.x
 *
 * Miscellaneous goodies needed for Tungsten Craft projects
 *
 * @link      http://atomic74.com
 * @copyright Copyright (c) 2018 Tungsten Creative
 */

namespace tungsten\tungsten\assetbundles\tungsten;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Tungsten Creative
 * @package   Tungsten
 * @since     2
 */
class TungstenAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@tungsten/tungsten/assetbundles/tungsten/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Tungsten.js',
        ];

        $this->css = [
            'css/Tungsten.css',
        ];

        parent::init();
    }
}
