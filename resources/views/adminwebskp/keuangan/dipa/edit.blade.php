@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit DIPA')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit DIPA</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('dipa.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{ route('dipa.update', $dipa->id) }}" method="post" enctype="multipart/form-data">

	  		@csrf
	  		@method('PUT')

	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{ $dipa->tahun }}" min="0">
	  		</div>
	  		<div class="form-group">
	  			<label for="revisi">Revisi</label>
	  			<select name="revisi" class="form-control">
	  				<option>{{ $dipa->revisi }}</option>
	  				<option>Awal</option>
	  				<option>1</option>
	  				<option>2</option>
	  			</select>
	  		</div>
	  		<div class="form-group">
	  			<label for="file">Ubah File</label>
	  			<span>{{ $dipa->file }}</span>
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
