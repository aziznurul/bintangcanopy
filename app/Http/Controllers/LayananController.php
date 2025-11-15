<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use App\Models\HomeSlide;
use App\Models\SiteLogo;
use App\Models\ServiceInfo;
use App\Models\Service;
use Illuminate\Support\Facades\Http;

class LayananController extends Controller
{
    public function index()
    {
        $logo = SiteLogo::first();
        $social = SocialMedia::first();
        $slides = HomeSlide::all();
        $serviceinfo = ServiceInfo::first();
        $services = Service::all();

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

        return view('layanan', compact('logo', 'social', 'slides','serviceinfo', 'services', 'latestVideo', 'otherVideos'));
    }
}
