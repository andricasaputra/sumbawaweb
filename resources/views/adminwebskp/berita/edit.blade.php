@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit Berita')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit Berita</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{route('berita.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{route('berita.update', $berita->id)}}" method="post" enctype="multipart/form-data">

	  		@csrf
	  		@method('PUT')

	  		<div class="form-group">
	  			<label for="judul">Penulis</label>
	  			<input type="text" name="penulis" class="form-control" value="{{$berita->penulis}}">
	  		</div>
	  		<div class="form-group">
	  			<label for="judul">Judul</label>
	  			<input type="text" name="judul" class="form-control" value="{{$berita->judul}}">
	  		</div>
	  		<div class="form-group">
	  			<label for="isi">Isi</label>
	  			<textarea name="isi" class="form-control" rows="25">{{$berita->isi}}</textarea>
	  		</div>
	  		<div class="form-group">
	  			<img src="{{asset('storage/berita/'.$berita->gambar)}}" width="40%">
	  		</div>
	  		<div class="form-group">
	  			<label for="gambar">Ubah Gambar</label>
	  			<input type="file" name="gambar">
	  		</div>
	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection
