@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit Data Operasional KT')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit Data Operasional KT</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{route('ktoperasional.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<div class="row">

		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <h4 class="card-title"><i>Domestik Keluar Terakhir</i></h4>
		        <p class="card-text">
		        	<h5>{{ $operasional->dokel }}</h5>
		        </p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <h4 class="card-title"><i>Domestik Masuk Terakhir</i></h4>
		        <p class="card-text">
		        	<h5>{{ $operasional->domas }}</h5>
		        </p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <h4 class="card-title"><i>Eskpor Terakhir</i></h4>
		        <p class="card-text">
		        	<h5>{{ $operasional->ekspor }}</h5>
		        </p>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6">
		    <div class="card">
		      <div class="card-body">
		        <h4 class="card-title"><i>Impor Terakhir</i></h4>
		        <p class="card-text">
		        	<h5>{{ $operasional->impor }}</h5>
		        </p>
		      </div>
		    </div>
		  </div>

		</div>

	  	<form action="{{route('ktoperasional.update', $operasional->id)}}" method="post">

	  		@csrf
	  		@method('PUT')

			<p><h3><b>Dibawah Ini Kolom Untuk Mengupdate Data Opersional Bulanan</b></h3></p>

	  		<div class="form-group">
	  			<label for="domas">Domestik Masuk Bulan Ini/ Terbaru</label>
	  			<input type="number" name="domas" class="form-control">
	  		</div>
	  		<div class="form-group">
	  			<label for="dokel">Domestik Keluar Bulan Ini/ Terbaru</label>
	  			<input type="number" name="dokel" class="form-control">
	  		</div>
	  		<div class="form-group">
	  			<label for="ekspor">Ekspor Bulan Ini/ Terbaru</label>
	  			<input type="number" name="ekspor" class="form-control">
	  		</div>
	  		<div class="form-group">
	  			<label for="impor">Impor Bulan Ini/ Terbaru</label>
	  			<input type="number" name="impor" class="form-control">
	  		</div>
	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{$operasional->tahun}}" readonly>
	  		</div>

	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection