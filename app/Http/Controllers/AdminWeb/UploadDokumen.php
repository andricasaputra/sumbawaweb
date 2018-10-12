<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\UploadDokumenModel as Files;

class UploadDokumen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Files::orderBy('created_at', 'desc')->get();

        return view('adminwebskp.files.index')->with('files', $files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.files.create');
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

            'judul_dokumen' => 'required',
            'kategori' => 'required',
            'nama_file' => 'required|mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        // Handle File Upload
        if($request->hasFile('nama_file')){

            // Get filename with the extension
            $filenameWithExt = $request->file('nama_file')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('nama_file')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $request->file('nama_file')->storeAs('public/ourfiles', $fileNameToStore);

        }

        $files = new Files;

        $files->judul_dokumen = $request->judul_dokumen;
        $files->kategori = $request->kategori;
        $files->nama_file = $fileNameToStore;

        $files->save();

        return redirect(route('files.index'))
        ->with('success', 'Berhasil Tambah Dokumen '. $filename . ' !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = Files::find($id);

        if ($files->tampil == 'Ya') {
            
            $files->tampil = 'Tidak';

        }else{

            $files->tampil = 'Ya';

        }

        $files->save();

        return redirect(route('files.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = Files::find($id);

        return view('adminwebskp.files.edit')->with('files', $files);
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

            'judul_dokumen' => 'required',
            'kategori' => 'required',
            'nama_file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $files = Files::find($id);

        $files->judul_dokumen = $request->judul_dokumen;
        $files->kategori = $request->kategori;
        
        // Handle File Upload
        if($request->hasFile('nama_file')){

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/ourfiles/') . $files->nama_file ;

            // Delete Old File
            if (File::exists($pathfile)) {

                File::delete($pathfile);

            }

            // Get filename with the extension
            $filenameWithExt = $request->file('nama_file')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('nama_file')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload File
            $request->file('nama_file')->storeAs('public/ourfiles', $fileNameToStore);

            $files->nama_file = $fileNameToStore;

        }

        
        $files->save();

        return redirect(route('files.index'))
        ->with('success', 'Berhasil Ubah Dokumen Menjadi '. $filename . ' !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = Files::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/ourfiles/') . $files->nama_file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Files::destroy($id);

        return redirect(route('files.index'))
        ->with('success', 'Dokumen Berhasil Dihapus!');
    }
}
