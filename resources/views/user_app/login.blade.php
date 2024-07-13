@extends('app')

@section('content')
    <div class="justify-center p-4 text-slate-800">
        <div class="text-center text-3xl py-6">
            e-presensi SMP N 2 Telukjambe
        </div>
        <div class="justify-center flex">
            <form action="{{ route('login') }}" method="POST"
                class="min-w-[300px] max-w-[400px] bg-sky-200 p-4 rounded-lg shadow-lg space-y-4">
                @csrf
                <div class="text-center font-medium text-3xl my-8 text-blue-800">
                    Silahkan Login
                </div>
                <div>
                    <div>
                        <label for="email">{{ __('Email') }} <span class="text-rose-500">*</span></label>
                    </div>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="email"
                        class="border-2 border-slate-200 rounded-md w-full focus:border-2 focus:outline-none focus:border-sky-400 " />
                </div>
                <div>
                    <div>
                        <label for="password">{{ __('Password') }} <span class="text-rose-500">*</span></label>
                    </div>
                    <input id="password" type="password" name="password" :value="old('password')" required
                        autocomplete="password"
                        class="border-2 border-slate-200 rounded-md w-full focus:border-2 focus:outline-none focus:border-sky-400 " />
                </div>
                <div class="justify-center flex">
                    <button type="submit"
                        class="bg-blue-700 py-2 px-4 rounded-xl text-white cursor-pointer hover:bg-blue-600">login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
