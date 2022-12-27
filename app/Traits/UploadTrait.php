<?php 

namespace App\Traits\UploadTrait;
use Illuminate\Support\Str;

trait UploadTrait
{
    public function uploadOne($uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}


?>