@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-users"></i> My Ticket Detail</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- isi content --}}
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Detail Ticket</h3>
  </div> 
  
  <!-- /.card-header -->
  <div class="card-body">
    <h5><i class="fas fa-calendar"></i> {{$tiket->created_at}}</h5>
    <h5><i class="fas fa-briefcase"></i> {{$tiket->nama_divisi}}</h5>
    <h5><i class="fas fa-building"></i> {{$tiket->nama_departemen}}</h5>
    <h5><i class="fas fa-user"></i> {{$tiket->name}}</h5>
    <hr>
    <h5>STATUS: 
        @if ($tiket->status=="0")
                    <span class='badge bg-warning'>ENTRY</span>
                  @elseif ($tiket->status=="1")
                    <span class='badge bg-info'>ON PROGRESS</span>
                  @else
                    <span class='badge bg-success'>FINISH</span>
                  @endif
    </h5>
    <h5>TANGGAL PROSES: {{$tiket->tgl_mulai}}</h5>
    <h5>TANGGAL SOLVED: {{$tiket->tgl_selesai}}</h5>
    <hr>
    <h5><i class="fas fa-users-cog"></i> Oleh: {{$tiket->oleh}}</h5>
    <h5><i class="fas fa-comments"></i> Keterangan:</h5>
    <h5 class="form-control">{{$tiket->keterangan}}</h5>
  </div>
  <div class="card-footer">
    <a href="/tiket/myticket" class="btn btn-secondary"> Kembali </a>
  </div>
  <!-- /.card-body -->
  {{-- <div class="card-footer clearfix">
      {{$tiket->links()}}
  </div> --}}
</div>
<!-- /.card -->

@endsection