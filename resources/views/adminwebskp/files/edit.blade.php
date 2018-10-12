@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit Files')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit Dokumen</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{route('files.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{route('files.update', $files->id)}}" method="post" enctype="multipart/form-data">

	  		@csrf
	  		@method('PUT')

	  		<div class="form-group">
	  			<label for="judul_dokumen">Nama Dokumen</label>
	  			<input type="text" name="judul_dokumen" class="form-control" value="{{ $files->judul_dokumen }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="judul">Kategori</label>
	  			<select name="kategori" class="form-control">
	  				<option>{{ $files->kategori }}</option>
	  				<option>IKM</option>
	  				<option>IPNBK</option>
	  				<option>Lainnya</option>
	  			</select>
	  		</div>
	  		<div class="form-group">
	  			<label for="nama_file">Ubah File</label>
	  			<span>{{ $files->nama_file }}</span>
	  			<input type="file" name="nama_file">
	  		</div>

	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection
