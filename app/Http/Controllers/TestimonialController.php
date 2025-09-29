<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;


class TestimonialController extends Controller
{
    public function index()
{
    $testimonials = Testimonial::all();
    return view('admin.testimonials.browse', compact('testimonials'));
}

public function create()
{
    $type="add";
    return view('admin.testimonials.edit_add',['type'=>$type]);
}

public function store(Request $req)
{
    $testimonial =new Testimonial();
    $testimonial->customerNote=$req->customerNote;
    $testimonial->customerName=$req->customerName;
    $testimonial->save();
    return redirect()->route('testimonial.index');
}

public function edit(Request $req)
{
    $type="edit";
    $testimonial=Testimonial::find($req->id);
    return view('admin.testimonials.edit_add',['type'=>$type,'testimonial'=>$testimonial]);
}

public function update(Request $req)
{
    $testimonial=Testimonial::find($req->id);
    $testimonial->customerNote=$req->customerNote;
    $testimonial->customerName=$req->customerName;
    $testimonial->update();
    return redirect()->route('testimonial.index');

}
public function delete(Request $req)
{
    $testimonial=Testimonial::find($req->id);
    $testimonial->delete();
    return redirect()->back();

}

}
