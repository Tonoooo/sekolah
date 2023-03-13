@extends('layouts.app')

@section('content')
{{-- @@@@ tambahkan action + nis dan enctype --}}
    <form action="{{url('siswa/'.$data->nis)}}" method='post' enctype="multipart/form-data">
        {{-- @@@@tambahkan @csrf --}}
        @csrf
        {{-- @@@@ tambahkan method put --}}
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    {{-- @@@@ tambahkan value  --}}
                    <input type="number" class="form-control" name='nis' id="nis" value="{{$data->nis}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama" value="{{$data->nama}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' id="jurusan" value="{{$data->jurusan}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='tempat_lahir' id="tempat_lahir" value="{{$data->tempat_lahir}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal_lahir' id="tanggal_lahir" value="{{$data->tanggal_lahir}}">
                </div>
            </div>
            {{-- @@@@ tambahkan untuk foto lamanya --}}
            <div class="mb-3 row">
                <label for="fotolama" class="col-sm-2 col-form-label">Foto sebelumnya</label>
                {{-- @@@@ tambahkan ifnya --}}
                @if ($data->foto)
                    <img src="{{asset('storage/'.$data->foto)}}" alt="foto" style="width: 100px; !importen">
                @else
                    *Anda belum memasukkan foto
                @endif
                {{-- tambahkan input type hidden untuk mengirimkan fotolama ke controller --}}
                <input type="hidden" name="fotolama" value="{{$data->foto}}">
            </div>
            {{-- @@@@ tambahkan input untuk foto barunta --}}
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Masukkan foto baru</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name='foto' id="foto">
                </div>
            </div>
            <div class="mb-3 row">
                {{-- @@@@ tambahkan tombol kembali --}}
                <a href="{{url('/siswa')}}" class="col btn btn-secondary">Kembali</a>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit" style="float: right">SIMPAN</button></div>
            </div>
        </form>
        </div>
        <!-- AKHIR FORM -->
@endsection
