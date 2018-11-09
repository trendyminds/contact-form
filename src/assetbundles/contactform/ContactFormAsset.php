<?php
/**
 * Contact Form plugin for Craft CMS 3.x
 *
 * Sends an email to Zendesk
 *
 * @link      https://trendyminds.com/
 * @copyright Copyright (c) 2018 Trendyminds
 */

namespace trendyminds\contactform\assetbundles\ContactForm;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Trendyminds
 * @package   ContactForm
 * @since     1.0.0
 */
class ContactFormAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@trendyminds/contactform/assetbundles/contactform/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/ContactForm.js',
        ];

        $this->css = [
            'css/ContactForm.css',
        ];

        parent::init();
    }
}
