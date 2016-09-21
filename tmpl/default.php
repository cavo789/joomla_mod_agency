<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_agency
 *
 * @copyright   Copyright (C) 2015 - 2016 Christophe Avonture. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

   $doc = JFactory::getDocument();
   $doc->addStyleSheet(JURI::base().'/modules/mod_agency/assets/css/style.css','text/css');

   $return = ''; 
   
   if (isset($infos)) {
	   
      $logo=(isset($infos['logo'])?$infos['logo']:'');
      $title=(isset($infos['title'])?$infos['title']:'');
      $name=(isset($infos['name'])?$infos['name']:'');
      $url=(isset($infos['url'])?$infos['url']:'');
      $person=(isset($infos['person'])?$infos['person']:'');
      $email=(isset($infos['email'])?$infos['email']:'');
      $skype=(isset($infos['skype'])?$infos['skype']:'');
      $phone=(isset($infos['phone'])?$infos['phone']:'');
      $country=(isset($infos['country'])?$infos['country']:'');
   
      if($logo!='') $return.='<span><img src="'.$logo.'" alt="'.$title.'" title="'.$title.'"/>';
      if($name!='') $return.='<span class="icon-folder">&nbsp;</span>'.$name;
      if($url!='') {
         preg_match('/^https?:\/\//', $url, $matches);
         if(count($matches)==0) $url='http://'.$url;         
         $return.='<span class="icon-bookmark">&nbsp;</span>'.JHTML::link($url,$url,'target="_blank" title="'.$title.'"');
      }
      if($person!='') $return.='<span class="icon-ok">&nbsp;</span>'.$person;
      if($email!='') $return.='<span class="glyphicon icon-envelope">&nbsp;</span>'.JHTML::link('mailto:'.$email.'?subject='.$_SERVER["HTTP_HOST"],$email);
      if($skype!='') $return.='<span class="glyphicon icon-chevron-right">&nbsp;Skype :</span>'.JHTML::link('skype:'.$skype.'?chat',$skype);
      if($phone!='') $return.='<span class="glyphicon icon-phone">&nbsp;</span>'.$phone;
      if($country!='') $return.='<span class="icon-featured">&nbsp;</span>'.$country;
	  
   } // if (isset($infos))
   
   echo '<div id="mod_agency">'.$return.'</div>';