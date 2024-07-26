<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sidebarMenu()
    {
        if (Auth::user()->role == 'ADMIN') {
            return [
                [
                    'title' => 'Dashboard',
                    'route' => route('dashboard'),
                    'current' => 'dashboard',
                    'icon' => '/static/dashboard.png'
                ],
            ];
        } else {
            // Jika user biasa
            return (object) [
                (object) [
                    'title' => 'Dashboard',
                    'route' => route('home'),
                    'current' => 'home',
                    'icon' => '/static/dashboard.png'
                ],
                (object) [
                    'title' => 'Absensi',
                    'current' => 'absen/',
                    'icon' => '/static/assessment.png',
                    'child' => (object) [
                        (object) [
                            'title' => 'Absen Masuk',
                            'current' => 'masuk',
                            'route' => route('checkInOut', 'masuk'),
                        ],
                        (object) [
                            'title' => 'Absen Pulang',
                            'current' => 'pulang',
                            'route' => route('checkInOut', 'pulang'),
                        ],
                        (object) [
                            'title' => 'Tidak Masuk',
                            'current' => 'izin',
                            'route' => route('izin.index'),
                        ],
                    ],
                ],
                (object) [
                    'title' => 'Info Absen',
                    'route' => route('riwayat'),
                    'current' => 'riwayat',
                    'icon' => '/static/checklist-exploration.png'
                ],

            ];
        }

    }
}
