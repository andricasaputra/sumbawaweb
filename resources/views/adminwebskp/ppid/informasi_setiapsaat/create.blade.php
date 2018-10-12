@extends('adminwebskp.layouts.adminwebskp')

@section('title', 'Tambah PPID Informasi Setiap Saat')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="page-title">
	  <div class="title_left">
	    <h3>Tambah Informasi Setiap Saat</h3>
	  </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
	    <a href="{{ route('informasi_setiapsaat.index') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
	    <ul class="nav navbar-right panel_toolbox">
	      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	      </li>
	    </ul>
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	  	<form action="{{ route('informasi_setiapsaat.store') }}" method="post" enctype="multipart/form-data">

	  		@csrf

	  		<div class="form-group">
	  			<label for="nama_info">Nama Informasi</label>
	  			<input type="text" name="nama_info" class="form-control" value="{{ old('nama_info') }}">
	  		</div>
	  		<div class="form-group">
	  			<label for="bagian_info">Bagian Informasi</label>
	  			<select class="form-control" name="bagian_info" id="bagian_info">
                  	<option>Daftar Informasi Publik SKP Kelas I Sumbawa Besar</option>
                  	<option>Informasi tentang peraturan, keputusan, dan/atau kebijakan SKP Kelas I Sumbawa Besar</option>
                  	<option>Daftar rancangan peraturan perundang-undangan di bidang keuangan negara</option>
                  	<option>Seluruh informasi yang wajib disediakan dan diumumkan secara berkala</option>
                  	<option>Informasi tentang organisasi, administrasi, kepegawaian, dan keuangan</option>
                  	<option>Profil pimpinan dan pegawai SKP Kelas I Sumbawa Besar</option>
                  	<option>Surat-surat perjanjian dengan pihak ketiga</option>
                  	<option>Surat menyurat pimpinan atau pejabat SKP Kelas I Sumbawa Besar dalam rangka pelaksanaan tugas pokok dan fungsinya</option>
                  	<option>Syarat-syarat perizinan, izin yang diterbitkan dan/atau dikeluarkan berikut dokumen pendukungnya, dan laporan penataan izin yang diberikan </option>
                  	<option>Data perbendaharaan atau inventaris </option>
                  	<option>Rencana Strategis & Rencana Kerja SKP Kelas I Sumbawa Besar</option>
                  	<option>Agenda kerja pimpinan SKP Kelas I Sumbawa Besar</option>
                  	<option>Layanan Publik SKP Kelas I Sumbawa Besar</option>
                  	<option>Jumlah, jenis, dan gambaran umum pelanggaran yang dilaporkan oleh masyarakat serta laporan penindakannya (Laporan Pengaduan Masyarakat)</option>
                  	<option>Daftar serta hasil-hasil penelitian</option>
                  	<option>Siaran Pers dan Keterangan Pers</option>
                 </select>
	  		</div>
	  		<div class="form-group">
	  			<label for="kategori">Kategori</label>
	  			<select class="form-control" name="kategori" id="kategori">
	  				<option selected disabled>- Kosongkan Jika Tidak Ada Kategori -</option>
	  				<option></option>
                    <option>Pedoman Pengelolaan Organisasi</option>
                    <option>Pedoman Pengelolaan Administrasi</option>
                    <option>Pedoman Pengelolaan Kepegawaian</option>
                    <option>Pedoman Pengelolaan Keuangan</option>
                  </select>
	  		</div>
	  		<div class="form-group">
	  			<label for="keterangan">Keterangan</label>
	  			<select class="form-control" name="keterangan" id="keterangan">
	  				<option selected disabled>- Kosongkan Jika Tidak Ada Keterangan -</option>
	  				<option></option>
                    <option>SKP Kelas I Sumbawa Besar Tidak Mengeluarkan Peraturan/ Keputusan</option>
                    <option>Tersedia Di SKP Kelas I Sumbawa Besar (Hard Copy)</option>
                    <option>Dikecualikan</option>
                    <option>Tidak Tersedia</option>
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
