<?php
/**
 * Created by PhpStorm.
 * User: osama
 * Date: 19/03/20
 * Time: 10:02 م
 */

namespace App\Helpers;



use Illuminate\Support\Str;

class Library
{

    public static function slug($title=null)
{

    return Str::slug($title,'-');

}

//human_file_size(1024*1024);
    public static  function human_file_size($bytes, $decimals = 2)
    {
        $sz = 'BKMGTPE';
        $factor = (int)floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $sz[$factor];

    }


    public static  function random_code(){

        return rand(1111, 9999);
    }


    public static   function remove_special_char($text) {

        $t = $text;

        $specChars = array(
            ' ' => '-',    '!' => '',    '"' => '',
            '#' => '',    '$' => '',    '%' => '',
            '&amp;' => '',    '\'' => '',   '(' => '',
            ')' => '',    '*' => '',    '+' => '',
            ',' => '',    '₹' => '',    '.' => '',
            '/-' => '',    ':' => '',    ';' => '',
            '<' => '',    '=' => '',    '>' => '',
            '?' => '',    '@' => '',    '[' => '',
            '\\' => '',   ']' => '',    '^' => '',
            '_' => '',    '`' => '',    '{' => '',
            '|' => '',    '}' => '',    '~' => '',
            '-----' => '-',    '----' => '-',    '---' => '-',
            '/' => '',    '--' => '-',   '/_' => '-',

        );

        foreach ($specChars as $k => $v) {
            $t = str_replace($k, $v, $t);
        }

        return $t;
    }






//
}
