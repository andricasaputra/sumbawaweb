@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Tambah Realisasi Anggaran')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Tambah Realisasi Anggaran</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('realisasi_anggaran.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{ route('realisasi_anggaran.store') }}" method="post" enctype="multipart/form-data">

	  		@csrf

	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" min="0">
	  		</div>
	  		<div class="form-group">
	  			<label for="total">Total</label>
	  			<input type="number" step=any name="total" class="form-control" value="{{ old('total') }}" min="0" placeholder="gunakan tand titik (.) untuk desimal & input tanpa persen (%)">
	  		</div>
	  		<div class="form-group">
	  			<label for="file">Upload File</label>
	  			<input type="file" name="file">
	  		</div>
	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection
