<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = slider::latest()->get() ; //eorm
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){
        $slider_image = $request->file('image');
        //create auto generated id, to make the image uniqu

        //using the intervention package

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1088)->save('image/slider/'.$name_gen);
        $last_img = 'image/slider/'.$name_gen;

        slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);

        // return Redirect()->back()->with('success', 'Brand inserted successfully');
        // redirect to another page 
        return Redirect()->route('home.slider')->with('success', 'Slider inserted successfully');

    }


}
