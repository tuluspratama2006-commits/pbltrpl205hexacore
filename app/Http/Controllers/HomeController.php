<?php
namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Certification;
use App\Models\CompanyProfile;

class HomeController extends Controller {
    public function index() {
        return view('home', [
            'services' => Service::where('is_active', true)->orderBy('order')->take(6)->get(),
            'portfolios' => Portfolio::where('is_active', true)->orderBy('order')->take(3)->get(),
            'certifications' => Certification::where('is_active', true)->orderBy('order')->get(),
        ]);
    }
}
