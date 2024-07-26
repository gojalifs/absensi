@extends('app')

@section('content')
    <div class="md:flex">
        <div class="hidden md:static fixed z-10 md:flex w-screen md:w-64 lg:w-80" id="sidebar">
            <div class="bg-yellow-400">
                @include('includes.side')
            </div>
        </div>
        <div class="w-full">
            @yield('admin-content')

            {{-- This is for user --}}
            @yield('main-content')
        </div>
    </div>


    <script>
        const sidebar = document.getElementById('sidebar');

        function toggle() {
            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
            }
        }
    </script>
@endsection
