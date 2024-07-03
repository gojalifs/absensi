@extends('app')

@section('content')
    <div class="mt-8 px-4 w-full">
        {{-- App bar --}}
        <div class="flex justify-between items-center text-2xl">
            Riwayat Absensi
        </div>
        <div class="flex justify-between rounded-lg mt-8 text-lg p-2 shadow-md bg-sky-200">
            <div>
                Juni 2024
            </div>
            <div>
                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="text-blue-700">
                    <path
                        d="M7.75 2.5C7.75 2.08579 7.41421 1.75 7 1.75C6.58579 1.75 6.25 2.08579 6.25 2.5V4.07926C4.81067 4.19451 3.86577 4.47737 3.17157 5.17157C2.47737 5.86577 2.19451 6.81067 2.07926 8.25H21.9207C21.8055 6.81067 21.5226 5.86577 20.8284 5.17157C20.1342 4.47737 19.1893 4.19451 17.75 4.07926V2.5C17.75 2.08579 17.4142 1.75 17 1.75C16.5858 1.75 16.25 2.08579 16.25 2.5V4.0129C15.5847 4 14.839 4 14 4H10C9.16097 4 8.41527 4 7.75 4.0129V2.5Z"
                        fill="currentColor" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2 12C2 11.161 2 10.4153 2.0129 9.75H21.9871C22 10.4153 22 11.161 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12ZM17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14ZM17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18ZM13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13ZM13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17ZM7 14C7.55228 14 8 13.5523 8 13C8 12.4477 7.55228 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14ZM7 18C7.55228 18 8 17.5523 8 17C8 16.4477 7.55228 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z"
                        fill="currentColor" />
                </svg>
            </div>
        </div>
        <div class="border rounded-lg mt-4 p-4 space-y-1">
            <div class="flex justify-between">
                <div>
                    3 Juli 2024
                </div>
                <div class="font-bold">Hadir</div>
            </div>
            <div class="h-[1px] bg-slate-300"></div>
            <div class="flex justify-between">
                <div class="text-slate-600">Masuk</div>
                <div>07.30</div>
            </div>
            <div class="flex justify-between">
                <div class="text-slate-600">Pulang</div>
                <div>17.30</div>
            </div>
        </div>
        <div class="border rounded-lg mt-4 p-4 space-y-1">
            <div class="flex justify-between">
                <div>
                    2 Juli 2024
                </div>
                <div class="font-bold">Izin</div>
            </div>
            <div class="h-[1px] bg-slate-300"></div>
            <div class="flex justify-between">
                <div class="text-slate-600">Masuk</div>
                <div>-</div>
            </div>
            <div class="flex justify-between">
                <div class="text-slate-600">Pulang</div>
                <div>-</div>
            </div>
        </div>
    </div>
    @extends('user_app/bottom_bar')
@endsection
