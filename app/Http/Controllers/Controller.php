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
                    'route' => '',
                    'current' => 'absen/',
                    'icon' => '/static/assessment.png',
                    'child' => (object) [
                        (object) [
                            'title' => 'Absen Masuk',
                            'route' => route('checkInOut', 'masuk'),
                        ],
                        (object) [
                            'title' => 'Absen Pulang',
                            'route' => route('checkInOut', 'pulang'),
                        ],
                        (object) [
                            'title' => 'Tidak Masuk',
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
