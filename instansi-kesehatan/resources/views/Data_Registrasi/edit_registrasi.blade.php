<!DOCTYPE html>
<html lang="en">

@include('app-layout/head')

<body class="hold-transition sidebar-mini layout-fixed">
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
              <li class="breadcrumb-item"><a href="/Data_Registrasi/registrasi">Home</a></li>
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
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data {{ $title }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('registrasi_update')}}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                <input type="hidden" name="id" value="{{ $registrasi[0]->id }}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jenis registrasi</label>
                        <select name="jenis_registrasi" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="UGD">UGD</option>
                            <option value="Rawat Inap">Rawat Inap</option>
                            <option value="Rawat Jalan">Rawat Jalan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status registrasi</label>
                        <select name="status_registrasi" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="Aktif">Aktif</option>
                            <option value="Tutup Kunjungan">Tutup Kunjungan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor Rekam Medis</label>
                        <select class="form-control select2" style="width: 100%;">
                            @foreach ($pasien as $item)
                            <option value="{{ $item->id }}">{{ $item->no_rekam_medis }}</option>
                        @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Layanan</label>
                        <select name="layanan" class="form-control select2" style="width: 100%;">
                            @foreach ($layanan as $item)
                                <option value="{{ $item->id }}">{{ $item->layanan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Pembayaran</label>
                        <select name="pembayaran" class="form-control select2" style="width: 100%;">
                            @foreach ($pembayaran as $item)
                                <option value="{{ $item->id }}">{{ $item->pembayaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <select name="petugas" class="form-control select2" style="width: 100%;">
                            @foreach ($petugas as $item)
                                <option value="{{ $item->id }}">{{ $item->petugas }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins') }}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins') }}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('AdminLTE/plugins') }}/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist') }}/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist') }}/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>