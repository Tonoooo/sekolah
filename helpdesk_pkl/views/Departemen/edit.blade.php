@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-building"></i> Edit Data Departemen</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

<div class="container-sm">
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Edit Departemen</h3>
        </div>
        <form action="/departemen/{{$departemen->id}}" method="post">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <input type="text" class="form-control" id="namadepartemen" name="namadepartemen" 
                value="{{$departemen->nama_departemen}}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="float: right">Edit</button>
            <a href="/departemen" class="btn btn-secondary"> Kembali </a>
          </div>
        </form>
      </div>
    </div>  

@endsection