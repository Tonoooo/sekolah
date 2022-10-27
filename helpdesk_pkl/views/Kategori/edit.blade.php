@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="far fa-list-alt"></i> Edit Data Kategori</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

<div class="container-sm">
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Edit Kategori</h3>
        </div>
        <form action="/kategori/{{$kategori->id}}" method="post">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control" id="namakategori" name="namakategori" 
                value="{{$kategori->nama_kategori}}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="float: right">Edit</button>
            <a href="/kategori" class="btn btn-secondary"> Kembali </a>
          </div>
        </form>
      </div>
    </div>

@endsection