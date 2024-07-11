@extends('admin.index')

@section('admin-content')
    <div class="m-4">
        <div class="w-full text-center text-3xl bg-blue-400 mt-8">Selamat Datang Di Dashboard Admin SMP N 2 Teluk Jambe Barat
        </div>
        <div class="flex items-center space-x-1">
            <div class="bg-slate-400 my-8 h-[1px] w-full"></div>
            <div class="w-1 h-1 bg-slate-400 rounded-full"></div>
            <div class="w-2 h-2 bg-slate-400 rounded-full"></div>
            <div class="w-1 h-1 bg-slate-400 rounded-full"></div>
            <div class="bg-slate-400 my-8 h-[1px] w-full"></div>
        </div>
        <div class="mt-4 grid grid-cols-3 gap-4">
            <div class="p-2 rounded-md h-24 relative w-full bg-gradient-to-br from-green-400 to-green-300">
                <div class="text-slate-500">Jumlah Guru</div>
                <div class="text-center mb-8">
                    <div class="text-3xl">{{ $count }}</div>
                </div>
            </div>
            <div class="p-2 rounded-md h-24 relative w-full bg-gradient-to-br from-orange-400 to-orange-300">
                <div class="text-slate-500">Sudah Absen Hari Ini</div>
                <div class="text-center mb-8">
                    <div class="text-3xl">{{ $absenCount }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
