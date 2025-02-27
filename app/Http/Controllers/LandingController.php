<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $shapes = [
            [
                'width' => 600,
                'height' => 140,
                'gradient' => 'from-blue-500/[0.15]',
                'class' => 'left-[-10%] md:left-[-5%] top-[15%] md:top-[20%]'
            ],
            [
                'width' => 500,
                'height' => 120,
                'gradient' => 'from-cyan-500/[0.15]',
                'class' => 'right-[-5%] md:right-[0%] top-[70%] md:top-[75%]'
            ],
            [
                'width' => 300,
                'height' => 80,
                'gradient' => 'from-teal-500/[0.15]',
                'class' => 'left-[5%] md:left-[10%] bottom-[5%] md:bottom-[10%]'
            ],
            [
                'width' => 200,
                'height' => 60,
                'gradient' => 'from-sky-500/[0.15]',
                'class' => 'right-[15%] md:right-[20%] top-[10%] md:top-[15%]'
            ],
            [
                'width' => 150,
                'height' => 40,
                'gradient' => 'from-indigo-500/[0.15]',
                'class' => 'left-[20%] md:left-[25%] top-[5%] md:top-[10%]'
            ],
        ];

        return view('landing', [
            'shapes' => $shapes,
            'badge' => 'Powered by Leomar@2025',
            'title1' => 'Prime Logistics',
            'title2' => 'Shipment Rates',
        ]);
    }
}

