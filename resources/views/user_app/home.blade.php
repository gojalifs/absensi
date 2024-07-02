@extends('app')

@section('content')
    <div>
        {{-- APP BAR --}}
        <div
            class="h-28 bg-gradient-to-b from-blue-900 to-sky-600 shadow-xl
        flex justify-between px-8 items-center text-white">
            <div>
                <div class="text-2xl">
                    Halo, {{ $user->name }}
                </div>
                <div class="text-sm" id="time"></div>
            </div>
            <div>
                <img src="{{ $user->path }}" alt="avatar" class="rounded-full w-16 h-16">
            </div>
        </div>

        {{-- Riwayat Absensi --}}
        <div class="flex flex-col h-48 w-80 mt-6 mx-auto rounded-xl border-2 shadow-lg">
            <div class="flex justify-around bg-sky-300 rounded-t-xl text-white">
                <div>Masuk</div>
                <div>Pulang</div>
            </div>

            <div class="flex grow justify-around items-center text-4xl font-medium">
                <div>
                    @if ('a' == 'sudah')
                        <div>07.59</div>
                    @else
                        <div>-</div>
                    @endif
                </div>
                <div>
                    @if ('absen' == 'sudah')
                        <div>17.03</div>
                    @else
                        <div>-</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Menu Utama --}}
        <div class="px-4 mt-4">Menu Utama</div>
        <div class="grid grid-cols-2 text-sm py-4 px-8">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-12 w-full">
                    <path fill-rule="evenodd"
                        d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                        clip-rule="evenodd" />
                </svg>
                <div class="font-normal text-center">
                    Check in
                </div>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-12 w-full">
                    <path fill-rule="evenodd"
                        d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                        clip-rule="evenodd" />
                </svg>
                <div class="font-normal text-center">
                    Check out
                </div>
            </div>
        </div>

        {{-- Bottom navbar --}}
        @extends('user_app/bottom_bar')
    </div>
@endsection

<script type="text/javascript">
    function showTime() {
        var date = new Date(),
            utc = new Date(Date.UTC(
                date.getFullYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours(),
                date.getMinutes(),
                date.getSeconds()
            ));

        document.getElementById('time').innerHTML = utc.toLocaleTimeString();
    }

    setInterval(showTime, 1000);
</script>
