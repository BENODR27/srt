<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\ParentCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function categoryList(){
        $categories=Category::all();
       return view('admin.categories.browse',['categories'=>$categories]);
     }
     
     function addNewCategoryPage(){
         $type="add";
         $parentCategories=ParentCategory::all();
           return view('admin.categories.edit_add',['type'=>$type,'parentCategories'=>$parentCategories]);
         }
 
     function saveNewCategory(Request $request){
           $category=new Category();
             $category->categoryName = $request->categoryName;
             $category->parentCategoryId = $request->parentCategoryId;
             if($category->parentCategoryId!=null){
               $category->isSubCategory = 1;
             }
             $category->save();
     
        return redirect()->route('category.list.view');
     }
     function editCategoryPage(Request $req){
        $category=Category::find($req->id);
        $type="edit";
        $parentCategories=ParentCategory::all();
        return view('admin.categories.edit_add',['type'=>$type,'category'=>$category,'parentCategories'=>$parentCategories]);
     }
     function updateCategory(Request $req){
        $category=Category::find($req->id);
        $category->categoryName = $req->categoryName;
        $category->update();
        return redirect()->route('category.list.view');

     }
     function deleteCategory(Request $req){
      $category=Category::find($req->id);
      $category->delete();
      return redirect()->route('category.list.view');
     }
     function categoryProductGallery(Request $request){
      
      $allImages=Product::where('categoryId',$request->id)->get();
     return view('admin.categories.category_products',['images'=>$allImages]);
   }
}
