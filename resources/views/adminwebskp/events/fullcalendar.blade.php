@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Events Calendar')


@section('custom-link')
<link href="{{asset('adminwebskp/build/css/fullcalendar.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Calendar Events</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('events.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">
	  	{!! $calendar->calendar() !!}
	  </div>
	</div>
</div>

@endsection

@section('scripts')
<script src="{{asset('adminwebskp/build/js/moment.min.js')}}"></script>
<script src="{{asset('adminwebskp/build/js/fullcalendar.min.js')}}"></script>
{!! $calendar->script() !!}
@endsection