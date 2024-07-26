@extends('index')

@section('main-content')
    <div class="bg-green-300">
        <div class="flex pt-4 px-8 justify-between items-center">
            <div class="flex items-center">
                <img src="{{ Auth::user()->profile_photo_path }}" alt="" class="w-16 h-16 object-cover rounded-full">
                <div class="flex ml-4 bg-yellow-100 px-4 py-2 items-center text-xl h-min">{{ Auth::user()->full_name }}</div>
            </div>
            <a href="{{ route('logout') }}" class="bg-gray-200 h-min px-3 py-1 hover:bg-gray-400">
                Logout
            </a>
        </div>
        <div class="bg-white mx-8 mt-4 pt-2 shadow-lg">
            <div class="mt-4 px-4 w-full flex justify-between items-center">
                {{-- App bar --}}
                <div class="flex justify-between items-center h-min min-w-40 text-2xl">
                    Data Absen
                </div>
                <div class="flex justify-between rounded-lg text-lg p-2 shadow-md bg-sky-200">
                    <form action="riwayat" method="post" id="form-id" class="flex justify-evenly w-full h-min m-0">
                        @csrf
                        <div class="w-full">
                            <input type="month" name="month" id="month" class="w-full rounded-md p-2">
                        </div>
                        <div class="">
                            <button type="submit" class="h-full -rotate-45 ml-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 text-blue-500 hover:text-sky-400">
                                    <path
                                        d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-4 w-full mx-4">
                <table class="table-fixed mx-auto border-collapse">
                    <thead>
                        <th class="border">Foto dan Lokasi</th>
                        <th class="border">Tanggal</th>
                        <th class="border">Waktu</th>
                        <th class="border">Nama Guru</th>
                        <th class="border">Keterangan</th>
                    </thead>
                    <tbody>
                        @foreach ($history as $h)
                            <tr>
                                <td class="border px-4">
                                    <div class="flex text-center space-x-2">
                                        @if ($h->p_masuk)
                                            <img src="{{ $h->p_masuk }}" alt="" class="h-32 w-32 object-cover">
                                            <img src="{{ $h->p_pulang }}" alt="" class="h-32 w-32 object-cover">
                                        @endif
                                        <div id="map" class="w-32 h-32"></div>
                                    </div>
                                </td>
                                <td class="border text-center px-4">{{ $h->date }} </td>
                                <td class="border text-center px-4">{{ $h->masuk }} - {{ $h->pulang }}</td>
                                <td class="border text-center px-4">{{ Auth::user()->full_name }}</td>
                                <td class="border text-center px-4">
                                    @if ($h->kerja == 'libur')
                                        <span class="text-red-400"> (Hari Libur)</span>
                                    @else
                                        {{ $h->keterangan }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mb-16">
                @foreach ($history as $h)
                    <div
                        class="border rounded-lg mt-4 p-4 space-y-1 {{ $h->kerja != 'kerja' ? 'bg-slate-100 text-slate-500' : '' }}">
                        <div class="flex justify-between">
                            <div>
                                {{ $h->date }}
                            </div>
                            <div class="font-bold">{{ $h->kerja == 'kerja' ? '' : 'Libur' }}</div>
                        </div>
                        <div class="h-[1px] bg-slate-300"></div>
                        <div class="flex justify-between">
                            <div class="{{ $h->kerja != 'kerja' ? 'bg-slate-100 text-slate-500' : 'text-slate-600' }}">
                                Masuk
                            </div>
                            <div>
                                @if ($h->masuk)
                                    {{ $h->masuk }}
                                @else
                                    <div class="{{ $h->kerja == 'libur' ? '' : 'text-red-500' }}">
                                        {{ $h->kerja == 'libur' ? '-' : 'Belum absen' }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div {{ $h->kerja != 'kerja' ? 'bg-slate-100 text-slate-500' : 'text-slate-600' }}>Pulang
                            </div>
                            <div>
                                @if ($h->pulang)
                                    {{ $h->pulang }}
                                @else
                                    <div class="{{ $h->kerja == 'libur' ? '' : 'text-red-500' }}">
                                        {{ $h->kerja == 'libur' ? '-' : 'Belum absen' }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (count($history) == 0)
                    <div class="h-1/2 text-center items-center content-center">
                        <div>
                            Tidak ada data untuk ditampilkan
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById('month').defaultValue = "{{ $bulan }}"
    </script>
@endsection
