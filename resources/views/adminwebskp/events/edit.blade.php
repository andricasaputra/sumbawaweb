@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Edit Agenda Kegiatan')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Edit Agenda Kegiatan</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('events.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{route('events.update', $events->id)}}" method="post">

	  		@csrf
	  		@method('PUT')


	  		<div class="form-group">
	  			<label for="title">Nama Kegiatan</label>
	  			<input type="text" name="title" class="form-control" value="{{ $events->title }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="color">Pilih Warna Pada kalender Events</label>
	              <select name="color" class="form-control" id="colorEdit">
	              	<option style="color:{{$events->color}};" value="{{$events->color}}" >{{$events->color}}</option>
	                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
	                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
	                <option style="color:#008000;" value="#008000">&#9724; Green</option>             
	                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
	                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
	                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
	                <option style="color:#000;" value="#000">&#9724; Black</option>
	            </select>
	  		</div>
	  		<div class="form-group">
	  			<label for="start_date">Waktu Mulai</label>
	  			<input type="date" name="start_date" class="form-control" value="{{ $events->start_date }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="end_date">Selesai</label>
	  			<input type="date" name="end_date" class="form-control" value="{{ $events->end_date  }}">
	  		</div>

	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection
