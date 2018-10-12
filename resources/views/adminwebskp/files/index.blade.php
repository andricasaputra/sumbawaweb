@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Arsip Dokumen')

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
	    <h3>Halaman Upload Dokumen</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('files.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Dokumen</a>
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
	          <th width="25%">Nama Dokumen</th>
	          <th width="15%">Kategori</th>
	          <th width="15%">File Tipe</th>
	          <th width="10%">Lihat File</th>
	          <th width="10%">Status</th>
	          <th width="20%">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $no = 1; ?>
	      	@foreach($files as $file)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$file->judul_dokumen}}</td>
	      		<td>{{$file->kategori}}</td>
	      		<td>
	      			<?php $x = explode(".", $file->nama_file) ?>
	      			@switch(end($x))
					    @case('pdf')
					        {{'PDF'}}
					        @break

					    @case('docx')
					        {{'MS Word'}}
					        @break

					    @case('xlsx')
					        {{'MS Excel'}}
					        @break

					    @case('zip')
					        {{'ZIP'}}
					        @break

					    @case('rar')
					        {{'RAR'}}
					        @break

					    @default
					        {{'MS Word'}}
					@endswitch
	      		</td>
	      		<td>
	      			<a href="{{ route('files.download', $file->nama_file) }}" class="btn btn-warning btn-xs" target="_blank"><i class="glyphicon glyphicon-download"></i> Download File</a>
	      		</td>
	      		<td>
	      			@if($file->tampil == 'Ya')

	      				<a href="{{ route('files.show', $file->id) }}" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Show</a>

	      			@else

	      				<a href="{{ route('files.show', $file->id) }}" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-close"></i> Hide</a>

	      			@endif
	      		</td>
	      		<td>
	      			<a href="{{ route('files.edit', $file->id) }}" class="btn btn-primary btn-xs" style="margin-bottom: 10px"><i class="glyphicon glyphicon-edit"></i> Edit</a>
	      			<form action="{{ route('files.destroy', $file->id) }}" method="post">
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

<!-- Modal Delete -->
<div class="modal fade" id="modalDeletefiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      	<h3>Apakah Anda Yakin Ingin Meghapus Data Ini?</h3><br>
        <form action="{{route('files.destroy', 'delete')}}" method="post">

	  		@csrf
        	@method('DELETE')

        	<input type="hidden" name="id" id="filesId">
        	
        	<input type="submit" name="delete" value="Ya" class="btn btn-primary">
        	<button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
	  	</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



@endsection