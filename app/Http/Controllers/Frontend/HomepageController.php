<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vehicle;
use App\Models\Type;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
   
        $vehicles = Vehicle::where('status',1)->get();
        $testimonials = Testimonial::get();
        $types = Type::get(['id','nama']);
        $steps = [
            [
                'title' => 'Pilih Kendaraan',
                'description' => 'Telusuri dan pilih kendaraan yang sesuai kebutuhan Anda.',
            ],
            [
                'title' => 'Isi Formulir',
                'description' => 'Lengkapi data pemesanan seperti tanggal, durasi, dan informasi kontak.',
            ],
            [
                'title' => 'Tunggu Konfirmasi',
                'description' => 'Tim kami akan mengirimkan konfirmasi dan instruksi pembayaran.',
            ],
        ];

        return view('frontend.homepage', compact('vehicles','testimonials','types', 'steps'));
    }
}
