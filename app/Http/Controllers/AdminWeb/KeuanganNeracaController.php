<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\KeuanganNeracaModel as Neraca;

class KeuanganNeracaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neraca = Neraca::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.keuangan.neraca_keuangan.index')
        ->with('neraca_keuangan', $neraca);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.keuangan.neraca_keuangan.create');
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
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $neraca = new Neraca;

        $neraca->tahun = $request->tahun;

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
            $request->file('file')->storeAs('public/keuangan/neraca_keuangan', $fileNameToStore);

            $neraca->file = $fileNameToStore;
        }

        $neraca->save();

        return redirect(route('neraca_keuangan.index'))
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

            return response()->file(storage_path('app/public/keuangan/neraca_keuangan/' . $file));

        }else{

            return redirect(route('neraca_keuangan.index'))
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
        $neraca = Neraca::find($id);
        return view('adminwebskp.keuangan.neraca_keuangan.edit')->with('neraca_keuangan', $neraca);
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
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $neraca = Neraca::find($id);

        $neraca->tahun = $request->tahun;

        if ($request->hasFile('file')) {

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/keuangan/neraca_keuangan/') . $neraca->file ;

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
            $request->file('file')->storeAs('public/keuangan/neraca_keuangan', $fileNameToStore);

            $neraca->file = $fileNameToStore;
        }

        $neraca->save();

        return redirect(route('neraca_keuangan.index'))
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
        $neraca = Neraca::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/keuangan/neraca_keuangan/') . $neraca->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Neraca::destroy($id);

        return redirect(route('neraca_keuangan.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
