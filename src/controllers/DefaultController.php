<?php
/**
 * Contact Form plugin for Craft CMS 3.x
 *
 * Sends an email to Zendesk
 *
 * @link      https://trendyminds.com/
 * @copyright Copyright (c) 2018 Trendyminds
 */

namespace trendyminds\contactform\controllers;

use trendyminds\contactform\ContactForm;

use Craft;
use craft\web\Controller;
use craft\mail\Message;

/**
 * @author    Trendyminds
 * @package   ContactForm
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['send-email'];

    // Public Methods
    // =========================================================================
    public function actionSendEmail()
    {
      $settings = Craft::$app->systemSettings->getSettings('email');
      $toAddress = Craft::$app->plugins->getPlugin('contact-form')->getSettings('toAddress');
      $toAddress =  $toAddress['toAddress'];
      $message = new Message();
      $message->setFrom($_POST['email']);
      $message->setTo($toAddress);
      $message->setSubject($_POST['subject']);
      $message->setHtmlBody($_POST['message']);
      Craft::$app->mailer->send($message);
      return $this->redirect('/thank-you');
    }
}
