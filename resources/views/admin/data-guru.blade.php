@extends('admin.index')

@section('admin-content')
    <div>
        <div class="mx-4 mt-8 text-3xl">
            Data Guru
        </div>
        <table class="table-auto">
            <thead class="">
                <tr>No.</tr>
                <tr>Nama Lengkap</tr>
                <tr>Nama Panggilan</tr>
                <tr>Email</tr>
                <tr>Foto Guru</tr>
                <tr>Aksi</tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
