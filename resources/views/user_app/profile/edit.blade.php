@extends('app')

@section('content')
    <div>
        <form action="/edit-profile" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-4 flex relative w-fit mx-auto">
                <input type="file" name="ava" id="ava" class="hidden" accept="image/png, image/gif, image/jpeg">
                <label for="ava" class="cursor-pointer">
                    <img src="{{ $user->profile_photo_path ?? 'https://www.svgrepo.com/show/384674/account-avatar-profile-user-11.svg' }}"
                        alt="avatar" class="mx-auto bg-yellow-400 object-cover rounded-full h-28 w-28">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-6 absolute bottom-0 right-0">
                        <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                        <path fill-rule="evenodd"
                            d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>

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
@endsection
