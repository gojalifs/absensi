<div class="bg-sky-400 w-full h-dvh shadow-lg">
    <div class="h-32 px-2 content-center text-2xl">SMP N 2 Teluk Jambe Barat</div>
    <div class="bg-slate-200 mt-2 px-4 py-2 h-full">
        <div class="text-lg">
            Halo, {{ Auth::user()->name }}
        </div>
        <div class="h-[1px] bg-slate-400 my-4"></div>
        <div>
            <ul class="space-y-2">
                <a href="/">
                    <li class="hover:bg-sky-300 rounded-md p-2 {{$url == 'https://absensi.test/dashboard' ? 'bg-sky-200' : ''}}">Dashboard</li>
                </a>
                <a href="/data-absensi">
                    <li class="hover:bg-sky-300 rounded-md p-2">Data Absensi</li>
                </a>
                <a href="/data-guru">
                    <li class="hover:bg-sky-300 rounded-md p-2">Data Guru</li>
                </a>
            </ul>
        </div>
    </div>
</div>
