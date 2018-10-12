<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\PpidSertamertaModel as Sertamerta;

class PpidSertamertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi_sertamerta = Sertamerta::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.ppid.informasi_sertamerta.index')
        ->with('informasi_sertamerta', $informasi_sertamerta);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.ppid.informasi_sertamerta.create');
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
            'file' => 'required_without:link|mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $informasi_sertamerta = new Sertamerta;

        $informasi_sertamerta->nama_info = $request->nama_info;
        $informasi_sertamerta->jenis = 'serta_merta';

        if ($request->link != '' && $request->link != 'NULL') {

            $informasi_sertamerta->link = $request->link;

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
            $request->file('file')->storeAs('public/ppid/informasi_sertamerta', $fileNameToStore);

            $informasi_sertamerta->file = $fileNameToStore;
        }

        $informasi_sertamerta->save();

        return redirect(route('informasi_sertamerta.index'))
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

            return response()->file(storage_path('app/public/ppid/informasi_sertamerta/' . $file));

        }else{

            return redirect(route('informasi_sertamerta.index'))
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
        $informasi_sertamerta = Sertamerta::find($id);
        return view('adminwebskp.ppid.informasi_sertamerta.edit')->with('informasi_sertamerta', $informasi_sertamerta);
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
            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $informasi_sertamerta = Sertamerta::find($id);

        $informasi_sertamerta->nama_info = $request->nama_info;

        if ($request->link != '' && $request->link != 'NULL') {

            $informasi_sertamerta->link = $request->link;

        }

        if ($request->hasFile('file')) {

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/ppid/informasi_sertamerta/') . $informasi_sertamerta->file ;

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
            $request->file('file')->storeAs('public/ppid/informasi_sertamerta', $fileNameToStore);

            $informasi_sertamerta->file = $fileNameToStore;
        }

        $informasi_sertamerta->save();

        return redirect(route('informasi_sertamerta.index'))
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
        $informasi_sertamerta = Sertamerta::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/ppid/informasi_sertamerta/') . $informasi_sertamerta->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Sertamerta::destroy($id);

        return redirect(route('informasi_sertamerta.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
