@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Agenda Kegiatan')

@section('content')

<style type="text/css">
	td{
		overflow: hidden;
	}
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Halaman Agenda Kegiatan</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Agenda</a>
	    <a href="{{ route('events.calendar') }}" class="btn btn-success"><i class="fa fa-eye"></i> Lihat Kalender Agenda Kegiatan</a>
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
	          <th width="20%">Nama Kegiatan</th>
	          <th width="20%">Waktu Mulai</th>
	          <th width="25%">Selesai</th>
	          <th width="25%">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $no = 1; ?>
	      	@foreach($events as $event)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$event->title}}</td>
	      		<td>{{date('d-m-Y', strtotime($event->start_date))}}</td>
	      		<td>{{date('d-m-Y', strtotime($event->end_date))}}</td>
	      		<td>
      				<a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Update</a>
      				<form id="deleteBtn" action="{{ route('events.destroy', $event->id) }}" method="POST">
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



