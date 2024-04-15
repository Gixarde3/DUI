<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Intervention\Image\ImageManager as Image;
use Illuminate\Support\Facades\File;

class  ImageController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;


    public static function convertToWebp($image, $type){
        $nameFile = uniqid();
        $extension = '.'.$image->getClientOriginalExtension();
        $image->storeAs('public/',$nameFile.$extension);
        $storageRoute = storage_path('app/public/'.$nameFile.$extension);
        $publicRoute = public_path("images/$type/$nameFile.webp");
        $imagenWebp = Image::make($storageRoute);
        $imagenWebp->orientate();
        $quality = 75;
        $imagenWebp->encode('webp',$quality);
        $imagenWebp->save($publicRoute);
        File::delete($storageRoute);
        return ($nameFile.'.webp');
    }
}
