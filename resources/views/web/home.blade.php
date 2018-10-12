@extends('web.layouts.app')

@section('title', 'Home')

@section('content')

    <!--Start of slider section-->
    <section id="slider">
        <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="10000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $no = 0; ?>
                @foreach($headlines as $headline)

                    @if($no++ == 0)

                        <div class="item active">
                            <div class="slider_overlay">
                                <img src="{{ asset('storage/headline/' . $headline->gambar)}}" alt="headline">
                                <!-- <div class="carousel-caption">
                                    <div class="slider_text">
                                        <h3>Protect</h3>
                                        <h2>nature the environment</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <a href="" class="custom_btn">Read  More</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>


                    @else

                        <div class="item">
                            <div class="slider_overlay">
                                <img src="{{ asset('storage/headline/' . $headline->gambar)}}" alt="headline">
                                <!-- <div class="carousel-caption">
                                    <div class="slider_text">
                                        <h3>Protect</h3>
                                        <h2>nature the environment</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <a href="" class="custom_btn">Read  More</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                    @endif

                @endforeach
                
            <!--End of Carousel Inner-->
        </div>
    </section>
    <!--end of slider section-->
        
    <!--Start of welcome section-->
    <section id="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wel_header">
                        <h2>Maklumat Pelayanan</h2>
                        <p style="font-size: 16px;line-height: 2">"Dengan ini kami menyatakan sanggup menyelenggarakan pelayanan 
                        sesuai standar pelayanan yang telah ditetapkan <br> serta siap menerima sanksi untuk setiap pengaduan yang tidak ditindaklanjuti sesuai peraturan perundangan" </p>
                    </div>
                </div>
            </div>
            <!--End of row-->
            <div class="row" style="margin-top: 6%;margin-bottom: 2%">
                <div class="col-md-12">
                    <div class="wel_header">
                        <h2>Layanan karantina Pertanian</h2>
                    </div>
                </div>
            </div>
            <!--End of row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="item">
                        <div class="single_item">
                            <div class="item_list">
                                <div class="welcome_icon">
                                    <i class="fa fa-paw"></i>
                                </div>
                                <h4>Karantina Hewan</h4>
                                <p>Temukan Semua Informasi Tentang Layanan Dibidang Karantina Hewan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of col-md-3-->
                <div class="col-md-6">
                    <div class="item">
                        <div class="single_item">
                            <div class="item_list">
                                <div class="welcome_icon">
                                    <i class="fa fa-leaf"></i>
                                </div>
                                <h4>Karantina Tumbuhan</h4>
                                <p>Temukan Semua Informasi Tentang Layanan Dibidang Karantina Tumbuhan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of row-->
        </div>
        <!--End of container-->
    </section>
    <!--end of welcome section-->

    <!--Start of volunteer-->
    <section id="volunteer">
        <div class="container">
            <div class="row vol_area">
                <div class="col-md-8">
                    <div class="volunteer_content">
                        <h3>Pertanyaan Seputar <span>Karantina</span></h3>
                        <p>Pertanyaan Yang Sering Diajukan Terkait Perkarantinaan & Berkenalan Lebih Dekat Dengan Karantina Pertanian!</p>
                    </div>
                </div>
                <!--End of col-md-8-->
                <div class="col-md-3 col-md-offset-1">
                    <div class="join_us">
                        <a href="" class="vol_cust_btn">Selengkapnya</a>
                    </div>
                </div>
                <!--End of col-md-3-->
            </div>
            <!--End of row and vol_area-->
        </div>
        <!--End of container-->
    </section>
    <!--end of volunteer-->

    <!--Start of counter-->
    <section id="counter">
        <div class="counter_img_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="counter_header">
                            <h2>Quick Data</h2>
                            <p>Data operasional serta Penerimaan Negara Bulan Pajak (PNBP) sampai dengan tanggal {{$operasionals['tanggal']}}</p>
                        </div>
                    </div>
                    <!--End of col-md-12-->
                </div>
                <!--End of row-->
                <div class="row">
                    <div class="col-md-2 col-md-offset-1">
                        <div class="counter_item text-center">
                            <div class="sigle_counter_item">
                                <img src="img/tree.png" alt="">
                                <div class="counter_text">
                                        <span class="counter">
                                            @foreach($operasionals['ekspor'] as $ekspor)

                                            {{$ekspor}}

                                            @endforeach
                                        </span>
                                    <p>Ekspor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="counter_item text-center">
                            <div class="sigle_counter_item">
                                <img src="img/hand.png" alt="">
                                <div class="counter_text">
                                        <span class="counter">
                                            @foreach($operasionals['impor'] as $impor)

                                            {{$impor}}

                                            @endforeach
                                        </span>
                                    <p>Impor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="counter_item text-center">
                            <div class="sigle_counter_item">
                                <img src="img/tuhnder.png" alt="">
                                <div class="counter_text">
                                        <span class="counter">
                                            @foreach($operasionals['domas'] as $domas)

                                            {{$domas}}

                                            @endforeach
                                        </span>
                                    <p>Domestik Masuk</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="counter_item text-center">
                            <div class="sigle_counter_item">
                                <img src="img/cloud.png" alt="">
                                <div class="counter_text">
                                        <span class="counter">
                                            @foreach($operasionals['dokel'] as $dokel)

                                            {{$dokel}}

                                            @endforeach
                                        </span>
                                    <p>Domestik Keluar</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="counter_item text-center">
                            <div class="sigle_counter_item">
                                <img src="img/cloud.png" alt="">
                                <div class="counter_text">
                                        <span class="counter">
                                            @foreach($operasionals['pnbp'] as $pnbp)

                                            {{$pnbp}}

                                            @endforeach
                                        </span>
                                    <p style="text-transform: none;">PNBP (Rp)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </div>
    </section>
    <!--end of counter-->

    <!--Start of blog-->
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest_blog text-center">
                        <h2>Berita Terbaru</h2>
                        <p>Berikut Adalah Kumpulan Berita Terbaru Terkait Perkarantinaan!</p>
                    </div>
                </div>
            </div>
            <!--End of row-->
            <div class="row">
                @foreach($beritas as $berita)
                <div class="col-md-4">
                    <div class="blog_news">
                        <div class="single_blog_item">
                            <div class="blog_img">
                                <img src="{{ asset('storage/berita/thumbnail/' . $berita->gambar)}}" alt="berita">
                            </div>
                            <div class="blog_content">
                                <a href=""><h3>{{$berita->judul}}</h3></a>
                                <div class="expert">
                                    <div class="left-side text-left">
                                        <p class="left_side">
                                            <span class="clock"><i class="fa fa-clock-o"></i></span>
                                            <span class="time">{{$berita->created_at->format('d M Y')}}</span>
                                            <a href=""><span class="admin"><i class="fa fa-user"></i> {{$berita->penulis}}</span></a>
                                        </p>
                                    </div>
                                </div>
                                <p class="blog_news_content">       
                                {!!str_limit($berita->isi, 200)!!}
                                </p>
                                <br>
                                <a href="{{route('showsingle.berita', $berita->id)}}" class="blog_link">read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of col-md-4-->
                @endforeach
            </div>
            <!--End of row-->
        </div>
        <!--End of container-->
    </section>
    <!-- end of blog-->

    <!--Start of testimonial-->
    <section id="testimonial">
        <div class="testimonial_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial_header text-center">
                            <h2>Tautan Terkait</h2>
                            <p>Berikut Link Instansi & Aplikasi Terkait Perkarantinaan</p>
                        </div>
                    </div>
                </div>
                <!--End of row-->
                <section id="carousel">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                                    <!-- Carousel indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                                    </ol>
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="profile-circle">
                                                        <img src="img/tree_cut_3.jpg" alt="">
                                                    </div>
                                                    <div class="testimonial_content">
                                                        <i class="fa fa-quote-left"></i>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                    </div>
                                                    <div class="testimonial_author">
                                                        <h5>Sadequr Rahman Sojib</h5>
                                                        <p>CEO, Fourder</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="profile-circle">
                                                        <img src="img/tree_cut_3.jpg" alt="">
                                                    </div>
                                                    <div class="testimonial_content">
                                                        <i class="fa fa-quote-left"></i>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                    </div>
                                                    <div class="testimonial_author">
                                                        <h5>Sadequr Rahman Sojib</h5>
                                                        <p>CEO, Fourder</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End of item with active-->
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="profile-circle">
                                                        <img src="img/tree_cut_3.jpg" alt="">
                                                    </div>
                                                    <div class="testimonial_content">
                                                        <i class="fa fa-quote-left"></i>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                    </div>
                                                    <div class="testimonial_author">
                                                        <h5>Sadequr Rahman Sojib</h5>
                                                        <p>CEO, Fourder</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="profile-circle">
                                                        <img src="img/tree_cut_3.jpg" alt="">
                                                    </div>
                                                    <div class="testimonial_content">
                                                        <i class="fa fa-quote-left"></i>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                    </div>
                                                    <div class="testimonial_author">
                                                        <h5>Sadequr Rahman Sojib</h5>
                                                        <p>CEO, Fourder</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--ENd of item-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of row-->
                    </div>
                    <!--End of container-->
                </section>
                <!--End of carousel-->
            </div>
        </div>
        <!--End of container-->
    </section>
    <!--end of testimonial-->

    <!--Start of Market-->
    <section id="market">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="market_area text-center">
                        <!-- Youtube Part -->
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

    <!--Start of contact-->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="colmd-12">
                    <div class="contact_area text-center">
                        <h3>Kontak Kami</h3>
                        <p>Jika Anda Mempunyai Pertanyaan, Keluhan, Kritik Atau Saran Terhadap Pelayanan Kami Silahkan Hubungi Call Center Dibawah Ini</p>
                    </div>
                </div>
            </div>
            <!--End of row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="office">
                        <div class="title">
                            <h5>Kantor Induk</h5>
                        </div>
                        <div class="office_location">
                            <div class="address">
                                <i class="fa fa-map-marker"><span>Jln. Pelabuhan Badas No. 01 Sumbawa besar</span></i>
                            </div>
                            <div class="phone">
                                <i class="fa fa-phone"><span>(0371)  2629152</span></i>
                            </div>
                            <div class="whatsapp">
                                <i class="fa fa-whatsapp"><span> 081 238 499 998</span></i>
                            </div>
                            <div class="email">
                                <i class="fa fa-envelope"><span>humasskpsumbawa@gmail.com</span></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="msg">
                        <div class="msg_title">
                            <h5>Kirim Pesan</h5>
                        </div>
                        <div class="form_area">
                            <!-- CONTACT FORM -->
                            <div class="contact-form fadeIn animated">
                                <div id="message"></div>
                                <form action="scripts/contact.php" class="form-horizontal contact-1" role="form" name="contactform" id="contactform">
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" id="telepon" placeholder="No Telp." name="telepon">
                                            <textarea name="contact-message" id="msg" class="form-control" cols="20" rows="8" placeholder="Isi Pertanyaan Atau Keluhan"></textarea>
                                            <button type="submit" class="btn custom-btn" data-loading-text="Loading..." style="margin-top: 3%">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of col-md-6-->
            </div>
            <!--End of row-->
        </div>
        <!--End of container-->
    </section>
    <!--End of contact-->

@endsection