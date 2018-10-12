@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Pengaduan Masyarakat')

@section('content')

<style type="text/css">
	td{
		overflow: hidden;
	}
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Halaman Pengaduan Masyarakat</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
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
	          <th width="15%">Nama</th>
	          <th width="15%">Email</th>
	          <th width="15%">Telepon</th>
	          <th width="40%">Isi</th>
	          <th width="10%">Waktu Pengaduan</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $no = 1; ?>
	      	@foreach($pengaduan as $p)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$p->nama}}</td>
	      		<td>{{$p->email}}</td>
	      		<td>{{$p->telepon}}</td>
	      		<td>{{$p->isi}}</td>
	      		<td>{{date('d-m-Y', strtotime($p->created_at))}}</td>
	      	</tr>
	      	@endforeach
	      </tbody>
	    </table>
	  </div>
	</div>
</div>

@endsection



