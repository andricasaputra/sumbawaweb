@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'RKA-KL')

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
	    <h3>Halaman Keuangan/ RKA-KL</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('rka_kl.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
	          <th width="20%">Revisi</th>
	          <th width="10%">Tipe File</th>
	          <th width="20%">File</th>
	          <th width="20%">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php $no = 1; ?>
	      	@foreach($rka_kl as $rka)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$rka->tahun}}</td>
	      		<td>{{$rka->revisi}}</td>
	      		<td>
	      			<?php $x = explode(".", $rka->file) ?>
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
	      			<a href="{{ route('rka_kl.show', $rka->file) }}" class="btn btn-warning btn-xs" target="_blank"><i class="glyphicon glyphicon-download"></i> Lihat File</a>
	      		</td>
	      		<td>
      				<a href="{{ route('rka_kl.edit', $rka->id) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Update</a>
      				<form action="{{ route('rka_kl.destroy', $rka->id) }}" method="post">
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



