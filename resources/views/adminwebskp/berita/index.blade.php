@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Berita')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Halaman Berita</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('berita.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Berita</a>
	    <ul class="nav navbar-right">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">
	    <table id="adminBeritaTable" class="table table-striped table-bordered text-center" width="100%">
	      <thead>
	        <tr>
	          <th width="5%">No</th>
	          <th width="10%">Penulis</th>
	          <th width="15%">Judul</th>
	          <th width="35%">Isi</th>
	          <th width="20%">Gambar</th>
	          <th width="5%">Status</th>
	          <th width="10%">Action</th>
	        </tr>
	      </thead>
	    </table>
	  </div>
	</div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="modalDeleteBerita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{route('berita.destroy', 'delete')}}" method="post">

	  		@csrf
        	@method('DELETE')

        	<input type="hidden" name="id" id="beritaId">
        	
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