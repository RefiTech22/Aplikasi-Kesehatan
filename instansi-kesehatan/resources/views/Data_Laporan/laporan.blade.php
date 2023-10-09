<!DOCTYPE html>
<html lang="en">


@include('app-layout/head')

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    
    @include('app-layout/navbar')

  @include('app-layout/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data {{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Data_Laporan/laporan">Home</a></li>
              <li class="breadcrumb-item active">Data {{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <img src="{{ asset('/image/Bigs.png') }}" alt="" width="200" height="100">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Waktu Registrasi</th>
                    <th>No Registrasi</th>
                    <th>No Rekam Medis</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Registrasi</th>
                    <th>Layanan</th>
                    <th>Jenis Pembayaran</th>
                    <th>Status Registrasi</th>
                    <th>Waktu Mulai Pelayanan</th>
                    <th>Waktu Selesai Pelayanan</th>
                    <th>Petugas Pendaftaran</th>
                  </tr>
                  </thead>
                  <tbody>
                    <button onclick="cetak()" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Print</button>
                    @foreach ($laporan as $item)
                    <tr>
                   <?php
                   if($item->waktu_selesai_pelayanan == null){
                    $selesai = '';
                   }else{
                    $selesai = date('m/d/y h:i A', strtotime($item->waktu_selesai_pelayanan));
                   }
                   if($item->waktu_mulai_pelayanan == null){
                    $mulai = '';
                   }else{
                    $mulai = date('m/d/y h:i A', strtotime($item->waktu_mulai_pelayanan));
                   }
                   if($item->waktu_registrasi == null){
                    $WRegistrasi = '';
                   }else{
                    $WRegistrasi = date('m/d/y h:i A', strtotime($item->waktu_registrasi));
                   }
                    ?>              
                      <td>{{ $item->id }}</td>
                      <td>{{ $WRegistrasi }}</td>
                      <td>{{ $item->nomor_registrasi }}</td>
                      <td>{{ $item->no_rekam_medis }}</td>
                      <td>{{ $item->nama_pasien }}</td>
                      <td>{{ $item->jenis_kelamin }}</td>
                      <td>{{ $item->tanggal_lahir }}</td>
                      <td>{{ $item->jenis_registrasi }}</td>
                      <td>{{ $item->layanan }}</td>
                      <td>{{ $item->pembayaran }}</td>
                      <td>{{ $item->status_registrasi }}</td>
                      <td>{{ $mulai }}</td>
                      <td>{{ $selesai }}</td>
                      <td>{{ $item->petugas }}</td>
                    </tr>  
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('app-layout/footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
    function cetak(){
        window.print();
    }
</script>
<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins') }}/jquery/jquery.min.js"></script>
{{-- <script src="{{asset('AdminLTE/public/AdminLTE/plugins')}}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --> --}}
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- overlayScrollbars -->
{{-- <script src="{{ asset('AdminLTE/plugins') }}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & public/AdminLTE/plugins -->
<script src="{{ asset('AdminLTE/plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/jszip/jszip.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('AdminLTE/plugins') }}/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist') }}/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist') }}/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
