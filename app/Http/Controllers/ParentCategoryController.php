<?php

namespace App\Http\Controllers;
use App\Models\ParentCategory;

use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    function categoryList(){
        $parentCategories=ParentCategory::all();
       return view('admin.parentCategories.browse',['parentCategories'=>$parentCategories]);
     }
     
     function addNewCategoryPage(){
         $type="add";
           return view('admin.parentCategories.edit_add',['type'=>$type]);
         }
 
     function saveNewCategory(Request $request){
           $parentCategory=new ParentCategory();
             $parentCategory->parentCategoryName = $request->parentCategoryName;
             $parentCategory->save();
     
        return redirect()->route('parentCategory.list.view');
     }
     function editCategoryPage(Request $req){
        $parentCategory=ParentCategory::find($req->id);
        $type="edit";
        return view('admin.parentCategories.edit_add',['type'=>$type,'parentCategory'=>$parentCategory]);
     }
     function updateCategory(Request $req){
        $parentCategory=ParentCategory::find($req->id);
        $parentCategory->parentCategoryName = $req->parentCategoryName;
        $parentCategory->update();
        return redirect()->route('parentCategory.list.view');

     }
     function deleteCategory(Request $req){
      $parentCategory=ParentCategory::find($req->id);
      $parentCategory->delete();
      return redirect()->route('parentCategory.list.view');
     }
     function categoryProductGallery(Request $request){
      
      $allImages=Product::where('categoryId',$request->id)->get();
     return view('admin.parentCategories.category_products',['images'=>$allImages]);
   }
}
