<?php

namespace App\Traits;

use File;

use App\Models\Media;
use App\Models\UniGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    public static function fileUpload($photo, $folder_name = 'uploads')
    {
        $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->storeAs($folder_name, $filename, 'public');
        return $filename;
    }

    public static function fileDeleted($path, $photo)
    {
        $image_path = public_path($path . '/' . $photo);
        if (Storage::exists($image_path)) {
            Storage::delete($image_path);
        }
    }
    public static function uploadGalleryImages($files, $model, $folder_name = 'uploads', $uni_id)
    {
        DB::beginTransaction();
        $array = [];
        foreach ($files as $file) :
            $file_name = self::fileUpload($file, $folder_name);
            $type =   $file->getClientMimeType();
            $data['type'] = $model;
            $data['uni_id'] = $uni_id;
            $data['image_name'] = $file_name;
            $data['folder_name'] = $folder_name;
            $data['image_url'] =  url('/storage/' . $folder_name . '/' . $file_name);;
            $array[] = $data;
        endforeach;
        $media = UniGallery::insert($array);
        DB::commit();
        return $media;
    }
    public static function uploadMultipleFiles($files, $model, $folder_name = 'uploads')
    {

        DB::beginTransaction();
        $array = [];

        foreach ($files as $file) :

            $file_name = self::fileUpload($file, $folder_name);

            $type =   $file->getClientMimeType();



            $data['model_type'] = get_class($model);

            $data['name'] = $file_name;
            $data['size'] = $file->getSize();

            $data['folder_name'] = 'products';
            $data['url'] =  url('/storage/products/' . $file_name);;
            $data['extension'] = $type;

            $data['model_id'] = $model->id;



            $array[] = $data;



        endforeach;
        $media = $model::insert($array);
        DB::commit();
        return $media;
    }

    public function MultipleFilesDeleted($files, $model, $path = null)
    {
        $image_path = public_path('images/' . $path . '/' . $files, $model,);
        if (Storage::exists($image_path)) {
            Storage::delete($image_path);
        }
    }
}
