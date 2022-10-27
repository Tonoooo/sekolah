@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-exclamation-triangle"></i> Tiket Prioritas</h5>
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
          <th>NPK</th>
          <th>Nama</th>
          <th>Departemen</th>
          <th>Divisi</th>
          <th>Kategori</th>
          <th>Status</th>
          <th style="width: 100px">Opsi</th>
        </tr>
      </thead>
      <tbody>
        
          @foreach ($tiket as $tiketnya)
              <tr>
                <td>{{$tiketnya->created_at}}</td>
                <td>{{$tiketnya->npk}}</td>
                <td>{{$tiketnya->name}}</td>
                <td>{{$tiketnya->nama_departemen}}</td>
                <td>{{$tiketnya->nama_divisi}}</td>
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
                <td>
                  <a href="/tiket/{{$tiketnya->id}}/edit"  class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                  <form action="/tiket/{{$tiketnya->id}}" method="post" style="float: right"> 
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapusnya?');"><i class="fas fa-trash-alt"></i></button>
                  </form>
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