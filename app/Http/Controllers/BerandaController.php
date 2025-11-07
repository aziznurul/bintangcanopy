<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagline;
use App\Models\SocialMedia;
use App\Models\About;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\SiteLogo;
use App\Models\HomeSlide;

class BerandaController extends Controller
{
    public function index()
    {
        $logo = SiteLogo::first();
        $slides = HomeSlide::all();
        $tagline = Tagline::first();
        $social = SocialMedia::first();
        $about = About::first();
        $services = Service::all();
        $portfolios = Portfolio::all();

        return view('beranda', compact(
            'logo', 'slides', 'tagline', 'social', 'about', 'services', 'portfolios',
        ));
    }
}
