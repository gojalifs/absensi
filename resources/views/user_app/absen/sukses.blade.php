@extends('app')

@section('map_header')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@endsection

@section('content')
    <div class="mt-0 mb-4">
        <div class="w-full absolute h-[272px] -z-10 -top-4 bg-blue-500 rounded-b-full"></div>
        <div class="mt-4 mx-4">
            <div>
                {{-- Todo nanti diganti dengan gambar selfie --}}
                <img src="https://htmlstream.com/preview/unify-v2.6/assets/img-temp/400x450/img5.jpg" alt=""
                    class="w-64 h-64 mx-auto rounded-lg">
            </div>
            <div class="mt-4 text-xl text-center">
                Selamat, Fajar Sidik Prasetio!
            </div>
            <div class="mt-4">
                Anda berhasil absen <span class="font-bold uppercase">masuk</span>. Semangat!!
            </div>
            <div class="mt-4">
                Berikut detail absen Anda:
            </div>
            <div class="lg:flex mt-2">
                <div class="w-full lg:w-1/3 h-40">
                    <div id="map" class="bg-red-400 w-full h-full rounded-md"></div>
                </div>
                <div class="grow space-y-2 mt-2 lg:mt-0">
                    <div class="flex">
                        <div class="w-1/2">Jenis</div>
                        <div>: Absen masuk</div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2">Jam</div>
                        <div>: 06.30</div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2">Latitude</div>
                        <div>: -6.634343</div>
                    </div>
                    <div class="flex">
                        <div class="w-1/2">Longitude</div>
                        <div>: 107.2324354</div>
                    </div>
                </div>
            </div>
            <div class="flex">
                <a href="/home" class="bg-sky-400 mx-auto mt-4 p-2 text-white shadow-md rounded-xl">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

    <script>
        var latitude = -6.2453078;
        var longitude = 107.1812406;
        var map = L.map('map').setView([latitude, longitude], 14);
        var marker = new L.marker([latitude, longitude]).addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
    </script>
@endsection
