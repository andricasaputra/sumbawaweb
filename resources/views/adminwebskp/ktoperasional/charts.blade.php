
<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Statistik</h2>
      <ul class="nav navbar-right">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      	{!! $chart1->container() !!}
    </div>
  </div>
</div>


<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Statistik</h2>
      <ul class="nav navbar-right">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        {!! $chart2->container() !!}
    </div>
  </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Statistik</h2>
      <ul class="nav navbar-right">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        {!! $chart3->container() !!}
    </div>
  </div>
</div>



@section('chart-scripts')

	<!-- Chart.js -->
  <script src="{{asset('adminwebskp/vendors/Chart.js/dist/Chart.min.js')}}"></script>
 	{!! $chart1->script() !!}

  {!! $chart2->script() !!}

  {!! $chart3->script() !!}

@endsection