@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Tambah PPID Informasi Berkala')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Tambah Informasi Berkala</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('informasi_berkala.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{ route('informasi_berkala.store') }}" method="post" enctype="multipart/form-data">

	  		@csrf

	  		<div class="form-group">
	  			<label for="nama_info">Nama Informasi</label>
	  			<input type="text" name="nama_info" class="form-control" value="{{ old('nama_info') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="kategori">Kategori</label>
	  			<select class="form-control" name="kategori" id="kategori">
                    <option>Profil SKP</option>
                    <option>Kegiatan Dan Kinerja SKP</option>
                    <option>Dokumen / Laporan Kinerja</option>
                    <option>IKM</option>
                    <option>Keuangan</option>
                    <option>Akses Informasi Publik</option>
                    <option>Lainnya</option>
                  </select>
	  		</div>
	  		<div class="form-group">
	  			<label for="link">Link (Diisi Dengan Link Pada Website Yang Tidak Butuh File Upload ex:https://skp1sumbawabesar.org/tentang_kami?profil)</label>
	  			<input type="text" name="link" class="form-control" value="{{ old('link') }}" placeholder="kosongkan jika ada file yang akan diupload">
	  		</div>
	  		<div class="form-group">
	  			<label for="file">Upload File</label>
	  			<input type="file" name="file">
	  		</div>
	  		<div class="pull-right">
	  			<input type="submit" name="submit" value="Simpan" class="btn btn-warning">
	  		</div>

	  	</form>

	  </div>
	</div>
</div>


@endsection
