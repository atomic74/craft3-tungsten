<?php
/**
 * Tungsten plugin for Craft CMS 3.x
 *
 * Miscellaneous goodies needed for Tungsten Craft projects
 *
 * @link      http://atomic74.com
 * @copyright Copyright (c) 2018 Tungsten Creative
 */

namespace tungsten\tungsten;

use tungsten\tungsten\variables\TungstenVariable;
use tungsten\tungsten\models\Settings;
use tungsten\tungsten\widgets\TungstenCraftResources as TungstenCraftResourcesWidget;
use tungsten\tungsten\assetbundles\tungsten\TungstenAsset;

use Craft;
use craft\base\Model;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;
use craft\services\Dashboard;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class Tungsten
 *
 * @author    Tungsten Creative
 * @package   Tungsten
 * @since     2
 *
 */
class Tungsten extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Tungsten
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Dashboard::class,
            Dashboard::EVENT_REGISTER_WIDGET_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = TungstenCraftResourcesWidget::class;
            }
        );

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('tungsten', TungstenVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'tungsten',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );

        // Include the Redactor style adjustments for CP requests
        if (Craft::$app->getRequest()->isCpRequest) {
            Craft::$app->getView()->registerAssetBundle(TungstenAsset::class);
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate(
            'tungsten/settings',
            [
                'plugin' => $this,
                'settings' => $this->getSettings()
            ]
        );
    }
}
