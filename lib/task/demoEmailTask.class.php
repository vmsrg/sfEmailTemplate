<?php

class demoEmailTask extends sfEmailBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name','frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'demo';
    $this->name             = 'email';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [demo:email|INFO] task does things.
Call it with:

  [php symfony demo:email|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    parent::execute($arguments,$options);

    $this->getMailer()->send(new EmailHtml(sfConfig::get('app_email_template_testemail'),'emailDemo/emails/demo',array('foo'=>'bar')));
  }
}
