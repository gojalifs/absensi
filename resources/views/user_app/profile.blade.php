@extends('app')

@section('content')
    <div class="mt-8 px-4">
        <div class="text-center">
            <img src="{{ $user->path }}" alt="avatar" class="mx-auto bg-yellow-400 object-cover rounded-full h-28 w-28">
            <div class="font-semibold pt-4 text-2xl">
                Fajar Sidik Prasetio
            </div>
        </div>
        <div class="mt-8 text-slate-500">
            Nama Panggilan
        </div>
        <div class="text-lg">Fajar</div>
        <div class="mt-4 text-slate-500">
            Email
        </div>
        <div class="text-lg">Fajar@gmail.com</div>
        <div class="mt-4 text-slate-500">
            No. HP
        </div>
        <div class="text-lg">0812345678</div>
        <div class="mt-4">
            <a href="/login" class="bg-red-500 py-1 px-4 text-white">Logout</a>
        </div>
    </div>

    @extends('user_app/bottom_bar')
@endsection
