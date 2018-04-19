<?php
/**
 * Tungsten plugin for Craft CMS 3.x
 *
 * Miscellaneous goodies needed for Tungsten Craft projects
 *
 * @link      http://atomic74.com
 * @copyright Copyright (c) 2018 Tungsten Creative
 */

namespace tungsten\tungsten\widgets;

use tungsten\tungsten\Tungsten;
use tungsten\tungsten\assetbundles\tungstencraftresourceswidget\TungstenCraftResourcesWidgetAsset;

use Craft;
use craft\base\Widget;

/**
 * Tungsten Widget
 *
 * @author    Tungsten Creative
 * @package   Tungsten
 * @since     2
 */
class TungstenCraftResources extends Widget
{

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('tungsten', 'Tungsten Craft Resources');
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias("@tungsten/tungsten/assetbundles/tungstencraftresourceswidget/dist/img/TungstenCraftResources-icon.svg");
    }

    /**
     * @inheritdoc
     */
    public static function maxColspan()
    {
        return null;
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        Craft::$app->getView()->registerAssetBundle(TungstenCraftResourcesWidgetAsset::class);

        return Craft::$app->getView()->renderTemplate(
            'tungsten/_components/widgets/TungstenCraftResources_body',
            [
                'settings' => \tungsten\tungsten\Tungsten::getInstance()->settings
            ]
        );
    }
}
