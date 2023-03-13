@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-users"></i> My Ticket</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- isi content --}}
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Tiket</h3>
  </div> 
  
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Kategori</th>
          <th>Status</th>
          <th>Keterangan</th>
          <th>Oleh</th>
          <th style="width: 80px">Detail</th>
        </tr>
      </thead>
      <tbody>
        
          @foreach ($tiket as $tiketnya)
              <tr>
                <td>{{$tiketnya->created_at}}</td>
                <td>{{$tiketnya->nama_kategori}}</td>
                <td>
                  @if ($tiketnya->status=="0")
                    <span class='badge bg-warning'>ENTRY</span>
                  @elseif ($tiketnya->status=="1")
                    <span class='badge bg-info'>ON PROGRESS</span>
                  @else
                    <span class='badge bg-success'>FINISH</span>
                  @endif
                </td>
                <td>{{$tiketnya->keterangan}}</td>
                <td>{{$tiketnya->oleh}}</td>
                <td>
                  <a href="/tiket/{{$tiketnya->id}}/detail"  class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></a>
                  {{-- <form action="/tiket/{{$tiketnya->id}}" method="post" style="float: right"> 
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapusnya?');"><i class="fas fa-trash-alt"></i></button>
                  </form> --}}
                </td>
              </tr>
          @endforeach
          
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  {{-- <div class="card-footer clearfix">
      {{$tiket->links()}}
  </div> --}}
</div>
<!-- /.card -->

@endsection