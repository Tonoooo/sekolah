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
<!-- /.content-header -->

<div><a href="useradmin/create" class="btn btn-sm btn-primary">Tambah User Admin</a></div><br>
{{-- isi content --}}
<div class="card">
  <div class="card-header">

    <h3 class="card-title">Data User Admin</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th width="1%">No.</th>
          <th>Nama</th>
          <th>NPK</th>
          <th>Divisi</th>
          <th>Departemen</th>
          <th>Level</th>
          <th style="width: 100px">Opsi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($user as $index => $usernya)
              <tr>
                <td>{{ $index +1 }}</td>
                <td>{{$usernya->name}}</td>
                <td>{{$usernya->npk}}</td>
                <td>{{$usernya->nama_divisi}}</td>
                <td>{{$usernya->nama_departemen}}</td>
                <td>{{$usernya->level}}</td>
                <td>
                  <a href="/useradmin/{{$usernya->id}}/edit"  class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                  <form action="/useradmin/{{$usernya->id}}" method="post" style="float: right"> 
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
      {{$user->links()}}
  </div> --}}
</div>
<!-- /.card -->

@endsection