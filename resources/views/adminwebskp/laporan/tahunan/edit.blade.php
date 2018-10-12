@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit Laporan Tahunan')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit Laporan Tahunan</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('tahunan.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{ route('tahunan.update', $tahunan->id) }}" method="post" enctype="multipart/form-data">

	  		@csrf
	  		@method('PUT')

	  		<div class="form-group">
	  			<label for="jenis_laporan">Jenis Laporan</label>
	  			<select name="jenis_laporan" class="form-control">
	  				<option>{{$tahunan->jenis_laporan}}</option>
	  				<option>Laporan Tahunan</option>
	  				<option>Laporan Keuangan</option>
	  				<option>Laporan Kinerja</option>
	  				<option>Laporan PPID</option>
	  				<option>Laporan Kekayaan Pejabat Negara</option>
	  			</select>
	  		</div>
	  		<div class="form-group">
	  			<label for="nama_laporan">Nama Laporan</label>
	  			<input type="text" name="nama_laporan" class="form-control" value="{{$tahunan->nama_laporan}}">
	  		</div>
	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{$tahunan->tahun}}" min="0">
	  		</div>
	  		<div class="form-group">
	  			<label for="file">Ubah File</label>
	  			<span>{{ $tahunan->file }}</span>
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
