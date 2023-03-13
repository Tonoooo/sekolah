@extends('layouts.app')

@section('content')
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    {{-- @@@@ diurl masukkan ini --}}
                  <a href='{{url('/siswa/create')}}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            {{-- @@@@ tambah kolom --}}
                            <th class="col-md">No</th>
                            <th class="col-md">@sortablelink('NIS')</th>
                            <th class="col-md">Foto</th>
                            <th class="col-md">@sortablelink('Nama')</th>
                            <th class="col-md">@sortablelink('Jurusan')</th>
                            <th class="col-md">Tempat lahir</th>
                            <th class="col-md">Tanggal lahir</th>
                            <th class="col-md">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @@@@ php untuk kolom no --}}
                        @php
                            $i = 1;//$data->firstitem();
                        @endphp
                        {{-- @@@@ gunakan foreach --}}
                        @foreach ($data as $item)
                            {{-- @@@@ masukkan <tr> nya --}}
                            <tr>
                                <td>{{$i}}</td> {{-- @@ untuk nomer --}}
                                <td>{{$item->nis}}</td>
                                <td>
                                    {{-- @@@ untuk foto --}}
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/'.$item->foto)}}" alt="foto" width="50" height="50">
                                    @else
                                        Tidak ada
                                    @endif
                                </td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->jurusan}}</td>
                                <td>{{$item->tempat_lahir}}</td>
                                <td>{{$item->tanggal_lahir}}</td>
                                <td>
                                    {{-- @@@ tambahkan href --}}
                                    <a href='{{url('siswa/'.$item->nis.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                    {{-- @@@@ tambahkan form untuk delete --}}
                                    <form action="{{url('siswa/'.$item->nis)}}" class="d-inline" 
                                        onsubmit="return confirm('Yakin akan menghapus data?')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-sm btn-danger">Del</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- @@@@ php untuk tambah no --}}
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        
                    </tbody>
                </table>
               {{-- @@@@ tambhkan halaman --}}
               {{$data->links()}}
          </div>
          <!-- AKHIR DATA -->
@endsection