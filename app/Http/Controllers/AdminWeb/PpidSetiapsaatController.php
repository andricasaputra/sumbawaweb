<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\PpidSetiapsaatModel as Setiapsaat;

class PpidSetiapsaatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi_setiapsaat = Setiapsaat::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.ppid.informasi_setiapsaat.index')
        ->with('informasi_setiapsaat', $informasi_setiapsaat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.ppid.informasi_setiapsaat.create');
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

        	'bagian_info' => 'required',
            'file' => 'required_without:keterangan|required_without:link|mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $informasi_setiapsaat = new Setiapsaat;

        $informasi_setiapsaat->nama_info = $request->nama_info;
        $informasi_setiapsaat->bagian_info = $request->bagian_info;
        $informasi_setiapsaat->kategori = $request->kategori;
        $informasi_setiapsaat->keterangan = $request->keterangan;
        $informasi_setiapsaat->jenis = 'setiap_saat';

        if ($request->link != '' && $request->link != 'NULL') {

            $informasi_setiapsaat->link = $request->link;

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
            $request->file('file')->storeAs('public/ppid/informasi_setiapsaat', $fileNameToStore);

            $informasi_setiapsaat->file = $fileNameToStore;
        }

        $informasi_setiapsaat->save();

        return redirect(route('informasi_setiapsaat.index'))
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

            return response()->file(storage_path('app/public/ppid/informasi_setiapsaat/' . $file));

        }else{

            return redirect(route('informasi_setiapsaat.index'))
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
        $informasi_setiapsaat = Setiapsaat::find($id);
        return view('adminwebskp.ppid.informasi_setiapsaat.edit')->with('informasi_setiapsaat', $informasi_setiapsaat);
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

            'bagian_info' => 'required',
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $informasi_setiapsaat = Setiapsaat::find($id);

        $informasi_setiapsaat->nama_info = $request->nama_info;
        $informasi_setiapsaat->bagian_info = $request->bagian_info;
        $informasi_setiapsaat->kategori = $request->kategori;
        $informasi_setiapsaat->keterangan = $request->keterangan;

        if ($request->link != '' && $request->link != 'NULL') {

            $informasi_setiapsaat->link = $request->link;

        }

        if ($request->hasFile('file')) {

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/ppid/informasi_setiapsaat/') . $informasi_setiapsaat->file ;

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
            $request->file('file')->storeAs('public/ppid/informasi_setiapsaat', $fileNameToStore);

            $informasi_setiapsaat->file = $fileNameToStore;
        }

        $informasi_setiapsaat->save();

        return redirect(route('informasi_setiapsaat.index'))
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
        $informasi_setiapsaat = Setiapsaat::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/ppid/informasi_setiapsaat/') . $informasi_setiapsaat->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Setiapsaat::destroy($id);

        return redirect(route('informasi_setiapsaat.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
