<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $items = Repository::all();
        return view('pages.home', [
            'items' => $items
        ]);
    }

    public function show(Request $request, $id)
    {
        $item = Repository::findOrFail($id);

        if ($request->nama_file) {
            $value = $request->file('nama_file');
            $extension = $value->extension();
            $fileNames = 'file' . $request->judul_pdf . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->nama_file;
        }

        return view('pages.show', [
            'item' => $item
        ]);
    }
}
