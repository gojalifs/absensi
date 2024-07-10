@extends('admin.index')

@section('admin-content')
    <div class="m-4">
        <div class="w-full text-center text-3xl bg-blue-400 mt-8">Selamat Datang Di Dashboard Admin SMP N 2 Teluk Jambe Barat</div>
        <div class="mt-20 grid grid-cols-3 gap-4">
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
