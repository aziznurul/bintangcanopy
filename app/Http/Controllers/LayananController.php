<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\HomeSlide;
use App\Models\SiteLogo;
use App\Models\ServiceInfo;
use App\Models\Service;

class LayananController extends Controller
{
    public function index()
    {
        $logo = SiteLogo::first();
        $social = SocialMedia::first();
        $slides = HomeSlide::all();
        $serviceinfo = ServiceInfo::first();
        $services = Service::all();

        return view('layanan', compact('logo', 'social', 'slides','serviceinfo', 'services'));
    }
}
