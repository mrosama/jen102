<?php
use Illuminate\Contracts\Filesystem\FileNotFoundException;
//use File;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Debug\Dumper;
use Illuminate\Contracts\Support\Htmlable;
if(!function_exists('generateApiToken')){

    function generateApiToken(){
        return bin2hex(openssl_random_pseudo_bytes(30)); //60
    }

    }


    //-----------------------------

if(!function_exists('getView')){
    function getView($viewName)
    {
        if (request()->segment(1) == 'amp') {
            if (view()->exists($viewName . '-amp')) {
                $viewName .= '-amp';
            } else {
                abort(404);
            }
        }
        return $viewName;
    }
    //
}





if(!function_exists('HttpDir')){



    function HttpDir($path,$secure=false){

        try {
             //use when serve from command line
            if(File::exists($path)) {
                return app('url')->asset($path,$secure);
              } else {
                  //load when use default localhost
                return app('url')->asset("public/".$path,$secure);
              }
        } catch (FileNotFoundException $e) {
           // abort(404); //or not found
            return false;
        }

     }
}





if(!function_exists('EncodeData')){

    function EncodeData($param){

    return base64_encode(serialize($param));

    }

}




if(!function_exists('DecodeData')){

    function DecodeData($param){

 return unserialize(base64_decode($param));

    }

}



//Redirect::back()->with('message', 'error|There was an error...');
// {!! displayAlert() !!}
function displayAlert()
{
    if (Session::has('message'))
    {
        list($type, $message) = explode('|', Session::get('message'));

      //  $type = $type == 'error' : 'danger';
        // $type = $type == 'message' : 'info';

         return sprintf('<div class="alert alert-%s">%s</div>', $type,$message);
      }

    return '';
}



if (! function_exists('get_gravatar_url')) {
    /**
     * Get gravatar image url
     *
     * @param  string  $email
     * @param  integer $size
     *
     * @return string
     */
    function get_gravatar_url($email, $size = 72)
    {
        return sprintf("//www.gravatar.com/avatar/%s?s=%d", md5($email), $size);
    }
}

if (! function_exists('get_profile_url')) {
    /**
     * Get gravatar profile page url
     *
     * @param  string $email
     *
     * @return string
     */
    function get_profile_url($email)
    {
        return sprintf("//www.gravatar.com/%s", md5($email));
    }
}



if (! function_exists('is_mobile_browser')) {
    /**
     * Determine if the client browser is mobile
     *
     * @return bool
     */
    function is_mobile_browser()
    {
        $ua = strtolower(Request::server('HTTP_USER_AGENT'));

        return ($ua)
        && (Str::contains($ua, 'android') || Str::contains($ua, 'iphone'))
            ? true
            : false;
    }
}


function get_file_size($filesize)
{
    if (! is_numeric($filesize)) {
        return 'NaN';
    }

    $decr   = 1024;
    $step   = 0;
    $suffix = ['b', 'KB', 'MB', 'GB'];

    while (($filesize / $decr) > 0.9) {
        $filesize = $filesize / $decr;
        $step++;
    }

    return round($filesize, 2) . $suffix[$step];
}



if (! function_exists('get_client_language')) {
    /**
     * Get the client's language preference
     * by parsing Accept-Language HTTP header
     *
     * @return array
     */
    function get_client_language()
    {
        $pattern = '/^(?P<primarytag>[a-zA-Z]{2,8})'
            . '(?:-(?P<subtag>[a-zA-Z]{2,8}))?(?:(?:;q=)'
            . '(?P<quantifier>\d\.\d))?$/';

        $languages  = [];
        $preference = Request::server('HTTP_ACCEPT_LANGUAGE');

        foreach (explode(',', $preference) as $language) {
            $splits      = [];
            $languages[] = preg_match($pattern, $language, $splits) ? $splits : null;
        }

        return $languages;
    }
}


if (! function_exists('get_star_rating')) {
    /**
     * Calculate star rating
     *
     * @param int    $score
     * @param string $on
     * @param string $off
     *
     * @return string
     */
    function get_star_rating($score, $on = '★', $off = '☆')
    {
        $score = round($score);

        return str_repeat($on, $score) . str_repeat($off, 5 - $score);
    }
}



if (! function_exists('is_current_route')) {
    /**
     * Determine if the given routeName is currentRouteName
     *
     * @param string $routeName
     *
     * @return bool
     */
    function is_current_route($routeName)
    {
        return Route::currentRouteName() == $routeName;
    }
}



if (! function_exists('is_update_request')) {
    /**
     * Determine if the request is for update
     *
     * @return bool
     */
    function is_update_request()
    {
        $needle = ['put', 'patch'];

        return in_array(strtolower(app('request')->input('_method')), $needle)
            or in_array(strtolower(app('request')->header('x-http-method-override')), $needle);
    }
}

if (! function_exists('is_delete_request')) {
    /**
     * Determine if the request is for delete
     *
     * @return bool
     */
    function is_delete_request()
    {
        $needle = 'delete';

        return strtolower(app('request')->input('_method')) == $needle
            or strtolower(app('request')->header('x-http-method-override')) == $needle;
    }
}
