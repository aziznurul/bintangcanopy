@extends('layouts.app')

@section('content')

<section id="kontak" class="max-w-7xl mx-auto px-6 md:px-16 py-12 bg-white border border-blue-600 rounded-[5px] shadow-sm">
    <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-600 pl-3 mb-8">Kontak Kami</h2>

@if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('kontak.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block font-semibold mb-1">Nama</label>
        <input type="text" name="name" id="name" 
               value="{{ old('name') }}"
               class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
               required>
        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="email" class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" id="email" 
               value="{{ old('email') }}"
               class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
               required>
        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="message" class="block font-semibold mb-1">Pesan</label>
        <textarea name="message" id="message" rows="5"
                  class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                  required>{{ old('message') }}</textarea>
        @error('message')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>

    <button type="submit" 
            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded transition">
        Kirim Pesan
    </button>
</form>

</section>

@endsection
