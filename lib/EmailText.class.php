<?php 
class EmailText extends Swift_Message
{
  public function __construct($useremail,$partial,$vars=array())
  {

    sfApplicationConfiguration::getActive()->loadHelpers(array('Partial','Url'));
  	$email = get_partial($partial,$vars);
  	list($body,$subject) = explode('>>>', $email);

  	parent::__construct($subject,$body,false,'utf-8');
    
    $fromemail = sfConfig::get('app_email_template_fromemail');
    $sitename = sfConfig::get('app_email_template_sitename');
    $adminemail = sfConfig::get('app_email_template_adminemail');
    
    $this->setFrom(array($fromemail => $sitename));
    if(!$useremail){
    	$to = array($adminemail=>'Admin');
    }
    else{
    	$to = array($useremail);
    }
    $this->setTo($to);
    
  }
}
?>