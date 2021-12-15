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
            'kode_repository' => ['required', 'string', 'max:9'],
            'judul' => ['required', 'string', 'max:255'],
            'nama_file' => ['required', 'mimes:pdf'],
            'dosen_pembimbing' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'jurusan' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
        ]);

        $value = $request->file('nama_file');
        $extension = $value->extension();
        $fileNames = 'file' . $request->judul_pdf . '.' . $extension;
        Storage::putFileAs('public/file-pdf', $value, $fileNames);

        Repository::create([
            'kode_repository' => $request->kode_repository,
            'judul' => $request->judul,
            'nama_file' => $fileNames,
            'dosen_pembimbing' => $request->dosen_pembimbing,
            'penulis' => $request->penulis,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return redirect()->route('data-repository.index');
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
            $fileNames = 'file' . $request->judul_pdf . '.' . $extension;
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
            'kode_repository' => ['required', 'string', 'max:9'],
            'judul' => ['required', 'string', 'max:255'],
            'nama_file' => ['mimes:pdf'],
            'dosen_pembimbing' => ['required', 'string', 'max:255'],
            'penulis' => ['required', 'string', 'max:255'],
            'jurusan' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
        ]);

        $item = Repository::findOrFail($id);

        if ($request->nama_file) {
            $value = $request->file('nama_file');
            $extension = $value->extension();
            $fileNames = 'file' . $request->judul_pdf . '.' . $extension;
            Storage::putFileAs('public/file-pdf', $value, $fileNames);
        } else {
            $fileNames = $item->nama_file;
        }

        $item->update([
            'kode_repository' => $request->kode_repository,
            'judul' => $request->judul,
            'nama_file' => $fileNames,
            'dosen_pembimbing' => $request->dosen_pembimbing,
            'penulis' => $request->penulis,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return redirect()->route('data-repository.index');
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

        return redirect()->route('data-repository.index');
    }

    public function download($file_name)
    {
        $file_path = public_path('storage/file-pdf/'.$file_name);
        return response()->download($file_path);
    }
}
