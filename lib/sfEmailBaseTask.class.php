<?php

class sfEmailBaseTask extends sfBaseTask
{

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
    $this->fixRouting();
  }

  protected function fixRouting(){
    $context = sfContext::createInstance($this->configuration);
    $routing = $context->getRouting();
    $_options = $routing->getOptions();
    $_options['context']['prefix'] = "";// "/frontend_dev.php" for dev; or "" for prod
    $_options['context']['host'] = sfConfig::get('app_email_template_url_base');
    $routing->initialize($this->dispatcher, $routing->getCache(),$_options);
    $context->set('routing',$routing); 
    $context->getConfiguration()->loadHelpers(array('Partial','Url'));
  }
}
