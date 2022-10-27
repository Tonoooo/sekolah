@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 class="m-0"><i class="fas fa-ticket-alt"></i> Edit Data Tiket</h5>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <hr>
    </div><!-- /.container-fluid -->
</div>

<div class="container-sm">
    <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Edit Tiket</h3>
        </div>
        <form action="/tiket/{{$tiket->id}}" method="post">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <h5>NPK:</h5>
                    <h6 class="form-control" >{{$tiket->npk}}</h6>
                    <h5>Nama:</h5>
                    <h6 class="form-control" >{{$tiket->name}}</h6>
                    <h5>Divisi:</h5>
                    <h6 class="form-control" >{{$tiket->nama_divisi}}</h6>
                </div>
                <div class="col">
                    <h5>Departemen:</h5>
                    <h6 class="form-control" >{{$tiket->nama_departemen}}</h6>
                    <h5>Kategori:</h5>
                    <h6 class="form-control" >{{$tiket->nama_kategori}}</h6>
                    <h5>Deskripsi:</h5>
                    <textarea class="form-control" >{{$tiket->deskripsi}}</textarea>
                </div>
            </div>
            <div class="form-group">
                @if (auth()->user()->level=="admin")
                    <label for="prioritas">Prioritas:</label>
                    <select name="prioritas" id="prioritas" class="form-control">
                        <option value="{{$tiket->prioritas}}">
                            @if ($tiket->prioritas=="0")
                                NORMAL
                            @else
                                PRIORITAS
                            @endif
                        </option>
                        <option value="0">NORMAL</option>
                        <option value="1">PRIORITAS</option>
                    </select>
                @endif
                
                @if (auth()->user()->level=="pic")
                    <label for="keterangan">Keterangan:</label><br> 
                    <textarea name="keterangan" id="keterangan" rows="3" class="form-control" placeholder="Masukkan Keterangan..">{{$tiket->keterangan}}</textarea><br>
                    <label for="tgl_mulai">Tanggal Mulai:</label>
                    <input type="date" class="form-control" name="tgl_mulai" value="{{$tiket->tgl_mulai}}">
                    <label for="tgl_selesai">Tanggal Selesai:</label>
                    <input type="date" class="form-control" name="tgl_selesai" value="{{$tiket->tgl_selesai}}">
                @endif
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" style="float: right">Edit</button>
            <a href="/tiket" class="btn btn-secondary"> Kembali </a>
          </div>
        </form>
      </div>
    </div>

@endsection