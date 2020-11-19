<?php
/**
 * Created by PhpStorm.
 * User: osama
 * Date: 19/03/20
 * Time: 10:38 م
 */

namespace App\Helpers;


class Service
{

    public function api(){
        return 'api';
    }



    public function WebScraping($url){

        require_once public_path('simplehtmldom/simple_html_dom.php');
        $html = file_get_html($url);
       //  $html = file_get_html(html_entity_decode($url));
return $html;
        //
    }




}
