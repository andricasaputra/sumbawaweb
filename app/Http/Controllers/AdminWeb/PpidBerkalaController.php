<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\PpidBerkalaModel as Berkala;

class PpidBerkalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi_berkala = Berkala::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.ppid.informasi_berkala.index')
        ->with('informasi_berkala', $informasi_berkala);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.ppid.informasi_berkala.create');
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

            'nama_info' => 'required',
            'kategori' => 'required',
            'file' => 'required_without:link|mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $informasi_berkala = new Berkala;

        $informasi_berkala->nama_info = $request->nama_info;
        $informasi_berkala->kategori = $request->kategori;
        $informasi_berkala->jenis = 'berkala';

        if ($request->link != '' && $request->link != 'NULL') {

            $informasi_berkala->link = $request->link;

        }

        if ($request->hasFile('file')) {

            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $request->file('file')->storeAs('public/ppid/informasi_berkala', $fileNameToStore);

            $informasi_berkala->file = $fileNameToStore;
        }

        $informasi_berkala->save();

        return redirect(route('informasi_berkala.index'))
        ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        if ($file !== '') {

            return response()->file(storage_path('app/public/ppid/informasi_berkala/' . $file));

        }else{

            return redirect(route('informasi_berkala.index'))
            ->with('error', 'File Yang Anda Cari Tidak Ditemukan!');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi_berkala = Berkala::find($id);
        return view('adminwebskp.ppid.informasi_berkala.edit')->with('informasi_berkala', $informasi_berkala);
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

            'nama_info' => 'required',
            'kategori' => 'required',
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $informasi_berkala = Berkala::find($id);

        $informasi_berkala->nama_info = $request->nama_info;
        $informasi_berkala->kategori = $request->kategori;

        if ($request->link != '' && $request->link != 'NULL') {

            $informasi_berkala->link = $request->link;

        }

        if ($request->hasFile('file')) {

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/ppid/informasi_berkala/') . $informasi_berkala->file ;

            // Delete Old File
            if (File::exists($pathfile)) {

                File::delete($pathfile);

            }

            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $request->file('file')->storeAs('public/ppid/informasi_berkala', $fileNameToStore);

            $informasi_berkala->file = $fileNameToStore;
        }

        $informasi_berkala->save();

        return redirect(route('informasi_berkala.index'))
        ->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi_berkala = Berkala::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/ppid/informasi_berkala/') . $informasi_berkala->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Berkala::destroy($id);

        return redirect(route('informasi_berkala.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
