<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/categories', function () {
//     return view('admin.categories.browse');
// });
// Route::get('/edit_add', function () {
//     return view('admin.categories.edit_add');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout_admin',function(){
Auth::logout();
return redirect()->route('login');
})->name('logout_admin');
//parent categories

Route::get('/parent_categories_list',[App\Http\Controllers\ParentCategoryController::class, 'categoryList'])->name('parentCategory.list.view');
Route::get('/parent_category_add',[App\Http\Controllers\ParentCategoryController::class, 'addNewCategoryPage'])->name('parentCategory.add');
Route::post('/parent_category_save',[App\Http\Controllers\ParentCategoryController::class, 'saveNewCategory'])->name('parentCategory.save');
Route::get('/parent_category_edit',[App\Http\Controllers\ParentCategoryController::class, 'editCategoryPage'])->name('parentCategory.edit');
Route::any('/parent_category_update',[App\Http\Controllers\ParentCategoryController::class, 'updateCategory'])->name('parentCategory.update');
Route::get('/parent_category_delete',[App\Http\Controllers\ParentCategoryController::class, 'deleteCategory'])->name('parentCategory.delete');
Route::get('/parent_category_product_images',[App\Http\Controllers\ParentCategoryController::class, 'categoryProductGallery'])->name('parentCategory.product.view');



//categories

Route::get('/categories_list',[App\Http\Controllers\CategoryController::class, 'categoryList'])->name('category.list.view');
Route::get('/category_add',[App\Http\Controllers\CategoryController::class, 'addNewCategoryPage'])->name('category.add');
Route::post('/category_save',[App\Http\Controllers\CategoryController::class, 'saveNewCategory'])->name('category.save');
Route::get('/category_edit',[App\Http\Controllers\CategoryController::class, 'editCategoryPage'])->name('category.edit');
Route::any('/category_update',[App\Http\Controllers\CategoryController::class, 'updateCategory'])->name('category.update');
Route::get('/category_delete',[App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('category.delete');
Route::get('/category_product_images',[App\Http\Controllers\CategoryController::class, 'categoryProductGallery'])->name('category.product.view');



//products
Route::get('/product_images',[App\Http\Controllers\ProductController::class, 'productGallery'])->name('product.images.view');
Route::get('/product_add',[App\Http\Controllers\ProductController::class, 'addNewProductPage'])->name('product.images.add');
Route::post('/product_save',[App\Http\Controllers\ProductController::class, 'saveNewProduct'])->name('product.images.save');
Route::get('/product_edit',[App\Http\Controllers\ProductController::class, 'editProductPage'])->name('product.edit');
Route::put('/product_update',[App\Http\Controllers\ProductController::class, 'updateProduct'])->name('product.update');
Route::get('/product_delete',[App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('product.delete');
Route::any('/toggleLatest',[App\Http\Controllers\ProductController::class, 'toggleLatest'])->name('toggleLatest');

//slides

Route::get('/slide_images',[App\Http\Controllers\SlideController::class, 'slideGallery'])->name('slide.images.view');
Route::get('/slide_add',[App\Http\Controllers\SlideController::class, 'addNewSlidePage'])->name('slide.images.add');
Route::post('/slide_save',[App\Http\Controllers\SlideController::class, 'saveNewSlide'])->name('slide.images.save');
Route::get('/slide_edit',[App\Http\Controllers\SlideController::class, 'editSlidePage'])->name('slide.edit');
Route::put('/slide_update',[App\Http\Controllers\SlideController::class, 'updateSlide'])->name('slide.update');
Route::get('/slide_delete',[App\Http\Controllers\SlideController::class, 'deleteSlide'])->name('slide.delete');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


//testimonials

// List products
Route::get('/testimonials', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonial.index');

// Show create product form
Route::get('/testimonial_add', [App\Http\Controllers\TestimonialController::class, 'create'])->name('testimonial.create');

// Store a new product
Route::post('/testimonials', [App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonial.store');

// Show edit product form
Route::get('/testimonials_edit', [App\Http\Controllers\TestimonialController::class, 'edit'])->name('testimonial.edit');

// Update a product
Route::put('/testimonials', [App\Http\Controllers\TestimonialController::class, 'update'])->name('testimonial.update');

Route::get('/testimonials/delete', [App\Http\Controllers\TestimonialController::class, 'delete'])->name('testimonial.delete');




//website routes

Route::get('/',[App\Http\Controllers\WebsiteController::class, 'website'])->name('/');
Route::get('/products', [App\Http\Controllers\WebsiteController::class, 'getSelectedCategoryProducts'])->name('products');
Route::get('/product', [App\Http\Controllers\WebsiteController::class, 'getSelectedProduct'])->name('product');
Route::get('/aboutus', [App\Http\Controllers\WebsiteController::class, 'aboutus'])->name('aboutus');