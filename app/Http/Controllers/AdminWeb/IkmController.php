<?php

namespace App\Http\Controllers\AdminWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

use App\Charts\OperasionalKhChart as Charts;

use App\Models\AdminWeb\IkmModel as Ikm;

class IkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ikm = Ikm::orderBy('created_at', 'desc')->get();
        return view('adminwebskp.ikm.index')->with('ikm',$ikm);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminwebskp.ikm.create');
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

            "tahun" => "required|max:4|min:4",
            "periode" => "required",
            "rata_rata" => "required"

        ]);

        $ikm = new Ikm;

        $ikm->tahun = $request->tahun;
        $ikm->periode = $request->periode;
        $ikm->rata_rata = $request->rata_rata;

        $ikm->save();

        return redirect(route('ikm.index'))
        ->with('success', 'Data IKM Berhasil Ditambah!');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ikm = Ikm::find($id);

        return view('adminwebskp.ikm.edit')->with('ikm', $ikm);
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

            "tahun" => "required|max:4|min:4",
            "periode" => "required",
            "rata_rata" => "required"

        ]);

        $ikm = Ikm::find($id);

        $ikm->tahun = $request->tahun;
        $ikm->periode = $request->periode;
        $ikm->rata_rata = $request->rata_rata;

        $ikm->save();

        return redirect(route('ikm.index'))
        ->with('success', 'Data IKM Berhasil Diubah!');
    }

    /*create JSON chart data*/
    public function chartApi()
    {
        $chart = new Charts;

        $getDataTahun = Ikm::orderBy('created_at', 'desc')->get();

        $datas = collect([]);

        foreach ($getDataTahun as $data) {

            $datas[] = $data->rata_rata;   
            $backgroundColor[] = '#64E572';
            
        }

        $chart->dataset('IKM', 'bar', $datas)
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
        $getDataTahun = Ikm::orderBy('created_at', 'desc')->get();

        foreach ($getDataTahun as $data) {

            $tahun[] = 'Periode '. $data->periode . ' Tahun ' .$data->tahun;
            $tahun2[] = $data->tahun;
            
        }

        $chart = new Charts;

        $api = route('ikm.chart');

        return $chart->labels($tahun)
        ->title('Data IKM Tahun '.  end($tahun2) .' s/d '. $tahun2[0] . ' Dalam (%)')
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
