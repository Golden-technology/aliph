<?php

use Illuminate\Support\Facades\Lang;
use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('translate')) {
    /**
     * Returns a translation from google 
     *
     * @param string 
     * string do translation
     *
     * */
    function translate($key)
    {
        $path = resource_path() . '/lang' . '/' . app()->getLocale() . '/translate.php';
        
        $array = (array) __('translate', [], '/' . app()->getLocale()); //(array) Lang::get('translate', [] , app()->getLocale()); // return entire array
        
        if(in_array($key , $array))
        {
            return __('translate.' . $key);
        }
        else
        {       

            $translate_value = $key;//GoogleTranslate::trans($key, app()->getLocale());    

            $contents = file_get_contents($path);

            $contents = str_replace('];', "'". $key ."' => '". $translate_value ."'," . PHP_EOL . '];', $contents);

            // $content = "<?php\n\nreturn\n[\n";

            // $array[$key] = $translate_value;

            // foreach ($array as $k => $value)
            // {
            //     $content .= "\t'".$k."' => '".$value."',\n";
            // }

            // $content .= "];";


            //file_put_contents($path, $contents);

            return $translate_value;

            //return $key;
        }

        return '';


    }
}