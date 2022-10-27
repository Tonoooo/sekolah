@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-users"></i> Edit Data Divisi</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

<div class="container-sm">
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Edit Divisi</h3>
        </div>
        <form action="/divisi/{{$divisi->id}}" method="post">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control" id="namadivisi" name="namadivisi" 
                value="{{$divisi->nama_divisi}}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="float: right">Edit</button>
            <a href="/divisi" class="btn btn-secondary"> Kembali </a>
          </div>
        </form>
      </div>
    </div>  

@endsection