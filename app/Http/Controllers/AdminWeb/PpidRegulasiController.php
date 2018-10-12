<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

use App\Models\AdminWeb\PpidRegulasiModel as Regulasi;

class PpidRegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regulasi = Regulasi::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.ppid.regulasi.index')
        ->with('regulasi', $regulasi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.ppid.regulasi.create');
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

            'nama_regulasi' => 'required',
            'file' => 'required_without:link|mimes:doc,pdf,docx,xlsx,zip,rar'

        ]);

        $regulasi = new Regulasi;

        $regulasi->nama_regulasi = $request->nama_regulasi;

        if ($request->link != '' && $request->link != 'NULL') {

            $regulasi->link = $request->link;

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
            $request->file('file')->storeAs('public/ppid/regulasi', $fileNameToStore);

            $regulasi->file = $fileNameToStore;
        }

        $regulasi->save();

        return redirect(route('regulasi.index'))
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

            return response()->file(storage_path('app/public/ppid/regulasi/' . $file));

        }else{

            return redirect(route('regulasi.index'))
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
        $regulasi = Regulasi::find($id);
        return view('adminwebskp.ppid.regulasi.edit')->with('regulasi', $regulasi);
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

    	$regulasi = Regulasi::find($id);

    	if ($regulasi->file !== '') {

    		$request->validate([

	            'nama_regulasi' => 'required',

        	]);
    		
    	}else{

    		$request->validate([

	            'nama_regulasi' => 'required',
	            'file' => 'mimes:doc,pdf,docx,xlsx,zip,rar'

        	]);

    	}
        


        $regulasi->nama_regulasi = $request->nama_regulasi;

        if ($request->link != '' && $request->link != 'NULL') {

            $regulasi->link = $request->link;

        }

        if ($request->hasFile('file')) {

            /*If request has file delete the old one*/
            $pathfile = storage_path('app/public/ppid/regulasi/') . $regulasi->file ;

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
            $request->file('file')->storeAs('public/ppid/regulasi', $fileNameToStore);

            $regulasi->file = $fileNameToStore;
        }

        $regulasi->save();

        return redirect(route('regulasi.index'))
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
        $regulasi = Regulasi::find($id);

        /*Check The Fil In Storage*/
        $pathfile = storage_path('app/public/ppid/regulasi/') . $regulasi->file ;

        // Delete File 
        if (File::exists($pathfile)) {

            File::delete($pathfile);

        }

        Regulasi::destroy($id);

        return redirect(route('regulasi.index'))
        ->with('success', 'Data Berhasil Dihapus!');
    }
}
