<?php
namespace App\Http\Controllers;
use App\Models\Portfolio;

class PortfolioController extends Controller {
    public function index() {
        $portfolios = Portfolio::where('is_active', true)->orderBy('order')->paginate(9);
        return view('portfolio', compact('portfolios'));
    }
    public function show($id) {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio-detail', compact('portfolio'));
    }
}
