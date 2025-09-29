<?php

namespace App\Helpers;
use App\Models\Product;
use App\Models\ParentCategory;
use App\Models\Category;

class MyHelper
{
    public static function generateDropDownData(){
        $dropdownNameMain="";
        $subCategoryList=[];
        $data=[];
        $parentCategories=ParentCategory::all();
        foreach($parentCategories as $key=>$parentCategory){
            $dropdownNameMain=$parentCategory->parentCategoryName;
            $subCategories=Category::where('parentCategoryId',$parentCategory->id)->get();
            $subCategoryList=[];
            foreach($subCategories as $key=>$subCategory){
                $subCategoryList[count($subCategoryList)!=0?count($subCategoryList)+1:0]=[
                    'dropdownNameSub'=>$subCategory->categoryName,
                    'dropdownIdSub'=>$subCategory->id
                 ];              
            }

             

            $data[count($data)!=0?count($data)+1:0]=[
                'dropdownNameMain'=>$dropdownNameMain,
                'dropdownIdMain'=>null,
                'subCategoryList'=>$subCategoryList
            ];
           
        }

        $remainigMainCategories=Category::where('isSubCategory',0)->get();
        foreach($remainigMainCategories as $key=>$remainigMainCategory){
            $data[count($data)!=0?count($data)+1:0]=[
                'dropdownNameMain'=>$remainigMainCategory->categoryName,
                'dropdownIdMain'=>$remainigMainCategory->id,
                'subCategoryList'=>null
            ];
        }
        // dd($data);
        return $data;
    }
}
