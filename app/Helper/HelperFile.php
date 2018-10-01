<?php
namespace App\Helper;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Input;
use Image;
use Config;
use file;

class HelperFile {
    //Upload File
    public static function uploadFile($file,$topath){
        $newName = time().rand(0,10).chr(rand(97,122)).".".$file->getClientOriginalExtension();
        \Storage::disk('public_folder')->put($newName,  \File::get($file));
        return $newName;
    }

    //Upload Image
    public static function uploadImage($img,$topath){
        $newName = time().rand(0,10).chr(rand(97,122)).".".$img->getClientOriginalExtension();
        Image::make($img->getRealPath())
                ->save(public_path($topath).'/'.$newName);
        return $newName;
    }
    //Return ImageUrl
    public static function getimageURL($img, $topath) {
        return url(url("/") . $topath . $img);
    }

    public static function getUserProfile($user) {
        $img;
        $topath = Config::get('constant.image_profile');
        if ($user->profile_img != NULL) {
            $img = $user->profile_img;
        } elseif ($user->social_profile != NULL) {
            $img_s = $user->social_profile;
        } else {
            $img = 'default_sm.png';
        }
        if (isset($img_s))
            return $img_s;
        else
            return self::getimageURL($img, $topath);
    }
    
    

}

?>