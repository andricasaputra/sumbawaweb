<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\KeuanganRealisasiModel as Realisasi;

class KeuanganRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realisasi = Realisasi::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.keuangan.realisasi_anggaran.index')
        ->with('realisasi_anggaran', $realisasi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.keuangan.realisasi_anggaran.create');
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

            'tahun' => 'required|max:4|min:4',
            'total' => 'required',
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $realisasi = new Realisasi;

        $realisasi->tahun = $request->tahun;
        $realisasi->total = $request->total;

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
            $request->file('file')->storeAs('public/keuangan/realisasi_anggaran', $fileNameToStore);

            $realisasi->file = $fileNameToStore;
        }

        $realisasi->save();

        return redirect(route('realisasi_anggaran.index'))
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

            return response()->file(storage_path('app/public/keuangan/realisasi_anggaran/' . $file));

        }else{

            return redirect(route('realisasi_anggaran.index'))
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
        $realisasi = Realisasi::find($id);
        return view('adminwebskp.keuangan.realisasi_anggaran.edit')->with('realisasi_anggaran', $realisasi);
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

            'tahun' => 'required|max:4|min:4',
            'total' => 'required',
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $realisasi = Realisasi::find($id);

        $realisasi->tahun = $request->tahun;
        $realisasi->total = $request->total;

        if ($request->hasFile('file')) {

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/keuangan/realisasi_anggaran/') . $realisasi->file ;

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
            $request->file('file')->storeAs('public/keuangan/realisasi_anggaran', $fileNameToStore);

            $realisasi->file = $fileNameToStore;
        }

        $realisasi->save();

        return redirect(route('realisasi_anggaran.index'))
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
        $realisasi = Realisasi::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/keuangan/realisasi/') . $realisasi->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Realisasi::destroy($id);

        return redirect(route('realisasi_anggaran.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
