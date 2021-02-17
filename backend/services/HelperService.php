<?php

namespace backend\services;

/**
 * Class HelperService
 * @package backend\services
 */
class HelperService
{
    public static function renderImageFromString($imgString)
    {
        if (preg_match('(data:image\/[^;]+;base64[^"]+)', $imgString)) {
            $new_data = explode(';', $imgString);
            $type = $new_data[0];
            $data = explode(',', $new_data[1]);
            $image = imagecreatefromstring(base64_decode($data[1]));
            header('Content-type:' . $type);
//            imagejpeg($image);

            return $image;
        }

        return '';

//        if (preg_match('/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/', $imgString)) {
////            $image = imagecreatefromstring(file_get_contents($imgString));
////            header('Content-Type: image/png');
//
//            $url = $imgString;
//            $ch = curl_init();
//            $user_agent = 'Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0';
//            curl_setopt($ch, CURLOPT_URL, $url);
//            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//            curl_setopt($ch, CURLOPT_AUTOREFERER, false);
//            curl_setopt($ch, CURLOPT_VERBOSE, 1);
//            curl_setopt($ch, CURLOPT_HEADER, 0);
//
//            curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//            $webcontent = curl_exec($ch);
////            $error = curl_error($ch);
//            curl_close($ch);
//
//            return $webcontent;
//            return imagepng($image);
//        }
    }
}
