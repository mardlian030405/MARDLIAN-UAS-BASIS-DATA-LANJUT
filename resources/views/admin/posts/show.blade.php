<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<x-navbar></x-navbar>
   <div class="container mx-auto py-8">
    <h1 class="text-4xl font-bold mb-6 text-gray-800">Detail Post</h1>

    <div class="bg-white shadow rounded-lg p-6">
        @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-96 w-full object-cover rounded mb-4">
        @endif

        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $post->title }}</h2>

        <p class="text-gray-600 mb-4">
            <span class="font-semibold">Slug:</span> {{ $post->slug }}
        </p>

        <p class="text-gray-700 leading-relaxed mb-4">{{ $post->content }}</p>

        <p class="text-sm">
            <span class="font-semibold">Status:</span>
            <span class="px-2 py-1 rounded text-sm font-medium
                {{ $post->status == 'publish' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                {{ ucfirst($post->status) }}
            </span>
        </p>

        <p class="text-sm text-gray-500 mt-2">
            <span class="font-semibold">Dibuat pada:</span> {{ $post->created_at->format('d M Y, H:i') }}
        </p>

        <div class="mt-6">
            <a href="{{ route('admin.posts.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Kembali</a>
        </div>
    </div>
</div>
<x-footer></x-footer>
</body>
</html>