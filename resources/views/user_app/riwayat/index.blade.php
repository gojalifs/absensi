@extends('app')

@section('content')
    <div class="max-w-[768px] mx-auto">
        <div class="mt-8 px-4 mb-16 w-full">
            {{-- App bar --}}
            <div class="flex justify-between items-center text-2xl">
                Riwayat Absensi
            </div>
            <div class="flex justify-between rounded-lg mt-8 text-lg p-2 shadow-md bg-sky-200">
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
            </div>
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
                        <div class="{{ $h->kerja != 'kerja' ? 'bg-slate-100 text-slate-500' : 'text-slate-600' }}">Masuk
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
                        <div {{ $h->kerja != 'kerja' ? 'bg-slate-100 text-slate-500' : 'text-slate-600' }}>Pulang</div>
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
    @extends('user_app/bottom_bar')

    <script>
        document.getElementById('month').defaultValue = "{{ $bulan }}"
    </script>
@endsection
