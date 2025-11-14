@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-semibold mb-4">
        Hasil Pencarian untuk: "{{ $query }}"
    </h1>

    <ul class="space-y-4">
        @foreach($results as $result)
            <li class="border-b pb-3">
                <a href="{{ $result['url'] }}" class="text-blue-600 font-medium text-lg hover:underline">
                    {{ $result['title'] }}
                </a>
                <p class="text-gray-600 text-sm mt-1">
                    {{ $result['content'] }}
                </p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
