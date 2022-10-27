@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-home"></i> Dashboard</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- isi content --}}
<div class="container-fluid mt-5 pt-5">
  <div class="row">
  <div class="col" >
    <div class="small-box bg-info">
      <div class="inner">
        <h1>{{$total_tiket}}</h1>
        <p>Total Tickets</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-list"></i>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="small-box bg-success">
      <div class="inner">
        <h1>{{$tiket_entry}}</h1>
        <p>Tickets Entry</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-exit"></i>
      </div>
    </div>
  </div>

    <div class="col">
      <div class="small-box bg-warning">
        <div class="inner">
          <h1>{{$tiket_proses}}</h1>
          <p>Tickets On Progress</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="small-box bg-danger">
        <div class="inner">
          <h1>{{$tiket_finish}}</h1>
          <p>Tickets Finish</p>
        </div>
        <div class="icon">
          <i class="ion ion-android-checkmark-circle"></i>
        </div>
      </div>
    </div>
  
</div>
</div>


@endsection