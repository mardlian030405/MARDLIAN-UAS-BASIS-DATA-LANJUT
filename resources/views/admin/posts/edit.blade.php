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
    <h1 class="text-3xl font-bold mb-4">Edit Post</h1>
    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block text-sm font-medium">Judul</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="slug" class="block text-sm font-medium">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ $post->slug }}" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="content" class="block text-sm font-medium">Konten</label>
            <textarea id="content" name="content" class="w-full border rounded p-2">{{ $post->content }}</textarea>
        </div>
        <div>
            <label for="image" class="block text-sm font-medium">Gambar</label>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-20 mb-2">
            @endif
            <input type="file" id="image" name="image" class="w-full border rounded p-2">
        </div>
        <div>
            <label for="status" class="block text-sm font-medium">Status</label>
            <select id="status" name="status" class="w-full border rounded p-2">
                <option value="publish" {{ $post->status == 'publish' ? 'selected' : '' }}>Publish</option>
                <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
<x-footer></x-footer>
</body>
</html>