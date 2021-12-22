<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Repository::all();
        return view('pages.repository.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.repository.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'bagian' => ['required', 'string', 'max:255'],
            'nama_file' => ['mimes:pdf', 'max:5124'],
        ]);

        if (!$request->nama_file) {
            $request->validate([
                'link' => 'url'
            ]);
        }

        if ($request->nama_file) {
            $value = $request->file('nama_file');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        }

        $item = new Repository();
        $item->judul = $request->judul;
        $item->bagian = $request->bagian;
        if ($request->nama_file) {
            $item->nama_file = $fileNames;
        }elseif ($request->link) {
            $item->link = $request->link;
        }
        $item->save();

        // Repository::create([
        //     'judul' => $request->judul,
        //     'bagian' => $request->bagian,
        //     'nama_file' => $fileNames,
        //     'link' => $request->link,
        // ]);

        return redirect()->route('dokumen-mutu.index')->with('success-tambah-berkas','Sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $item = Repository::findOrFail($id);

        if ($request->nama_file) {
            $value = $request->file('nama_file');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->nama_file;
        }

        return view('pages.repository.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Repository::findOrFail($id);

        return view('pages.repository.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'bagian' => ['required', 'string', 'max:255'],
            'nama_file' => ['mimes:pdf', 'max:5124'],
        ]);

        $item = Repository::findOrFail($id);

        if (!$item->nama_file) {
            $request->validate([
                'link' => 'url'
            ]);
        }

        if ($request->nama_file) {
            $value = $request->file('nama_file');
            $extension = $value->extension();
            $fileNames = 'file' . uniqid('pdf_', microtime()) . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->nama_file;
        }

        $item->judul = $request->judul;
        $item->bagian = $request->bagian;
        if ($request->nama_file) {
            $item->nama_file = $fileNames;
        }elseif ($request->link) {
            $item->link = $request->link;
        }
        $item->save();

        // $item->update([
        //     'judul' => $request->judul,
        //     'bagian' => $request->bagian,
        //     'nama_file' => $fileNames,
        //     'link' => $request->link,
        // ]);

        return redirect()->route('dokumen-mutu.index')->with('success-ubah-berkas','Sukses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Repository::findOrFail($id);

        $item->delete();

        return redirect()->route('dokumen-mutu.index')->with('success-hapus-berkas','Berhasil');
    }

    public function download($file_name)
    {
        $file_path = public_path('storage/file-pdf/'.$file_name);
        return response()->download($file_path);
    }
}
