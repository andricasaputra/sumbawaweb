@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Detail Agenda')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Detail Agenda</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('events.calendar') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">
	  	<h4>Nama Agenda : {{$events->title}}</h4>
	  	<p>Tanggal Dimulai : {{date('d-m-Y', strtotime($events->start_date))}}</p>
	  	<p>Tanggal Selesai : {{date('d-m-Y', strtotime($events->end_date))}}</p>
	  </div>
	</div>
</div>

@endsection



