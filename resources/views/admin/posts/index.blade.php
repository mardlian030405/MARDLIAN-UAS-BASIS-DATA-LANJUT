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
        <h1 class="text-4xl font-bold mb-6 text-gray-800">Dashboard</h1>
    <div class="mb-6">
        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            Tambah Post
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">No</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Judul</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Gambar</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Status</th>
                    <th class="px-4 py-2 text-center text-gray-600 font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">

                    <td class="border px-4 py-2">{{ $index + 1 }}</td>

                    <td class="border px-4 py-2 font-medium text-gray-800">{{ $post->title }}</td>

                    <td class="border px-4 py-2">
                        @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="h-36 w-auto object-cover rounded shadow">
                        @else
                        <span class="text-gray-500">Tidak ada gambar</span>
                        @endif
                    </td>

                    <td class="border px-4 py-2">
                        <span class="px-2 py-1 rounded text-sm font-medium 
                            {{ $post->status == 'publish' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                            {{ ucfirst($post->status) }}
                        </span>
                    </td>

                    <td class="border px-4 py-2 text-center space-x-2">
                        <a href="{{ route('admin.posts.show', $post) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Lihat</a>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                onclick="return confirm('Yakin ingin menghapus post ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($posts->isEmpty())
    <div class="text-center py-6 text-gray-500">
        <p>Tidak ada data untuk ditampilkan.</p>
    </div>
    @endif
</div>
<x-footer></x-footer>
</body>
</html>