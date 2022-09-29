<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageUpload;

class MultiImageUploadController extends Controller
{
    public function fileCreate() { 
        $images = ImageUpload::all();
        return view('imageupload',compact('images'));
    }
    
    public function fileStore(Request $request) { 
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        
        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        ImageUpload::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

    public function destroy(ImageUpload $imageUpload)
    {
        $imageUpload->delete();
        return back();

    }
}
