<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\KeuanganRkaklModel as Rka_kl;

class KeuanganRkaklContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rka_kl = Rka_kl::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.keuangan.rka_kl.index')->with('rka_kl', $rka_kl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.keuangan.rka_kl.create');
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
            'revisi' => 'required',
            'file' => 'required|mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        // Handle File Upload
        if($request->hasFile('file')){

            // Get filename with the extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $request->file('file')->storeAs('public/keuangan/rka_kl', $fileNameToStore);

        }

        $rka_kl = new Rka_kl;

        $rka_kl->tahun = $request->tahun;
        $rka_kl->revisi = $request->revisi;
        $rka_kl->file = $fileNameToStore;

        $rka_kl->save();

        return redirect(route('rka_kl.index'))
        ->with('success', 'Berhasil Tambah Data!');
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

            return response()->file(storage_path('app/public/keuangan/rka_kl/' . $file));

        }else{

            return redirect(route('rka_kl.index'))
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
        $rka_kl = Rka_kl::find($id);
        return view('adminwebskp.keuangan.rka_kl.edit')->with('rka_kl', $rka_kl);
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
            'revisi' => 'required',
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $rka_kl = Rka_kl::find($id);

        $rka_kl->tahun = $request->tahun;
        $rka_kl->revisi = $request->revisi;
    
        // Handle File Upload
        if($request->hasFile('file')){

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/keuangan/rka_kl/') . $rka_kl->file ;

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
            $request->file('file')->storeAs('public/keuangan/rka_kl', $fileNameToStore);

            $rka_kl->file = $fileNameToStore;

        }

        $rka_kl->save();

        return redirect(route('rka_kl.index'))
        ->with('success', 'Berhasil Ubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rka_kl = Rka_kl::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/keuangan/rka_kl/') . $rka_kl->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Rka_kl::destroy($id);

        return redirect(route('rka_kl.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
