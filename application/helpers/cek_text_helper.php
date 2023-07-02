<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      
      
    //
    if ( ! function_exists('convertURLs'))
    {

        function convertURLs($string)
        {
            $url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
            return preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $string);
        }
    }

