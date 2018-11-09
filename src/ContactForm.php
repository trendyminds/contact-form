<?php
/**
 * Contact Form plugin for Craft CMS 3.x
 *
 * Sends an email to Zendesk
 *
 * @link      https://trendyminds.com/
 * @copyright Copyright (c) 2018 Trendyminds
 */

namespace trendyminds\contactform;

use trendyminds\contactform\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class ContactForm
 *
 * @author    Trendyminds
 * @package   ContactForm
 * @since     1.0.0
 *
 */
class ContactForm extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var ContactForm
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        // Register our site routes
        Event::on(
          UrlManager::class,
          UrlManager::EVENT_REGISTER_SITE_URL_RULES,
          function (RegisterUrlRulesEvent $event) {
              $event->rules['/contact-us/send-email'] = 'contactform/default/send-email';
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
                'contact-form',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'contact-form/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
