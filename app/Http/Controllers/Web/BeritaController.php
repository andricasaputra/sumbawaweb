<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

use App\Models\AdminWeb\BeritaModel as Berita;

class BeritaController extends Controller
{
	public $berita;

    public function showBerita()
    {
    	$this->berita = Berita::where('tampil', 'Ya')->orderBy('created_at', 'desc')->limit(3)->get();
    	return $this->berita;   	
    }

    public function showSingleBerita($id)
    {
    	$berita_single = Berita::find($id);
    	$berita_single->where('tampil', 'Ya')->first();
    	return view('web.berita')
    	->with('berita', $berita_single);  	
    }

}
