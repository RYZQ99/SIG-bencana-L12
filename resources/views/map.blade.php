<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Peta Bencana Malang Raya') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Map Container -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-0">
                    <div id="map" class="w-full h-96 sm:h-[600px] rounded-lg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load Leaflet dari CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        #map { 
            height: 600px; 
            width: 100%;
        }
        .leaflet-container {
            background: #e5e7eb;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta
            var map = L.map('map').setView([-7.9666, 112.6326], 10);

            // Tambahkan tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Tambahkan marker
            L.marker([-7.9666, 112.6326])
                .addTo(map)
                .bindPopup('Kota Malang<br>Pusat Wilayah Malang Raya.')
                .openPopup();

            // Tambahkan beberapa marker contoh
            var locations = [
                { lat: -8.1261, lng: 112.5139, name: "Kabupaten Malang" },
                { lat: -7.9797, lng: 112.6304, name: "Kota Batu" },
                { lat: -8.1653, lng: 112.7029, name: "Kabupaten Malang Selatan" }
            ];

            locations.forEach(function(loc) {
                L.marker([loc.lat, loc.lng])
                    .addTo(map)
                    .bindPopup(loc.name);
            });

            console.log('Peta berhasil dimuat dengan CDN');
        });
    </script>
</x-app-layout>