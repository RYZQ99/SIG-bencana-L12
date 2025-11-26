import './bootstrap';

// Import Leaflet dan CSS-nya
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

// Fix untuk marker icons di Leaflet
delete L.Icon.Default.prototype._getIconUrl;
L.Icon.Default.mergeOptions({
    iconRetinaUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-2x.png',
    iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
});

// Make Leaflet available globally
window.L = L;

// Optional: Initialize any Alpine.js components
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();