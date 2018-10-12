@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Indeks Kepuasan Masyarakat')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Halaman Data Indeks Kepuasan Masyarakat</h3>
	    <h5><i>Ket : Untuk Mengupload File/Hardcopy PDF dari IKM,
	     <a href="{{route('files.index')}}" style="color: #2d6a9f">klik disini</a></i></h5>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('ikm.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
	          <th width="10%">No</th>
	          <th width="20%">Tahun</th>
	          <th width="20%">Periode</th>
	          <th width="25%">Rata - rata</th>
	          <th width="25%">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $no = 1; ?>
	      	@foreach($ikm as $o)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$o->tahun}}</td>
	      		<td>{{$o->periode}}</td>
	      		<td>{{$o->rata_rata}} %</td>
	      		<td>
      				<a href="{{ route('ikm.edit', $o->id) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Update</a>
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
		@include('adminwebskp.ikm.charts')
	</div>
</div>

@endsection



