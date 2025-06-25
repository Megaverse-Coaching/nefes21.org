<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class imageUpload
{
    public static function upload($name, $dir, $file, $key='', $resize = null){

        if(!empty($file) )
        {
            //if(!File::exists($dir)){File::makeDirectory($dir, 0755, true);}

            $img = Image::make($file->getRealPath())->encode('webp', 90);
            if($resize['w'] !== null || $resize['h'] !== null){
                $img->resize($resize['w'], $resize['h'], function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            if($img->save(public_path($dir.$name.'.webp'))->encode('webp', 70)){
                return "storage/uploads/contents/".$name.'.webp';
            }else{
                return 'storage/placeholder.jpg';
            }

//            $fileDir = Storage::disk('public')->put($dir.$filename,$img,'public');
//            if($fileDir) return $dir.$filename;
        }
        return "";
    }
}
