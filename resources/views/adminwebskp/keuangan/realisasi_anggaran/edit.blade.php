@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit Realisasi Anggaran')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit Realisasi Anggaran</h3>
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

	  	<div class="row">

		  <div class="col-sm-12">
		    <div class="card">
		      <div class="card-body">
		        <h4 class="card-title"><i>Realisasi Anggaran Terakhir</i></h4>
		        <p class="card-text">
		        	<h5>{{ $realisasi_anggaran->total }} %</h5>
		        </p>
		      </div>
		    </div>
		  </div>

		</div>

	  	<form action="{{ route('realisasi_anggaran.update', $realisasi_anggaran->id) }}" method="post" enctype="multipart/form-data">

	  		@csrf
	  		@method('PUT')

	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{ $realisasi_anggaran->tahun }}" min="0">
	  		</div>
	  		<div class="form-group">
	  			<label for="total">Total</label>
	  			<input type="number" step=any name="total" class="form-control" value="{{ $realisasi_anggaran->total }}" min="0">
	  		</div>
	  		<div class="form-group">
	  			<label for="file">Ubah File</label>
	  			<span>{{ $realisasi_anggaran->file }}</span>
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
