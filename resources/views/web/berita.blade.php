@extends('web.layouts.app')

@section('title', $berita->judul)

@section('content')

<style type="text/css">
	p {
		text-align: left !important;
	}

	p:not(:first-child) {
		text-indent: 70px;
		font-size: 17px
	}

	h2{
		font-size: 38px;
		font-weight: 600;
		margin-bottom: 10%
	}

	img {
		margin-bottom: 10% 
	}
</style>

<!--Start of Market-->
<section id="market">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="market_area text-center">
                    <h2>{{$berita->judul}}</h2>
                    <img src="{{ asset('storage/berita/' . $berita->gambar)}}">
                    <p>
                    	{!! $berita->isi !!}
                    </p>
                </div>
                <!--End of market Area-->
            </div>
            <!--End of col-md-12-->
        </div>
        <!--End of row-->
    </div>
    <!--End of container-->
</section>
<!--End of market-->

@endsection