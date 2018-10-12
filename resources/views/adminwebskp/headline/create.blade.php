@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Tambah Headline')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Tambah Headline</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{route('headline.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{route('headline.store')}}" method="post" enctype="multipart/form-data">

	  		@csrf

	  		<div class="form-group">
	  			<label for="judul">Judul</label>
	  			<input type="text" name="judul" class="form-control" placeholder="kosongkan jika tidak ada judul di headline" value="">
	  		</div>
	  		<div class="form-group">
	  			<label for="deskripsi">Deskripsi</label>
	  			<input type="text" name="deskripsi" class="form-control" placeholder="kosongkan jika tidak ada deskripsi di headline" value="">
	  		</div>
	  		<div class="form-group">
	  			<label for="gambar">Gambar</label>
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