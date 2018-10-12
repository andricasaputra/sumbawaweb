<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Charts\OperasionalKtChart as Charts;

use App\Models\AdminWeb\KtOperasionalModel as Operasional;

class KtOperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operasional = Operasional::orderBy('id', 'desc')->get();
        return view('adminwebskp.ktoperasional.index')->with('operasional', $operasional);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.ktoperasional.create');
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

            'dokel' => 'required|max:10',
            'tahun' => 'required|unique:kt_operasional|integer|min:4'

        ]);

        $operasional = new Operasional;

        $operasional->domas = $request->domas;
        $operasional->dokel = $request->dokel;
        $operasional->ekspor = $request->ekspor;
        $operasional->impor = $request->impor;
        $operasional->tahun = $request->tahun;

        $operasional->save();

        return redirect(route('ktoperasional.index'))
        ->with('success', 'Berhasil Tambah Data Operasional!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operasional = Operasional::find($id);
        return view('adminwebskp.ktoperasional.edit')->with('operasional', $operasional);
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

            'domas' => 'max:8',
            'dokel' => 'max:8',
            'ekspor' => 'max:8',
            'impor' => 'max:8',
            'tahun' => 'required|integer|min:4'

        ]);

        $operasional = Operasional::find($id);

        $operasional->domas = (int)$operasional->domas + (int)$request->domas;
        $operasional->dokel = (int)$operasional->dokel + (int)$request->dokel;
        $operasional->ekspor = (int)$operasional->ekspor + (int)$request->ekspor;
        $operasional->impor = (int)$operasional->impor + (int)$request->impor;
        $operasional->tahun = $request->tahun;

        $operasional->save();

        return redirect(route('ktoperasional.index'))
        ->with('success', 'Berhasil Ubah Data Operasional!');
    }


    /*create JSON chart data*/
    public function chartApi($tahun)
    {
        $chart = new Charts;

        $getDataTahun = Operasional::orderBy('tahun', 'desc')
        ->limit(3)
        ->get();

        $datas = collect([]);

        foreach ($getDataTahun as $data) {

            $ekspor = $data->ekspor;
            $impor = $data->impor;
            $domas = $data->domas;
            $dokel = $data->dokel;

            $datas[$data->tahun] = [$ekspor, $impor, $domas, $dokel];   
            
        }

        $chart->dataset('Data Operasional', 'pie', $datas[$tahun])
            ->backgroundColor(['#FF9655', '#bf80ff', '#96d900', '#ffca00']) ;


        return $chart->api();
    }


    /**
     * get Data from the JSON/ api then show and pass to compose.
     *
     * @return Response
     */
    private function showChart($tahun)
    {
        $chart = new Charts;

        $api = route('ktoperasional.chart', $tahun);

        return $chart->labels(['Ekspor', 'Impor', 'Domestik Masuk', 'Domestik Keluar'])
        ->title('Data Operasional Karantina Tumbuhan Tahun '.$tahun)
        ->minimalist(true)
        ->load($api);
    }

    /**
     * Bind chart to included view @index KT Operasional.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $getDataTahun = Operasional::select('tahun')->orderBy('tahun', 'desc')
        ->limit(3)
        ->get();

        $no = 1;

        foreach ($getDataTahun as $data) {
            $view->with('chart'. $no++, $this->showChart($data->tahun));
        }
        
    }


}
