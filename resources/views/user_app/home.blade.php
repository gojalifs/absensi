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
                <img src="{{ $user->profile_photo_path ?? 'https://www.svgrepo.com/show/384674/account-avatar-profile-user-11.svg' }}"
                    alt="avatar" class="rounded-full w-16 h-16">
            </div>
        </div>

        {{-- Riwayat Absensi --}}
        <div class="flex flex-col h-48 w-80 mt-6 mx-auto rounded-xl border-2 shadow-lg">
            <div class="flex justify-around bg-sky-300 rounded-t-xl text-white">
                <div>Masuk</div>
                <div>Pulang</div>
            </div>

            <div class="flex grow justify-around items-center text-4xl font-medium text-center">
                <div class="w-1/2">
                    @if ($masuk)
                        <div>{{ $masuk }}</div>
                    @else
                        <div>-</div>
                    @endif
                </div>
                <div class="w-1/2">
                    @if ($pulang)
                        <div>{{ $pulang }}</div>
                    @else
                        <div>-</div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Menu Utama --}}
        <div class="px-4 mt-4 sm:text-3xl sm:mt-8 sm:mb-4">Menu Utama</div>
        <div class="grid grid-cols-2 sm:grid-cols-3 text-sm py-6 px-8 sm:max-w-[700px] mx-auto">
            <div class="group">
                <a href="absen/masuk" id="checkin">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-12 mx-auto">
                        <path fill-rule="evenodd"
                            d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="flex justify-center">
                        <div class="font-normal text-center group-hover:border-b-2 group-hover:border-sky-400"
                            id="checkin_text">
                            Check in
                        </div>
                    </div>
                </a>
            </div>
            <div class="group">
                <a href="absen/pulang" id="checkout">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-12 mx-auto">
                        <path fill-rule="evenodd"
                            d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="flex justify-center">
                        <div class="font-normal text-center group-hover:border-b-2 group-hover:border-sky-400"
                            id="checkout_text">
                            Check out
                        </div>
                    </div>
                </a>
            </div>
            <div class="mt-4 group">
                <a href="absen/izin">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-12 mx-auto">
                        <path
                            d="M8 13H16M8 13V18C8 19.8856 8 20.8284 8.58579 21.4142C9.17157 22 10.1144 22 12 22C13.8856 22 14.8284 22 15.4142 21.4142C16 20.8284 16 19.8856 16 18V13M8 13C5.2421 12.3871 3.06717 10.2687 2.38197 7.52787L2 6M16 13C17.7107 13 19.1506 14.2804 19.3505 15.9795L20 21.5"
                            stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        <circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5" />
                    </svg>
                    <div class="flex justify-center">
                        <div class="font-normal text-center group-hover:border-b-2 group-hover:border-sky-400">
                            Izin
                        </div>
                    </div>
                </a>
            </div>
        </div>

        {{-- Bottom navbar --}}
        @extends('user_app/bottom_bar')
    </div>

    <script>
        function showTime() {
            var WIBTime = moment().format('LTS');
            document.getElementById('time').innerHTML = WIBTime;
        }

        const checkIn = document.getElementById("checkin")
        const checkInTxt = document.getElementById("checkin_text")
        const checkinStatus = '{{ $masuk }}'
        const checkOut = document.getElementById("checkout")
        const checkoutTxt = document.getElementById("checkout_text")
        const checkoutStatus = '{{ $pulang }}'

        if (checkinStatus != '-') {
            checkIn.removeAttribute('href');
            checkIn.classList.add("text-slate-500")
            checkInTxt.classList.add("group-hover:border-none")
        }

        if (checkoutStatus != '-') {
            checkout.removeAttribute('href');
            checkout.classList.add("text-slate-500")
            checkoutTxt.classList.add("group-hover:border-none")
        }

        setInterval(showTime, 1000);
    </script>
@endsection
