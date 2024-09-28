<?php

namespace App\Helpers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

/**
 * image upload
 *
 * @param object $file
 * @param string $path
 * @return string
 */

// public function index()
// {
//    $dateString = '2023-04-10';
//    $formattedDate = OrderHelper::formatDate($dateString);
//    return view('orders.index', ['formattedDate' => $formattedDate]);
// }

function uploadImage($file, $path)
{
   $fileName = time() . '.' . $file->getClientOriginalExtension();
   $file->move(public_path('uploads/' . $path . '/'), $fileName);
   return "uploads/$path/" . $fileName;
}

// function uploadImage(?object $file, string $path): string
// {
//    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
//    $file->move(public_path('uploads/' . $path . '/'), $fileName);

//    return "uploads/$path/" . $fileName;
// }



// function deleteImage($image)
// {
//    $imageExists = file_exists($image);
//    if ($imageExists) {
//       if ($imageExists != 'uploads/no-image.png') {
//          @unlink($image);
//       // File::delete($image);
//       }
//    }

// } 

function deleteImage($image)
{
   $imageExists = file_exists($image);

   if ($imageExists) {
      if ($imageExists != 'uploads/no-image.png') {
         @unlink($image);
      }
   }


  // Delete the image file from the public folder
   // if (file_exists(public_path($imagePath))) {
   //    unlink(public_path($imagePath));  // Delete the file
   // }

   // // Delete the image record from the database
   // return $imageModel->delete();

}
