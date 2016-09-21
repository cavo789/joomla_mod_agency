<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  mod_agency
 *
 * @copyright   Copyright (C) 2015 - 2016 Christophe Avonture. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class ModAgencyHelper {
	
   private static function iscURLEnabled() {
      
      return ( (!function_exists("curl_init") && !function_exists("curl_setopt") && !function_exists("curl_exec") && !function_exists("curl_close")) ? false : true);
      
   } // function iscURLEnabled()

   private static function get_content($url, $file) {

      $data=null;
      
      if (self::iscURLEnabled() && ($url!=null)) {
         
         // Ok, try to download the file
   
         $ch = curl_init(str_replace(" ","%20",$url));

         if ($ch){
                  
            @set_time_limit(0);
         
            $fp = @fopen($file.'.tmp', 'w');

            if (!curl_setopt($ch, CURLOPT_URL, $url)){

              fclose($fp); // to match fopen()
              curl_close($ch); // to match curl_init()

            } else {

               $redirects=1;
	
               curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36 FirePHP/4Chrome');
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
               curl_setopt($ch, CURLOPT_REFERER, $_SERVER["HTTP_HOST"]);
               curl_setopt($ch, CURLOPT_TIMEOUT,1); // one second
               curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
               curl_setopt($ch, CURLOPT_FILE, $fp);
               curl_setopt($ch, CURLOPT_MAXREDIRS, $redirects);

               $rc = curl_exec($ch);
               curl_close($ch);
               fclose($fp);
            
               if (filesize($file.'.tmp')>0) {
                  // Kill the old file and rename the downloaded one
                  unlink($file);
                  rename($file.'.tmp', $file);
                  @chmod($file, octdec('644'));    
               } else {
                  unlink($file.'.tmp');
               }
               
            } // if (!curl_setopt($ch, CURLOPT_URL, $url))
                               
         } // if ($ch)
         
      }  // if (iscURLEnabled()) 

      if (file_exists($file) && is_readable($file)) {     
         $data=json_decode(utf8_encode(file_get_contents($file)),true);
      }

      return $data;

   } // function get_content()

   public static function getInfos($params) {

      return self::get_content(trim($params->get('infourl', null)), __DIR__.DS.'config.json');

   } // function getInfos()
   
} // class ModAgencyHelper