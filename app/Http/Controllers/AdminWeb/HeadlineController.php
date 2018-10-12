<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;
use File;

use App\Models\AdminWeb\HeadlineModel as Headline;

class HeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminwebskp.headline.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.headline.create');
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
            $path = $request->file('gambar')->storeAs('public/headline', $fileNameToStore );

            //Upload Image Thumbnail
            $request->file('gambar')->storeAs('public/headline/thumbnail', $fileNameToStore);
     
            //Resize image here
            $thumbnailpath = storage_path('app/public/headline/thumbnail/') . $fileNameToStore;

            // open file a image resource
            $img = Image::make($thumbnailpath);

            // crop image
            $img->fit(300, 200, function ($constraint) {
                $constraint->upsize();
            });

            $img->save($thumbnailpath);

        }

        $headline = new Headline;

        $headline->judul = $request->judul;
        $headline->deskripsi = $request->deskripsi;
        $headline->gambar = $fileNameToStore;

        $headline->save();

        return redirect(route('headline.index'))
        ->with('success', 'Berhasil Tambah Headline!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $headline = Headline::find($id);

        return view('adminwebskp.headline.edit')->with('headline', $headline);
    }

    /**
     * Show Allowed headline Showing On the web.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Show($id)
    {
        $headline = Headline::find($id);

        if ($headline->tampil == 'Ya') {
            
            $headline->tampil = 'Tidak';

        }else{

            $headline->tampil = 'Ya';

        }

        $headline->save();

        return redirect(route('headline.index'));
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
            'gambar' => 'image|max:1999'
        ]);

        $headline = Headline::find($id);

        $headline->judul = $request->judul;
        $headline->deskripsi = $request->deskripsi;

        // Handle File Upload
        if($request->hasFile('gambar')){
            // Get filename with the extension
            $filenameWithExt = $request->file('gambar')->getClientOriginalName();

            $pathimg = storage_path('app/public/headline/') . $headline->gambar;

            $OldpathThumbnailImg = storage_path('app/public/headline/thumbnail/') . $headline->gambar;

            if (File::exists($pathimg)) {

                File::delete($pathimg);

            }

            if (File::exists($OldpathThumbnailImg)) {

                File::delete($OldpathThumbnailImg);

            }

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('gambar')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $request->file('gambar')->storeAs('public/headline', $fileNameToStore);

             //Upload Image Thumbnail
            $request->file('gambar')->storeAs('public/headline/thumbnail', $fileNameToStore);

            //Resize image here
            $oripath = storage_path('app/public/headline/') . $fileNameToStore;
     
            //Resize image here
            $thumbnailpath = storage_path('app/public/headline/thumbnail/') . $fileNameToStore;

            // open file a image resource
            $oriimg = Image::make($oripath);

            // crop image
            $oriimg->fit(1900, 700, function ($constraint) {
                $constraint->upsize();
            });

            // open file a image resource
            $img = Image::make($thumbnailpath);

            // crop image
            $img->fit(300, 200, function ($constraint) {
                $constraint->upsize();
            });

            $oriimg->save($oripath);

            $img->save($thumbnailpath);

            $headline->gambar = $fileNameToStore;
        } 
       
        $headline->save();

        return redirect(route('headline.index'))
        ->with('success', 'Headline Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $headline = Headline::findOrFail($request->id);

        $pathimg = storage_path('app/public/headline/') . $headline->gambar;

        $pathThumbnailImg = storage_path('app/public/headline/thumbnail/') . $headline->gambar;

        if (File::exists($pathimg)) {

            File::delete($pathimg);

        }

        if (File::exists($pathThumbnailImg)) {

            File::delete($pathThumbnailImg);

        }

        $headline->delete();

        return redirect(route('headline.index'))
        ->with('success', 'Headline Berhasil Dihapus!');
    }

    /*Api for datatables headline*/

    public function apiHeadline()
    {
        $headline = Headline::orderBy('id', 'desc')->get();
 
        return Datatables::of($headline)
            ->addColumn('gambar', function($headline){

                if ($headline->gambar == NULL){
                    return 'No Image';
                }

                return '<img class="rounded-square" src="'.  asset('storage/headline/thumbnail/' . $headline->gambar)  .'" alt="headline">';

            })
            ->addColumn('status', function($headline){

                if ($headline->tampil == 'Ya'){

                    return '<a href="'.route('headline.show', $headline->id).'"  class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a> ';

                }else{

                    return '<a href="'.route('headline.show', $headline->id).'" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-close"></i> Hide</a> ';
                }

                
            })
            ->addColumn('action', function($headline){
                return '<a href="'. route('headline.edit', $headline->id) .'" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                       '<a href="#" data-id = "'.$headline->id.'"  class="btn btn-danger btn-xs" id="deleteHeadline"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['gambar', 'status' ,'action'])->make(true);
    }
}
