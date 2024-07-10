@extends('app')

@section('content')
    <div class="mt-4">
        <div class="text-center text-2xl">Form pengajuan izin tidak masuk</div>
        <form action="/submit_izin" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-8 p-4 border rounded-lg mx-4 shadow-md space-y-4 focus:outline-sky-200">
                <div class="flex-col">
                    <div class="my-2">
                        <label for="name">Nama : <span class="text-red-600">*</span>
                        </label>
                    </div>
                    <input type="text" name="name" id="name" value="{{ Auth::user()->full_name }}"
                        class="border placeholder:italic placeholder:text-sm w-full p-1 focus:outline-sky-200 read-only:text-slate-500"
                        autofocus placeholder="Masukkan nama" required readonly />
                </div>

                {{-- Tanggal --}}
                <div class="block space-y-2">
                    <div>
                        <label for="tanggal">Tanggal : <span class="text-red-600">*</span>
                        </label>
                    </div>
                    <input type="date" name="tanggal" id="tanggal"
                        class="border border-slate-200 focus:outline-sky-200 placeholder:italic w-full p-1 text-sm"
                        required />
                </div>

                {{-- Keterangan --}}
                <div class="space-y-2">
                    <div>
                        Keterangan : <span class="text-red-600">*</span>
                    </div>
                    <div class="px-4 space-y-2">
                        <div>
                            <input type="radio" name="keterangan" value="sakit" id="sakit" class="border" required>
                            <label for="sakit">Sakit</label>
                        </div>
                        <div>
                            <input type="radio" name="keterangan" value="izin" id="cuti" class="border">
                            <label for="cuti">Izin/Cuti</label>
                        </div>
                    </div>

                    {{-- Upload file --}}
                    <div class="space-y-2">
                        <div>Surat Keterangan Izin/Sakit : <span class="text-gray-500">(jpeg, jpg, png)</span></div>
                        <input type="file" name="suket" id="suket"
                            class="text-sm block w-full text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-sky-50 file:text-sky-700
                            hover:file:bg-violet-100"
                            accept="image/png, image/gif, image/jpeg" required>
                    </div>

                    {{-- Catatan --}}
                    <div class="space-y-2">
                        <div>
                            Catatan :
                        </div>
                        <textarea type="text" name="catatan" id="catatan" rows="3" placeholder="Tambahkan catatan di sini . . ."
                            class="border rounded-sm w-full"></textarea>
                    </div>
                </div>
                <button type="submit" class="w-full">
                    <div class="bg-sky-300 text-center rounded-md py-1">
                        Kirim
                    </div>
                </button>
            </div>
        </form>
    </div>
@endsection