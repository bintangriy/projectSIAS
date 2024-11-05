<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        let map, marker;

        function showCurrentLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(displayMap, showError);
            } else {
                alert("Geolocation tidak didukung oleh browser ini.");
            }
        }

        function displayMap(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Inisialisasi Leaflet Map
            map = L.map('map').setView([latitude, longitude], 15);

            // Menambahkan tile dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Menambahkan marker di lokasi saat ini
            marker = L.marker([latitude, longitude]).addTo(map)
                .bindPopup("Lokasi Anda Saat Ini")
                .openPopup();
        }

        function showError(error) {
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("Izin lokasi ditolak oleh pengguna.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Informasi lokasi tidak tersedia.");
                    break;
                case error.TIMEOUT:
                    alert("Permintaan lokasi habis waktu.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("Kesalahan tidak diketahui.");
                    break;
            }
        }
    </script>