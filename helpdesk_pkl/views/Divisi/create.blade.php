
@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-users"></i> Divisi</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

<div class="container-sm">
<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Tambah Divisi</h3>
    </div>
    <form action="/divisi" method="post">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Masukkan Nama Divisi" id="namadivisi" name="namadivisi">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
        <a href="/divisi" class="btn btn-secondary"> Kembali </a>
      </div>
    </form>
  </div>
</div>  
@endsection