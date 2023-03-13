
@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-user-circle"></i> User Admin</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

<div class="container-sm">
<div class="card card-secondary">
    <div class="card-header">
      <h3 class="card-title">Tambah User Admin</h3>
    </div>
    <form action="/useradmin" method="post">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama" required="required">
            <label for="npk">NPK</label>
            <input type="text" class="form-control" placeholder="Masukkan NPK" id="npk" name="npk" required="required">
            <label for="level">Pilih Level</label>
                <select name="level" id="level" class="form-control" required="required">
                    <option value="">-- Pilih Level --</option>
                    <option value="user">User</option>
                    <option value="admin">admin</option>
                    <option value="pic">pic</option>
                </select>
            <label for="divisi">Pilih Divisi</label>
                <select id='divisi' class="form-control" name="divisi" required="required">
                    <option value=''>-- Pilih Divisi --</option>
                    @foreach($divisi as $divisinya)
                        <option value='{{ $divisinya->id }}'>{{ $divisinya->nama_divisi }}</option>
                    @endforeach
                </select>
            <label for="departemen">Pilih Departemen</label>
                <select id='departemen' class="form-control" name="departemen" required="required">
                    <option value=''>-- Pilih Departemen --</option>
                    @foreach($departemen as $departemennya)
                        <option value='{{ $departemennya->id }}'>{{ $departemennya->nama_departemen }}</option>
                    @endforeach
                </select>
            <label for="password">Password</label>
          <input type="password" class="form-control" placeholder="Masukkan Password" id="password" name="password">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" style="float: right">Submit</button>

        <a href="/useradmin" class="btn btn-secondary"> Kembali </a>
      </div>
    </form>
  </div>
</div>  
@endsection