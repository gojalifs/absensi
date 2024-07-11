@extends('admin.index')

@section('map_header')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@endsection

@section('admin-content')
    <div class="mx-4">
        <div class="mx-4 mt-8 text-3xl">
            Data Absensi {{ $day }}
        </div>
        <div class="mt-4 flex space-x-4 items-center">
            <div>
                Filter
            </div>
            <div class="pl-8">
                <label for="date" class="pr-4">Tanggal</label>
                <input type="date" name="date" id="date" value="{{ $date }}" class="border p-2">
            </div>
            <div class="pl-4">
                <label for="jenis" class="pr-4">Jenis</label>
                <select name="jenis" id="jenis" class="p-2 px-4 border cursor-pointer">
                    <option value="semua" class="px-2">Semua</option>
                    <option value="masuk" class="px-2">Masuk
                    </option>
                    <option value="pulang" class="px-2">Pulang</option>
                </select>
            </div>
        </div>
        <div class="mt-4">
            <table class="table-auto border border-collapse w-full">
                <thead>
                    <th class="border p-2">No.</th>
                    <th class="border p-2">Nama Guru</th>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Waktu</th>
                    <th class="border p-2">Jenis</th>
                    <th class="border p-2">Selfie</th>
                    <th class="border p-2">Lokasi</th>
                    {{-- <th class="border p-2">Aksi</th> --}}
                </thead>
                <tbody>
                    @foreach ($absensis as $key => $absen)
                        <form action="edit-guru" method="post">
                            <tr>
                                <td class="border p-2">
                                    {{ $key + 1 }}
                                </td>
                                <td class="border p-2">
                                    <input type="text" name="name" id="name" value="{{ $absen->full_name }}"
                                        disabled>
                                </td>
                                <td class="border p-2">
                                    {{ $absen->date }}
                                </td>
                                <td class="border p-2">
                                    {{ $absen->time }}
                                </td>
                                <td class="border p-2">
                                    {{ $absen->jenis }}
                                </td>
                                <td class="border p-2">
                                    <img src="{{ $absen->selfie }}" alt="" class="w-40 h-40 mx-auto rounded-md">
                                </td>
                                <td class="border p-2">
                                    <script>
                                        $(document).ready(function() {
                                            var latitude = "{{ $absen->lokasi['lat'] }}";
                                            var longitude = "{{ $absen->lokasi['lng'] }}";
                                            var map = L.map('map{{ $absen->id }}').setView([latitude, longitude], 14);
                                            var marker = new L.marker([latitude, longitude]).addTo(map);

                                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                attribution: '© OpenStreetMap contributors'
                                            }).addTo(map);
                                        });
                                    </script>
                                    <div class="bg-red-400 w-40 h-40 mx-auto" id="map{{ $absen->id }}">
                                    </div>
                                </td>
                                {{-- <td class="border p-2">
                                    <div class="flex space-x-2">
                                        <a href="/data-guru/{{ $absen->id }}">
                                            <div class="bg-sky-400 px-2 py-1 text-white hover:bg-sky-700 rounded-md w-min">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                            </div>
                                        </a>
                                        <button class="bg-red-400 px-2 py-1 text-white hover:bg-red-700 rounded-md"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="size-6">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td> --}}
                            </tr>
                        </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const jenis = document.getElementById('jenis');

            // Tentukan nilai untuk filter jenis
            for (let i = 0; i < jenis.options.length; i++) {
                if (jenis.options[i].value == '{{ $jenis }}') {
                    jenis.selectedIndex = i;
                    break;
                }
            }

            jenis.addEventListener('change', function() {
                document.location.href = `/data-absensi?jenis=${jenis.value}`
            })
        })
    </script>
@endsection