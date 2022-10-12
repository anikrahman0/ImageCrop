<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class CropImageController extends Controller
{
    public function index()
    {
      return view('croppie');
    }
   
    public function uploadCropImage(Request $request)
    {
        // $validator = Validator::make(
        //     $request->all(),
        //     [
        //         'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
        //     ]
        // );
        // if ($validator->fails()) {
        //     return response()->json(['status' => 'errors', 'errors' => $validator->errors(),], 200);
        // }
        //user image
        // $image_name = '';
        // $image = $request->file('image');
        // if ($image != '') {
        //     $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
        //     $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), '-');
        //     $image_name = $f_n . '-' . time() . '.' . $ext;
        //     $image->move('upload', $image_name);
        // }

        $image = $request->image;

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name= time().'.png';
        $path = public_path('upload/'.$image_name);

        file_put_contents($path, $image);
        return response()->json(['status'=>true]);
    }
}
