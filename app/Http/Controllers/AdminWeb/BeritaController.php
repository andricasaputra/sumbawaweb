<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;
use File;

use App\Models\AdminWeb\BeritaModel as Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminwebskp.berita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.berita.create');
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
            'penulis' => 'required|min:5',
            'judul' => 'required|min:10',
            'isi' => 'required|min:50',
            'gambar' => 'image|required|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('gambar')){

            // Get filename with the extension
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('gambar')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('gambar')->storeAs('public/berita', $fileNameToStore );

            //Upload Image Thumbnail
            $request->file('gambar')->storeAs('public/berita/thumbnail', $fileNameToStore);
     
            //Resize image here
            $thumbnailpath = storage_path('app/public/berita/thumbnail/') . $fileNameToStore;

            // open file a image resource
            $img = Image::make($thumbnailpath);

            // crop image
            $img->fit(300, 200, function ($constraint) {
                $constraint->upsize();
            });

            $img->save($thumbnailpath);

        }


        $berita = new Berita;

        $berita->penulis = $request->penulis;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;
        $berita->gambar = $fileNameToStore;

        $berita->save();

        return redirect(route('berita.index'))
        ->with('success', 'Berhasil Tambah Berita!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::find($id);

        return view('adminwebskp.berita.edit')->with('berita', $berita);
    }

    /**
     * Show Allowed berita Showing On the web.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Show($id)
    {
        $berita = Berita::find($id);

        if ($berita->tampil == 'Ya') {
            
            $berita->tampil = 'Tidak';

        }else{

            $berita->tampil = 'Ya';

        }

        $berita->save();

        return redirect(route('berita.index'));
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
            'penulis' => 'required|min:5',
            'judul' => 'required|min:10',
            'isi' => 'required|min:50',
            'gambar' => 'image|max:1999'
        ]);

        $berita = Berita::find($id);

        $berita->penulis = $request->penulis;
        $berita->judul = $request->judul;
        $berita->isi = $request->isi;

        dd($request->gambar);

        // Handle File Upload
        if($request->hasFile('gambar')){

            /*If request has image delete the old one*/
            $pathimg = storage_path('app/public/berita/') . $berita->gambar;

            $OldpathThumbnailImg = storage_path('app/public/berita/thumbnail/') . $berita->gambar;

            // Delete Old Photo
            if (File::exists($pathimg)) {

                File::delete($pathimg);

            }

            if (File::exists($OldpathThumbnailImg)) {

                File::delete($OldpathThumbnailImg);

            }

            // Get filename with the extension
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('gambar')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('gambar')->storeAs('public/berita', $fileNameToStore);

            //Upload Image Thumbnail
            $request->file('gambar')->storeAs('public/berita/thumbnail', $fileNameToStore);
     
            //Resize image here
            $thumbnailpath = storage_path('app/public/berita/thumbnail/') . $fileNameToStore;

            // open file a image resource
            $img = Image::make($thumbnailpath);

            // crop image
            $img->fit(300, 200, function ($constraint) {
                $constraint->upsize();
            });

            $img->save($thumbnailpath);

            $berita->gambar = $fileNameToStore;
        }   
        
        $berita->save();

        return redirect(route('berita.index'))
        ->with('success', 'berita Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $berita = Berita::findOrFail($request->id);

        $pathimg = storage_path('app/public/berita/') . $berita->gambar;

        $pathThumbnailImg = storage_path('app/public/berita/thumbnail/') . $berita->gambar;

        if (File::exists($pathimg)) {

            File::delete($pathimg);

        }

        if (File::exists($pathThumbnailImg)) {

            File::delete($pathThumbnailImg);

        }

        $berita->delete();

        return redirect(route('berita.index'))
        ->with('success', 'Berita Berhasil Dihapus!');
    }

    /*Api for datatables berita*/

    public function apiBerita()
    {
        $berita = Berita::orderBy('id', 'desc')->get();
 
        return Datatables::of($berita)
            ->addColumn('gambar', function($berita){

                if ($berita->gambar == NULL){
                    return 'No Image';
                }

                return '<img class="rounded-square" src="'.  asset('storage/berita/thumbnail/' . $berita->gambar)  .'" alt="berita">';

            })
            ->addColumn('status', function($berita){

                if ($berita->tampil == 'Ya'){

                    return '<a href="'.route('berita.show', $berita->id).'"  class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ';

                }else{

                    return '<a href="'.route('berita.show', $berita->id).'" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-close"></i> Hide</a> ';
                }

                
            })
            ->addColumn('action', function($berita){
                return '<a href="'. route('berita.edit', $berita->id) .'" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a href="#" data-id = "'.$berita->id.'"  class="btn btn-danger btn-xs" id="deleteBerita"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['gambar', 'status' ,'action'])->make(true);
    }


}
