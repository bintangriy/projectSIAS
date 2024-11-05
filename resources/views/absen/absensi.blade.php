
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Absensi</title>
</head>

<style>
    /* Atur seluruh body */
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        background-color: #f0f0f5;
    }

    /* Styling form dan kotak utama */
#absensiForm {
    width: 100%;
    max-width: 400px;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 0 auto; /* Agar form berada di tengah */
}

/* Style Kamera */
#absensiForm .kamera {
    width: 100%;
}

h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Kamera dan Hasil Foto */
#kamera, #results {
    margin: 20px 0;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

/* Tombol */
button, a {
    background-color: #2196f3;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 16px;
    display: inline-block;
    text-align: center;
    margin: 5px 0;
    width: 100%;
}

button:hover, a:hover {
    background-color: #125487;
}

/* Hasil Foto */
#results img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

/* Responsif untuk Tablet */
@media (max-width: 768px) {
    h1 {
        font-size: 20px;
    }
    
    button, a {
        font-size: 14px;
        padding: 8px 16px;
    }
}

/* Responsif untuk Smartphone */
@media (max-width: 480px) {
    #absensiForm {
        padding: 15px;
    }

    h1 {
        font-size: 18px;
    }

    button, a {
        font-size: 14px;
        padding: 8px 16px;
    }

    #kamera, #results {
        margin: 15px 0;
    }
}

</style>
<body>
    

    <form id="absensiForm" method="POST" action="{{ route('absensi.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" id="longitude" name="longitude">
        <input type="hidden" id="foto" name="foto">

        <div id="kamera"></div>
        <button type="button" onclick="takeSnapshot()">Ambil Foto</button>

        <div id="results"></div>

        <button type="submit">Absen</button>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <script>

        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#kamera');

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;
            });
        } else {
            alert("Geolocation tidak didukung oleh browser Anda.");
        }

        function takeSnapshot() {
            Webcam.snap(function(data_uri) {
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
                document.getElementById('foto').value = data_uri; 
            });
        }
    </script>
</body>
</html>
