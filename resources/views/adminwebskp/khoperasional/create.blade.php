@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Tambah Data Operasional KH')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Tambah Data Operasional KH</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{route('khoperasional.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{route('khoperasional.store')}}" method="post">

	  		@csrf

	  		<div class="form-group">
	  			<label for="domas">Domestik Masuk</label>
	  			<input type="text" name="domas" class="form-control" value="{{ old('domas') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="dokel">Domestik Keluar</label>
	  			<input type="text" name="dokel" class="form-control" value="{{ old('dokel') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="ekspor">Ekspor</label>
	  			<input type="text" name="ekspor" class="form-control" value="{{ old('ekspor') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="impor">Impor</label>
	  			<input type="text" name="impor" class="form-control" value="{{ old('impor') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{ date('Y') }}" readonly>
	  		</div>

	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection