@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit Data PNBP')

@section('content')
<?php  
use App\Http\Controllers\AdminWeb\PnbpController as Pnbp;
?>
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit Data PNBP</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{route('pnbp.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<div class="row">

		  <div class="col-sm-12">
		    <div class="card">
		      <div class="card-body">
		        <h4 class="card-title"><i>Total PNBP Terakhir</i></h4>
		        <p class="card-text">
		        	<h5>{{ Pnbp::rupiah($pnbp->total) }}</h5>
		        </p>
		      </div>
		    </div>
		  </div>

		</div>

	  	<form action="{{route('pnbp.update', $pnbp->id)}}" method="post">

	  		@csrf
	  		@method('PUT')

			<p><h3><b>Dibawah Ini Kolom Untuk Mengupdate/ Menambah PNBP Bulanan</b></h3></p>

	  		<div class="form-group">
	  			<label for="total">PNBP Bulan Ini/ Terbaru</label>
	  			<input type="number" name="total" class="form-control">
	  		</div>
	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{$pnbp->tahun}}" readonly>
	  		</div>

	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection