<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ParentCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\MyHelper;


class ProductController extends Controller
{
    function productGallery(Request $req){
      if($req->isLatest!=null){
        $allImages=Product::where('isLatest',true)->get();
      }else{
        $allImages=Product::all();
      }
      return view('admin.products.browse',['images'=>$allImages]);
    }
    
    function addNewProductPage(){
          $type="add";
           $categories=Category::all();
          return view('admin.products.edit_add',['categories'=>$categories,'type'=>$type]);
        }

    function saveNewProduct(Request $request){
          $product=new Product();
          $base64Image = $request->croppedImage;

         if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $matches)) {
              $extension = $matches[1]; // Get the extension
              $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
              $decodedImage = base64_decode($base64Image);
  
              // Generate a unique filename
              $uniqueId = uniqid();
              $imageName = $uniqueId . '.' . $extension;
  
              // Store the image in S3
            Storage::disk('s3')->put('product/images/' . $imageName, $decodedImage);
           
            $product->categoryId = $request->categoryId;
            $product->imageTitle = $request->imageTitle;
            $product->description = $request->description;
            $product->imageName = $imageName;
            $product->save();
    
        }
       return redirect()->route('product.images.view');
    }

    function editProductPage(Request $req){
      $product=Product::find($req->id);
      $category=Category::find($product->categoryId);
      $product->categoryName=$category->categoryName;
      $type="edit";
      $categories=Category::all();
      return view('admin.products.edit_add',['categories'=>$categories,'type'=>$type,'product'=>$product]);
   }
   function updateProduct(Request $request){
    $product=Product::find($request->id);
    $base64Image = $request->croppedImage;

    if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $matches)) {

      $fileToDelete = 'product/images/' . $product->imageName;
      Storage::disk('s3')->delete($fileToDelete);

      $extension = $matches[1]; // Get the extension
      $base64Image = substr($base64Image, strpos($base64Image, ',') + 1);
      $decodedImage = base64_decode($base64Image);

      // Generate a unique filename
      $uniqueId = uniqid();
      $imageName = $uniqueId . '.' . $extension;

      // Store the image in S3
    Storage::disk('s3')->put('product/images/' . $imageName, $decodedImage);

      

      // Save the image name to the database
      $product->imageName = $imageName;
   }

   $product->categoryId = $request->categoryId;
   $product->imageTitle = $request->imageTitle;
   $product->description = $request->description;
   $product->update();
   return redirect()->route('product.images.view');
  }
  function deleteProduct(Request $req){
    $product=Product::find($req->id);
    $fileToDelete = 'product/images/' . $product->imageName;
    Storage::disk('s3')->delete($fileToDelete);
    $product->delete();
    return redirect()->back();
   }
   function toggleLatest(Request $req){
    $product=Product::find($req->product_id);
    $product->isLatest=!$product->isLatest;
    $product->save();
    return redirect()->back();
   }

}
