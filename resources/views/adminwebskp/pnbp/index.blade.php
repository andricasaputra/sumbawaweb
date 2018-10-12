@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'PNBP')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Halaman Data Penerimaan Negara Bukan Pajak</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('pnbp.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
	          <th width="30%">Tahun</th>
	          <th width="30%">Total PNBP</th>
	          <th width="30%">Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	<?php 
	      	$no = 1; 
	      	use App\Http\Controllers\AdminWeb\PnbpController as Pnbp;
	      	?>
	      	@foreach($pnbp as $o)
	      	<tr>
	      		<td>{{$no++}}</td>
	      		<td>{{$o->tahun}}</td>
	      		<td>{{Pnbp::rupiah($o->total)}}</td>
	      		<td>
      				<a href="{{ route('pnbp.edit', $o->id) }}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Update</a>
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
		@include('adminwebskp.pnbp.charts')
	</div>
</div>

@endsection



