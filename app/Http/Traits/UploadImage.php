<?php
namespace App\Http\Traits;
use File;
use Illuminate\Support\Facades\Storage;
use Image;

trait UploadImage
{
    /**
     * @param $name
     * @param $dir
     * @param $file
     * @param null $key
     * @param null $rm
     * @param null $resize
     * @param string $format
     * @return string|null
     */
    public function createImage($name, $dir, $file, $resize=null, $key=null, $rm=null, string $format="webp"): ?string
    {
        if($file !== null):
            if(File::exists($dir.$name.".$format")) unlink(public_path($dir . $name . ".$format"));
            if(!File::exists($dir) ) File::makeDirectory($dir, 0777, true, true);
            $img = Image::make($file->getRealPath())->encode($format, 60);
            if($resize['w'] !== null || $resize['h'] !== null) $img->resize($resize['w'], $resize['h'], fn ($constraint) => $constraint->aspectRatio());
            $image = ($img->save(public_path($dir.$name.".$format"))->encode($format, 50)) ? $dir.$name.".$format" : "storage/placeholder-program-cover.jpg";

        elseif($rm === "1" && $file === null):
            if(File::exists($dir)) unlink(public_path($dir.$name.".$format"));
            $image = "storage/placeholder.jpg";

        else : $image = File::exists($dir.$name.".$format") ? $dir.$name.".$format" : "b";

        endif;

//        if(File::isEmptyDirectory($dir)): File::deleteDirectory($dir); endif;

        return $image;
    }

    /**
     * Function for upload avatar image
     *
     * @param string $folder
     * @param string $key
     * @param string $validation
     *
     * @return false|string|null
     */
    public function uploadTracks(string $folder = 'uploads/soundscapes', string $key = 'files', string $validation = 'required|mimes:mp3,m4a,mp4,m4r|max:2048|sometimes'): bool|string|null
    {
        request()->validate([$key => $validation]);
        if (request()->hasFile($key)) $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
        return $file ?? null;
    }
}
