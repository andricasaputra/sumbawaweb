<div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><span>SKP Sumbawa Besar</span></a>
            </div>
            <hr style="color: #eee; width: 100%" >
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="{{route('pengaduan.index')}}"><i class="fa fa-home"></i> Kotak Pengaduan </a>
                  </li>
                  <li><a href="{{route('headline.index')}}"><i class="fa fa-edit"></i> Headline </a>
                  </li>
                  <li><a href="{{route('berita.index')}}"><i class="fa fa-desktop"></i> Berita </a>
                  </li>
                  <li><a href="{{route('khoperasional.index')}}"><i class="fa fa-bar-chart-o"></i> Data Operasional KH </a>
                  <li><a href="{{route('ktoperasional.index')}}"><i class="fa fa-bar-chart-o"></i> Data Operasional KT </a>
                  <li><a href="{{route('pnbp.index')}}"><i class="fa fa-calculator"></i> PNBP </a>
                  <li><a href="{{route('ikm.index')}}"><i class="fa fa-user-plus"></i> IKM </a>
                  <li><a href="{{route('files.index')}}"><i class="fa fa-file-archive-o"></i> Upload Dokumen </a>
                  </li>
                  <li><a><i class="fa fa-money"></i> Keuangan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('dipa.index')}}">DIPA</a></li>
                      <li><a href="{{route('rka_kl.index')}}">RKA-KL</a></li>
                      <li><a href="{{route('realisasi_anggaran.index')}}">Realisasi Anggaran</a></li>
                      <li><a href="{{route('neraca_keuangan.index')}}">Neraca Keuangan</a></li>
                      <li><a href="{{route('daftar_aset.index')}}">Daftar Aset</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-info-circle"></i> PPID <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('informasi_berkala.index')}}">Informasi Berkala</a></li>
                      <li><a href="{{route('informasi_sertamerta.index')}}">Informasi Serta Merta</a></li>
                      <li><a href="{{route('informasi_setiapsaat.index')}}">Informasi Setiap Saat</a></li>
                      <li><a href="{{route('regulasi.index')}}">Upload Regulasi PPID</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-excel-o"></i> Laporan - laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('tahunan.index')}}">Laporan Tahunan</a></li>
                      <li><a href="{{route('keuangan.index')}}">Laporan Keuangan</a></li>
                      <li><a href="{{route('kinerja.index')}}">Laporan Kinerja</a></li>
                      <li><a href="{{route('ppid.index')}}">Laporan PPID</a></li>
                      <li><a href="{{route('kekayaan.index')}}">LHKPN</a></li>
                    </ul>
                  </li>
                  <li><a href="{{route('events.index')}}"><i class="fa fa-calendar"></i> Agenda Kegiatan </a>
                  </li>
                  <li><a><i class="fa fa-gear"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('register')}}">Register</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    {{ ucwords(Auth::user()->name) }}&nbsp;&nbsp;&nbsp;
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a  href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out pull-right"></i>Log Out
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

