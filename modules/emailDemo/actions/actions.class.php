<?php

require_once dirname(__FILE__).'/../lib/BaseemailDemoActions.class.php';

/**
 * emailDemo actions.
 * 
 * @package    sfEmailTemplatePlugin
 * @subpackage emailDemo
 * @author     A.N. Moroz #skype- str01tel#
 * @version    SVN: $Id: actions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
class emailDemoActions extends BaseemailDemoActions
{
    function executeIndex( sfWebRequest $oRequest ) 
    {
    	$this->getMailer()->send(new EmailHtml(sfConfig::get('app_email_template_testemail'),'emailDemo/emails/demo',array('foo'=>'bar')));
    }
}
