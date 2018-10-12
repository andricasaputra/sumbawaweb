@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Tambah Data IKM')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Tambah Data IKM</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{route('ikm.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{route('ikm.store')}}" method="post">

	  		@csrf
	  		
	  		<div class="form-group">
	  			<label for="tahun">Tahun</label>
	  			<input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="periode">periode</label>
	  			<select name="periode" class="form-control">
	  				<option value="1">1</option>
	  				<option value="2">2</option>
	  			</select>
	  		</div>
	  		<div class="form-group">
	  			<label for="rata_rata">Rata - rata</label>
	  			<input type="number" step=any name="rata_rata" class="form-control" value="{{ old('rata_rata') }}" placeholder="untuk desimal gunakan titik (.)">
	  		</div>
	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection