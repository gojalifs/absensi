<div class="bg-slate-50 w-full h-dvh shadow-lg">
    <div class="bg-sky-400 shadow-lg h-32 px-2 content-center text-2xl">SMP N 2 Teluk Jambe Barat</div>
    <div class="h-[1px] bg-slate-50"></div>
    <div class="text-lg bg-sky-400 pt-2 pb-2 px-2">
        Halo, {{ Auth::user()->name }}
    </div>
    <div class="pt-2 px-4 py-2">
        <div>
            <ul class="space-y-2">
                <a href="/">
                    <li
                        class="hover:bg-sky-300 rounded-md p-2 {{ $url == 'https://absensi.test/dashboard' ? 'bg-sky-200' : '' }}">
                        Dashboard</li>
                </a>
                <a href="/data-absensi">
                    <li
                        class="hover:bg-sky-300 rounded-md p-2 {{ $url == 'https://absensi.test/data-absensi' ? 'bg-sky-200' : '' }}">
                        Data Absensi</li>
                </a>
                <a href="/data-guru">
                    <li
                        class="hover:bg-sky-300 rounded-md p-2 {{ $url == 'https://absensi.test/data-guru' ? 'bg-sky-200' : '' }}">
                        Data Guru</li>
                </a>
                <a href="{{ route('data.lokasi') }}">
                    <li
                        class="hover:bg-sky-300 rounded-md p-2 {{ $url == 'https://absensi.test/data-lokasi' ? 'bg-sky-200' : '' }}">
                        Data Lokasi</li>
                </a>
            </ul>
        </div>
    </div>
</div>
