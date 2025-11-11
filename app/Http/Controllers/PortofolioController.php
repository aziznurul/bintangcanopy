<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioInfo;
use Illuminate\Support\Facades\Http;

class PortofolioController extends Controller
{
    public function index()
    {
    // Ambil semua kategori unik untuk dropdown filter
    $categories = Portfolio::select('kategori')->distinct()->pluck('kategori');

    // Ambil query search dan kategori
    $query = Portfolio::with('photos');

    if ($search = request('search')) {
        $query->where('judul', 'like', '%' . $search . '%');
    }

    if ($kategori = request('kategori')) {
        $query->where('kategori', $kategori);
    }

    $portfolios = $query->paginate(100); // tampil 6 per halaman
    $info = PortfolioInfo::first();

    // --- YouTube Integration ---
    $apiKey = env('YOUTUBE_API_KEY');
    $channelId = env('YOUTUBE_CHANNEL_ID');

    $latestVideo = null;
    $otherVideos = [];

    if ($apiKey && $channelId) {
        try {
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'part' => 'snippet',
                'channelId' => $channelId,
                'order' => 'date',
                'maxResults' => 3, // ambil 3 video terbaru
                'type' => 'video',
                'key' => $apiKey,
            ]);

            $videos = $response->json('items') ?? [];

            if (count($videos) > 0) {
                $latestVideo = $videos[0]; // video paling baru
                $otherVideos = array_slice($videos, 1); // sisanya (video ke-2 dan ke-3)
            }
        } catch (\Exception $e) {
            \Log::error('YouTube API Error: ' . $e->getMessage());
            $latestVideo = null;
            $otherVideos = [];
        }
    }

    return view('portfolio', compact('portfolios', 'info', 'categories', 'latestVideo', 'otherVideos'));


    }

    public function show($id)
    {
        $portfolio = Portfolio::with('photos')->findOrFail($id);

        // Ambil portfolio lainnya (misal 8 item terbaru selain yang sedang dilihat)
        $relatedPortfolios = Portfolio::where('id', '!=', $portfolio->id)
                                    ->latest()
                                    ->take(8)
                                    ->get();

        return view('portfolio-show', compact('portfolio', 'relatedPortfolios'));
    }
}
