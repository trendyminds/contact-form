<?php
/**
 * Contact Form plugin for Craft CMS 3.x
 *
 * Sends an email to Zendesk
 *
 * @link      https://trendyminds.com/
 * @copyright Copyright (c) 2018 Trendyminds
 */

namespace trendyminds\contactform\models;

use trendyminds\contactform\ContactForm;

use Craft;
use craft\base\Model;

/**
 * @author    Trendyminds
 * @package   ContactForm
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $toAddress = "";

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [["toAddress"], "string"]
        ];
    }
}
