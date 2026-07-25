<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kerentanan</title>

    <!-- Tailwind CDN (jika belum ada) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

    <div class="flex items-center justify-center min-h-screen p-6">
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <!-- Gambar -->
            <div class="flex justify-center">
                <img src="{{ asset('img/peta_landing.png') }}"
                     class="rounded shadow-lg w-96 h-auto object-cover"
                     alt="Peta">
            </div>

            <!-- Konten Text -->
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-bold mb-3">Peta Kerentanan Bencana Alam</h1>
                <p class="text-gray-600 mb-6">
                    Banjir · Tanah Longsor · Gempa Bumi · Cuaca Ekstrem
                </p>

                <!-- Tombol Jelajahi -->
                <a href="{{ route('dashboard') }}" class="px-6 py-2 border text-black rounded hover:bg-gray-200 transition">
                    Jelajahi
                </a>

                <!-- Link Login Admin -->
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-black">
                        Login sebagai Admin
                    </a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
