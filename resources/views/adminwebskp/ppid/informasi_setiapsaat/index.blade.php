@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'PPID Informasi Setiap Saat')

@section('content')

<style type="text/css">
	td{
		vertical-align: text-bottom;
		overflow-y:hidden;
	}
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Halaman PPID/ Informasi Setiap Saat</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('informasi_setiapsaat.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
	          <th width="20%">Nama Informasi</th>
	          <th width="15%">Bagian Informasi</th>
	          <th width="10%">Kategori</th>
	          <th width="15%">Keterangan</th>
	          <th width="10%">Lihat File</th>
	          <th width="10%">Waktu Upload</th>
	          <th width="10%">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $no = 1; ?>
	      	@foreach($informasi_setiapsaat as $setiapsaat)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$setiapsaat->nama_info}}</td>
	      		<td>{{$setiapsaat->bagian_info}}</td>
	      		<td>{{$setiapsaat->kategori}}</td>
	      		<td>{{$setiapsaat->keterangan}}</td>
	      		<td>

	      			@if($setiapsaat->link !== '' && $setiapsaat->link !== NULL)
	      				
	      				<a href="{{$setiapsaat->link}}" class="btn btn-warning btn-xs" target="_blank"><i class="glyphicon glyphicon-download"></i> Lihat Link</a>
	      			
	      			@else

	      				<a href="{{ route('informasi_setiapsaat.show', $setiapsaat->file) }}" class="btn btn-warning btn-xs" target="_blank"><i class="glyphicon glyphicon-download"></i> Lihat File</a>

	      			@endif

	      		</td>
	      		<td>{{date('d-m-Y', time($setiapsaat->created_at))}}</td>
	      		<td>
      				<a href="{{ route('informasi_setiapsaat.edit', $setiapsaat->id) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Update</a>
      				<form action="{{ route('informasi_setiapsaat.destroy', $setiapsaat->id) }}" method="post">
	      				@csrf
	      				@method('DELETE')
	      				<button type="submit" class="btn btn-danger btn-xs" onclick=" return confirm('Apakah Anda Yakin Ingin Menghapus File Ini?')">
	      				<i class="glyphicon glyphicon-trash"></i> Delete
	      				</button>
	      			</form>
	      		</td>
	      	</tr>
	      	@endforeach
	      </tbody>
	    </table>
	  </div>
	</div>
</div>


@endsection



