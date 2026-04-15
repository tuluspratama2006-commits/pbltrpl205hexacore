<?php
namespace App\Http\Controllers;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller {
    public function index() {
        $documents = Document::where('is_active', true)->get();
        return view('documents', compact('documents'));
    }
    public function download($id) {
        $doc = Document::findOrFail($id);
        $doc->increment('download_count');
        return response()->download(storage_path('app/public/' . $doc->file_path), $doc->title . '.pdf');
    }
}
