<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="bg-indigo-900">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="md:flex md:items-center md:gap-12">
                <a class="block text-white font-bold text-2xl" href="/">
                    <h1>M. MARDLIAN NUROFIQ</h1>
                </a>
            </div>

           
            <div class="flex items-center gap-4">
                <div class="sm:flex sm:gap-4">
                    <a class="rounded-md bg-white px-5 py-2.5 hover:bg-indigo-900 hover:text-white text-sm font-medium text-indigo-900 shadow"
                        href="{{ route('admin.posts.index') }}">
                        Dashboard
                    </a>
                    <div class="hidden sm:flex">
                        <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-indigo-900"
                            href="{{ route('admin.posts.create') }}">
                            Admin
                        </a>
                    </div>
                </div>

                <div class="block md:hidden">
                    <button id="hamburger-btn"
                        class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden">
        <nav aria-label="Global">
            <ul class="flex flex-col items-start gap-4 p-4 text-sm bg-indigo-900 text-white">
                <li>
                    <a class="transition hover:text-gray-500/75" href="{{ route('admin.posts.index') }}"> Dashboard </a>
                </li>
                <li>
                    <a class="transition hover:text-gray-500/75" href="{{ route('admin.posts.create') }}"> Create Post </a>
                </li>
            </ul>
        </nav>
    </div>
</header>
  <section class="p-6 bg-gray-50" style="
      background-image: url('https://www.unesa.ac.id/images/foto-29-06-2023-09-02-11-4787.png');
      background-size: cover; /* Memastikan gambar mencakup seluruh elemen */
      background-position: center; /* Pusatkan gambar */
      background-repeat: no-repeat; /* Hindari pengulangan gambar */
      height: 60vh; /* Pastikan tinggi sesuai layar penuh */
    ">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex h-600 lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl text-white font-extrabold sm:text-5xl">
                    UJIAN AKHIR SEMESTER
                    <strong class="font-extrabold text-white sm:block"> BASIS DATA LANJUT </strong>
                </h1>

                <p class="mt-4 text-white font-bold sm:text-xl/relaxed">
                    D4 MANAJEMEN INFORMATIKA
                </p>
            </div>
        </div>
    </section>
    <div class="container mx-auto py-8">
        <h1 class="text-4xl font-bold text-center mb-8">Blog Posts</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <div class="bg-white shadow-md rounded p-4">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover rounded mb-4">
                @endif
                <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                <p class="text-sm text-gray-500">{{ $post->created_at->format('d M Y') }}</p>
                <p class="mt-2">{{ Str::limit($post->content, 100) }}</p>
                 <a href="{{ route('admin.posts.show', $post) }}" class="bg-green-500 text-white px-2 py-1 rounded">Lihat</a>
            </div>
            @endforeach
        </div>
    </div>
<x-footer></x-footer>
<script>
document.getElementById('hamburger-btn').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.toggle('hidden');
});
</script>
</body>
</html>
