
<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2 col-sm-offset-2 text-center">
  <div class="x_panel">
    <div class="x_title">
      <h2>Statistik Indeks Kepuasan Masyarakat (IKM)</h2>
      <ul class="nav navbar-right">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      	{!! $chart->container() !!}
    </div>
  </div>
</div>

@section('chart-scripts')

	<!-- Chart.js -->
  <script src="{{asset('adminwebskp/vendors/Chart.js/dist/Chart.min.js')}}"></script>
 	{!! $chart->script() !!}

@endsection