<?php
/**
 * Tungsten plugin for Craft CMS 3.x
 *
 * Miscellaneous goodies needed for Tungsten Craft projects
 *
 * @link      http://atomic74.com
 * @copyright Copyright (c) 2018 Tungsten Creative
 */

namespace tungsten\tungsten\variables;

use tungsten\tungsten\Tungsten;

use Craft;
use craft\helpers\App;

/**
 * @author    Tungsten Creative
 * @package   Tungsten
 * @since     2
 */
class TungstenVariable
{
    // Public Methods
    // =========================================================================

    /**
     * @param null $optional
     * @return string
     */
    public function assetUrl($filename = null)
    {
        $fileSystemPath = CRAFT_BASE_PATH;
        $siteUrl = App::env('PRIMARY_SITE_URL');
        $appDirPath = $fileSystemPath.'/web/app/';
        $appDirUrl = $siteUrl.'/app/';
        $manifestFilePath = $appDirPath.'rev-manifest.json';
        $assetFilePath = $appDirPath.$filename;

        if (file_exists($manifestFilePath)) {
            // Return the cached version of the asset file
            $manifest = json_decode(file_get_contents($manifestFilePath), true);
            return $appDirUrl.$manifest[$filename];
        } else {
            // Return the develoment version of the asset file
            return $appDirUrl.$filename;
        }
    }
}
