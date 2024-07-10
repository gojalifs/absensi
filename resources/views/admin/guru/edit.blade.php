@extends('admin.index')

@section('admin-content')
    <div class="mx-4">
        <div class="mx-auto max-w-[600px]">
            <form action="/update-guru" method="post">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                <div class="mt-4 flex relative w-fit mx-auto">
                    <img src="{{ $user->profile_photo_path ?? 'https://www.svgrepo.com/show/384674/account-avatar-profile-user-11.svg' }}"
                        alt="avatar" class="mx-auto bg-yellow-400 object-cover rounded-full h-28 w-28">
                </div>

                <div class="px-4 mt-4 space-y-4">
                    <div class="space-y-2">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" name="name" id="name"
                            class="border rounded-sm w-full placeholder:text-sm p-2"
                            placeholder="Masukkan nama lengkap Anda . . ." value="{{ $user->name }}" required>
                    </div>
                    <div class="space-y-2">
                        <label for="full_name">Nama Panggilan</label>
                        <input type="text" name="full_name" id="full_name"
                            class="border rounded-sm w-full placeholder:text-sm p-2"
                            placeholder="Masukkan nama panggilan Anda . . ." value="{{ $user->full_name }}" required>
                    </div>
                    <div class="space-y-2">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email"
                            class="border rounded-sm w-full placeholder:text-sm p-2"
                            placeholder="Masukkan email panggilan Anda . . ." value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <button type="submit" class="bg-sky-400 px-4 py-2 rounded-md hover:bg-sky-300">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
