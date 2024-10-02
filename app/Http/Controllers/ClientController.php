<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Feature;
use App\Models\Hero;
use App\Models\Libraries;
use App\Models\Pricing;
use App\Models\Support;
use App\Models\Video;
use App\Models\LinkSocialMedia;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    public function homePage(){
        $hero = Hero::first();
        $features = Feature::all();
        $libraries = Libraries::all();
        // return $features;
        return view('client.homePage', [
            'hero' => $hero,
            'features' => $features,
            'libraries'=> $libraries,
        ]);
    }
    public function pricing(){
        $pricings = Pricing::all();
        //return $pricings;
        return view('client.pricing',[
            'pricings'=> $pricings
        ]);
    }
    public function academy(){
        $academies = Academy::all();
        return view('client.academy',[
            'academies'=> $academies
        ]);
    }
    public function support(){
        $supports = Support::first();
       // return $supports;
        return view('client.support',[
          'supports'=> $supports
        ]);
    }
    public function video(){
        $videos = Video::all();
        return view('client.video',[
          'videos' => $videos	
        ]);
    }


}