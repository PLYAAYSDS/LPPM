<li class="header">MAIN NAVIGATION</li>
        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Penelitian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
              $role = auth()->user()->role;
              if($role == 1){
            ?>
                <li><a href="{{url('/penelitianhomelppm')}}"><i class="fa fa-circle-o"></i> Daftar Penelitian (LPPM)</a></li>
            <?php
              }else if($role == 2){
            ?>
                <li><a href="{{url('/penelitianhomedekan')}}"><i class="fa fa-circle-o"></i> Daftar Penelitian (dekan)</a></li>
            <?php
              }else if($role == 3){
            ?>
                <li><a href="{{url('/penelitianhomekaprodi')}}"><i class="fa fa-circle-o"></i> Daftar Penelitian (kaprodi)</a></li>
            <?php
              }else if($role == 4){
            ?>
                <li><a href="{{url('/penelitian')}}"><i class="fa fa-circle-o"></i> Daftar Penelitian</a></li>
            <?php
              }
            ?>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Review</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/reviewerhome')}}"><i class="fa fa-circle-o"></i> Proposal Penelitian</a></li>
            <li><a href="{{url('/reviewerfinal')}}"><i class="fa fa-circle-o"></i> Laporan Akhir</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Luaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/luaran')}}"><i class="fa fa-circle-o"></i> List Luaran</a></li>
            <li><a href="{{url('/publikasijurnal')}}"><i class="fa fa-circle-o"></i> Publikasi Jurnal</a></li>
            <li><a href="{{url('/publikasimediamasa')}}"><i class="fa fa-circle-o"></i> Publikasi Media Massa</a></li>
            <li><a href="{{url('/publikasiforumilmiah')}}"><i class="fa fa-circle-o"></i> Publikasi Forum Ilmiah</a></li>
            <li><a href="{{url('/hakkekayaaninternasional')}}"><i class="fa fa-circle-o"></i> Hak Kekayaan Internasional</a></li>
            <li><a href="{{url('/luaraniptek')}}"><i class="fa fa-circle-o"></i> Luaran Iptek</a></li>
            <li><a href="{{url('/produkterstandarisasi')}}"><i class="fa fa-circle-o"></i> Produk Terstandarisasi</a></li>
            <li><a href="{{url('/produktersertifikasi')}}"><i class="fa fa-circle-o"></i> Produk Tersertifikasi</a></li>
            <li><a href="{{url('/mitrahukum')}}"><i class="fa fa-circle-o"></i> Mitra Hukum</a></li>
            <li><a href="{{url('/luaranbuku')}}"><i class="fa fa-circle-o"></i> Buku</a></li>
          </ul>
        </li>
          