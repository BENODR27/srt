<?php

namespace App\Http\Controllers;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SlideController extends Controller
{
    function slideGallery(){
      $allImages=Slide::all();
      return view('admin.slides.browse',['images'=>$allImages]);
    }
        
    function addNewSlidePage(){
      $type="add";
      return view('admin.slides.edit_add',['type'=>$type]);
    }

    function saveNewSlide(Request $request){
      $slide=new Slide();
        $base64Image = $request->croppedImage;

      if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $matches)) {
        $extension = $matches[1]; // Get the extension
        $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
        $decodedImage = base64_decode($base64Image);

        // Generate a unique filename
        $uniqueId = uniqid();
        $imageName = $uniqueId . '.' . $extension;

        // Store the image in S3
      Storage::disk('s3')->put('slide/images/' . $imageName, $decodedImage);
        // Save the image name to the database
        $slide->imageName = $imageName;
        $slide->save();

    }
return redirect()->route('slide.images.view');
    }

    function editSlidePage(Request $req){
        $selectedSlide=Slide::find($req->id);
        $type="edit";
        return view('admin.slides.edit_add',['type'=>$type,'slide'=>$selectedSlide]);
    }
    function updateSlide(Request $request){
      $slide=Slide::find($request->id);

        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $matches)) {
          $fileToDelete = 'slide/images/' . $slide->imageName;
        Storage::disk('s3')->delete($fileToDelete);
          $extension = $matches[1]; // Get the extension
          $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
          $decodedImage = base64_decode($base64Image);
  
          // Generate a unique filename
          $uniqueId = uniqid();
          $imageName = $uniqueId . '.' . $extension;
  
          // Store the image in S3
        Storage::disk('s3')->put('slide/images/' . $imageName, $decodedImage);

        // Save the image name to the database
        $slide->imageName = $imageName;
        

    }
    $slide->save();
return redirect()->route('slide.images.view');
    }
    function deleteSlide(Request $req){
      $slide=Slide::find($req->id);
      $fileToDelete = 'slide/images/' . $slide->imageName;
      Storage::disk('s3')->delete($fileToDelete);
      $slide->delete();
      return redirect()->back();
     }
    
}
