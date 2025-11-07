<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\OrganizationStructure;

class TentangController extends Controller
{
    public function index()
    {
        $about = About::first();
        $struktur = OrganizationStructure::all();

        return view('tentang', compact('about', 'struktur'));
    }
}
