<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Charts\OperasionalKhChart as Charts;

use App\Models\AdminWeb\PnbpModel as Pnbp;

class PnbpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pnbp = Pnbp::orderBy('id', 'desc')->get();
        return view('adminwebskp.pnbp.index')->with('pnbp', $pnbp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.pnbp.create');
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

            'total' => 'required|max:20',
            'tahun' => 'required|integer|min:4'

        ]);

        $pnbp = new Pnbp;

        $pnbp->total = $request->total;
        $pnbp->tahun = $request->tahun;

        $pnbp->save();

        return redirect(route('pnbp.index'))
        ->with('success', 'Berhasil Tambah Data PNBP!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pnbp = Pnbp::find($id);
        return view('adminwebskp.pnbp.edit')->with('pnbp', $pnbp);
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

            'total' => 'required|max:20',
            'tahun' => 'required|integer|min:4'

        ]);

        $pnbp = Pnbp::find($id);

        $pnbp->total = (int)$pnbp->total + (int)$request->total;
        $pnbp->tahun = $request->tahun;

        $pnbp->save();

        return redirect(route('pnbp.index'))
        ->with('success', 'Berhasil Update Data PNBP!');
    }


    public static function rupiah($angka)
    {
    
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;

    }

    /*create JSON chart data*/
    public function chartApi()
    {
        $chart = new Charts;

        $getDataTahun = Pnbp::orderBy('tahun', 'desc')->get();

        $datas = collect([]);

        foreach ($getDataTahun as $data) {

            $datas[] = $data->total;   
            $backgroundColor[] = '#24CBE5';
            
        }

        $chart->dataset('PNBP', 'bar', $datas)
            ->color($backgroundColor)
            ->backgroundColor($backgroundColor);


        return $chart->api();
    }


    /**
     * get Data from the JSON/ api then show and pass to compose.
     *
     * @return Response
     */
    private function showChart()
    {
        $getDataTahun = Pnbp::orderBy('tahun', 'desc')->get();


        foreach ($getDataTahun as $data) {

            $tahun[] = $data->tahun;
            
        }

            $chart = new Charts;

            $api = route('pnbp.chart');

            return $chart->labels($tahun)
            ->title('Total Penerimaan Negara Bukan Pajak Tahun '. end($tahun) .' s/d '. $tahun[0] .' Dalam Rupiah')
            ->load($api);            

        
    }


    /**
     * Bind chart to included view @index KH Operasional.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('chart', $this->showChart());
    }
 

}
