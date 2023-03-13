@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-user-circle"></i> Edit Data User Admin</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

<div class="container-sm">
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Edit User Admin</h3>
        </div>
        <form action="/useradmin/{{$user->id}}" method="post">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama" id="nama" name="nama" value="{{$user->name}}" required="required">
                <label for="npk">NPK</label>
                <input type="text" class="form-control" placeholder="Masukkan NPK" id="npk" name="npk" value="{{$user->npk}}" required="required">
                <label for="level">Pilih Level</label>
                    <select name="level" id="level" class="form-control" required="required">
                        <option value="{{$user->level}}">{{$user->level}}</option>
                        <option value="user">User</option>
                        <option value="admin">admin</option>
                        <option value="pic">pic</option>
                    </select>
                <label for="divisi">Pilih Divisi</label>
                    <select id='divisi' class="form-control" name="divisi" required="required">
                        <option value='{{$user->id_divisi}}'>{{$user->nama_divisi}}</option>
                        @foreach($divisi as $divisinya)
                            <option value='{{ $divisinya->id }}'>{{ $divisinya->nama_divisi }}</option>
                        @endforeach
                    </select>
                <label for="departemen">Pilih Departemen</label>
                    <select id='departemen' class="form-control" name="departemen" required="required">
                        <option value='{{$user->id_departemen}}'>{{$user->nama_departemen}}</option>
                        @foreach($departemen as $departemennya)
                            <option value='{{ $departemennya->id }}'>{{ $departemennya->nama_departemen }}</option>
                        @endforeach
                    </select>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="float: right">Edit</button>
            <a href="/useradmin" class="btn btn-secondary"> Kembali </a>
          </div>
        </form>
      </div>
    </div>  

@endsection