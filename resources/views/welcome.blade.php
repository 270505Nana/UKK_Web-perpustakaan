@extends('layout.admin')
<!-- load file admin  -->

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
              <span class="info-box-text">Jumlah Buku</span>
                <span class="info-box-number"> {{ $data_nana }}</span>
              </div>
            </div>
          </div>

       
            </div>
            
            </div>
          </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection