@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Data Operasional KT')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Halaman Data Operasional KT</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('ktoperasional.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
	    <ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">
	    <table class="table table-striped table-bordered text-center datatable" width="100%">
	      <thead>
	        <tr>
	          <th width="5%">No</th>
	          <th width="15%">Domestik Masuk</th>
	          <th width="15%">Domestik Keluar</th>
	          <th width="15%">Ekspor</th>
	          <th width="15%">Impor</th>
	          <th width="15%">Tahun</th>
	          <th width="20%">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $no = 1; ?>
	      	@foreach($operasional as $o)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$o->domas}}</td>
	      		<td>{{$o->dokel}}</td>
	      		<td>{{$o->ekspor}}</td>
	      		<td>{{$o->impor}}</td>
	      		<td>{{$o->tahun}}</td>
	      		<td>
	      			<a href="{{ route('ktoperasional.edit', $o->id) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Update</a>
	      		</td>
	      	</tr>
	      	@endforeach
	      </tbody>
	    </table>
	  </div>
	</div>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@include('adminwebskp.ktoperasional.charts')
	</div>
</div>

@endsection



