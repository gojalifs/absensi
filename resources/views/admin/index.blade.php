@extends('app')

@section('content')
    <div class="flex">
        <div class="flex w-75">
            <div>
                @include('admin.includes.sidebar')
            </div>
        </div>
        <div class="w-full">
            @yield('admin-content')
        </div>
    </div>
@endsection
