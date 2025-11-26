// Inisialisasi peta Leaflet
window.initMap = function() {
    console.log('Initializing map...');
    
    // Inisialisasi peta dengan view di Malang
    const map = L.map('map').setView([-7.9666, 112.6326], 10);
    
    // Tambahkan tile layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);
    
    // Contoh marker (sesuaikan dengan kebutuhan)
    L.marker([-7.9666, 112.6326])
        .addTo(map)
        .bindPopup('Lokasi Contoh di Malang')
        .openPopup();
    
    console.log('Map initialized successfully');
}