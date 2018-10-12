<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\LaporanModel as Laporan;

class LaporanKekayaanContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kekayaan = Laporan::where('jenis_laporan', 'Laporan Kekayaan Pejabat Negara')->orderBy('created_at', 'desc')->get();
        return view('adminwebskp.laporan.kekayaan.index')->with('kekayaan', $kekayaan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.laporan.kekayaan.create');
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

            'jenis_laporan' => 'required',
            'nama_laporan' => 'required|min:5',
            'tahun' => 'required|min:4|max:4',
            'file' => 'required|mimes:pdf'

        ]);

        $kekayaan = new Laporan;

        $kekayaan->jenis_laporan = $request->jenis_laporan;
        $kekayaan->nama_laporan = $request->nama_laporan;
        $kekayaan->tahun = $request->tahun;

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
            $request->file('file')->storeAs('public/laporan/kekayaan', $fileNameToStore);

            $kekayaan->file = $fileNameToStore;

        }

        $kekayaan->save();

        return redirect(route('kekayaan.index'))
        ->with('success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param   $filename
     * @return \Illuminate\Http\Response
     */
    public function show($file)
    {
        if ($file !== '') {

            return response()->file(storage_path('app/public/laporan/kekayaan/' . $file));

        }else{

            return redirect(route('kekayaan.index'))
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
        $kekayaan = Laporan::find($id);
        return view('adminwebskp.laporan.kekayaan.edit')->with('kekayaan', $kekayaan);
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

            'jenis_laporan' => 'required',
            'nama_laporan' => 'required|min:5',
            'tahun' => 'required|min:4|max:4',
            'file' => 'mimes:pdf'

        ]);

        $kekayaan = Laporan::find($id);

        $kekayaan->jenis_laporan = $request->jenis_laporan;
        $kekayaan->nama_laporan = $request->nama_laporan;
        $kekayaan->tahun = $request->tahun;

        if($request->hasFile('file')){

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/laporan/kekayaan/') . $kekayaan->file ;

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
            $request->file('file')->storeAs('public/laporan/kekayaan', $fileNameToStore);

            $kekayaan->file = $fileNameToStore;

        }

        $kekayaan->save();

        return redirect(route('kekayaan.index'))
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
        $kekayaan = Laporan::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/laporan/kekayaan/') . $kekayaan->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Laporan::destroy($id);

        return redirect(route('kekayaan.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
