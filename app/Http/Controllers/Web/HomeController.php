<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\TanggalController as Tanggal;

use App\Models\AdminWeb\HeadlineModel as Headline;
use App\Models\AdminWeb\BeritaModel as Berita;
use App\Models\AdminWeb\PnbpModel as Pnbp;
use App\Models\AdminWeb\KhOperasionalModel as Kh;
use App\Models\AdminWeb\KtOperasionalModel as Kt;

class HomeController extends Controller
{
	private $headline;
	private $berita;
    private $pnbp = [];
    private $operasional_ekspor = [];
    private $operasional_impor = [];
    private $operasional_domas = [];
    private $operasional_dokel = [];

    /*Headline Section*/

    private function showHeadline()
    {
    	$this->headline = Headline::where('tampil', 'Ya')->orderBy('created_at', 'desc')
        ->get();
        return $this->headline; 
    }

    /*Berita Section*/

    private function showBerita()
    {
    	$this->berita = Berita::where('tampil', 'Ya')->orderBy('created_at', 'desc')
        ->limit(3)->get();
    	return $this->berita;   	
    }

    /*Data Operasional Section*/

    private function domas()
    {
        $domas_hewan = Kh::orderBy('id', 'desc')
        ->limit(1)
        ->value('domas');

        $domas_tumbuhan = Kt::orderBy('id', 'desc')
        ->limit(1)
        ->value('domas');

        $this->operasional_domas[] = $domas_hewan + $domas_tumbuhan;
   
        return $this->operasional_domas;
    }


    private function dokel()
    {
        $dokel_hewan = Kh::select('dokel')->orderBy('id', 'desc')
        ->limit(1)
        ->value('dokel');

        $dokel_tumbuhan = Kt::select('dokel')->orderBy('id', 'desc')
        ->limit(1)
        ->value('dokel');

        $this->operasional_dokel[] = $dokel_hewan + $dokel_tumbuhan;

        return $this->operasional_dokel;
    }

    private function ekspor()
    {
        $ekspor_hewan = Kh::select('ekspor')->orderBy('id', 'desc')
        ->limit(1)
        ->value('ekspor');

        $ekspor_tumbuhan = Kt::select('ekspor')->orderBy('id', 'desc')
        ->limit(1)
        ->value('ekspor');

        $this->operasional_ekspor[] = $ekspor_hewan + $ekspor_tumbuhan;

        return $this->operasional_ekspor;
    }

    private function impor()
    {
        $impor_hewan = Kh::select('impor')->orderBy('id', 'desc')
        ->limit(1)
        ->value('impor');
        $impor_tumbuhan = Kt::select('impor')->orderBy('id', 'desc')
        ->limit(1)
        ->value('impor');

        $this->operasional_impor[] = $impor_hewan + $impor_tumbuhan;

        return $this->operasional_impor;
    }

    private function pnbp()
    {
        $pnbp = Pnbp::orderBy('id', 'desc')
        ->limit(1)
        ->value('total');

        $this->pnbp[] = $pnbp;

        return $this->pnbp;
    }

    private function untilDate()
    {
        $pnbp = Pnbp::select('created_at')->orderBy('id', 'desc')
        ->limit(1)
        ->value('created_at')
        ->toDateString();

        return Tanggal::tgl_indo($pnbp);
    }

    private function compileDataOperasional()
    {
        $compile = [
            'domas' => $this->domas(),
            'dokel' => $this->dokel(),
            'ekspor' => $this->ekspor(),
            'impor' => $this->impor(),
            'pnbp' => $this->pnbp(),
            'tanggal' => $this->untilDate(),
        ];
        
        return $compile;
    }

    /*Send all data to home*/

    public function sendToHome()
    {
    	return view('web.home')
    	->with('headlines', $this->showHeadline())
    	->with('beritas', $this->showBerita())
        ->with('operasionals', $this->compileDataOperasional());
    }
}
