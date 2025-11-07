<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function index()
    {
        // Ambil data social pertama
        $social = SocialMedia::first();

        return view('layouts.footer', compact('social'));
    }
}
