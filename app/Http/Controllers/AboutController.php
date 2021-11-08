<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    public function HomeAbout(){
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabout'));
    }

    public function AddAbout(){
        return view('admin.home.about');
    }

    public function StoreAbout(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'short_dis' => 'required',
            'long_dis' => 'required',
            ],
            [
                'title.required' => 'Please Input brand Name',
            ]
        ); 

        HomeAbout::insert([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            'created_at'=>Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About Added');
    }

    public function Portfolio(){
        
        return view('pages.portfolio');
    }




}
