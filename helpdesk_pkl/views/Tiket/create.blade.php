
@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <i class="fas fa-ticket-alt"></i> New Ticket</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="container-sm">
<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-bug"></i> Masalah</h3>
    </div>
    <div class="card-body">
        <form action="/tiket" method="post">
            @csrf
        <div class="card-body">
            <div class="row">
              <div class="col">
                <h5>NPK:&nbsp;</h5>
                <h5 class="form-control">{{$user->npk}}</h5>
                <h5>Nama:&nbsp;</h5>
                <h5 class="form-control">{{$user->name}}</h5>
              </div>
              <div class="col">
                <h5>Divisi:&nbsp;</h5>
                <h5 class="form-control">{{$user->nama_divisi}}</h5>
                <h5>Departemen:&nbsp;</h5>
                <h5 class="form-control">{{$user->nama_departemen}}</h5>
              </div>
            </div>
            <div class="form-group">
             <label for="kategori">Pilih Kategori</label>
             <select id='kategori' class="form-control" name="kategori" required="required">
                  <option value=''>-- Pilih Kategori --</option>
                  @foreach($kategori as $kategorinya)
                    <option value='{{ $kategorinya->id }}'>{{ $kategorinya->nama_kategori }}</option>
                  @endforeach
              </select>

              <label for="deskripsi">Deskripsi Masalah</label><br>
              <textarea class="form-control" name="deskripsi" id="deskripsi" rows="8" required="required"></textarea>
              <input type="hidden" value="{{$user->id}}" name="id">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
    </div>
  </div>
</div>  
@endsection