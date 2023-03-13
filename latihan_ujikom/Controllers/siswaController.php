<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class siswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlah_baris = 4;
        if (strlen($katakunci)) {
            $data = siswa::sortable()->where('nis','like',"%$katakunci%")
            ->orWhere('nama','like',"%$katakunci%")
            ->orWhere('jurusan','like',"%$katakunci%")
            ->orWhere('tempat_lahir','like',"%$katakunci%");
        }else{
            $data = siswa::sortable();
        }
        return view('siswa.index')->with('data',$data->paginate($jumlah_baris));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nis',$request->nis);
        Session::flash('nama',$request->nama);
        Session::flash('jurusan',$request->jurusan);
        Session::flash('tempat_lahir',$request->tempat_lahir);
        Session::flash('tanggal_lahir',$request->tanggal_lahir);
        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'image|file|max:2048',
        ]);
        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ];
        if ($request->foto) {
            $data['foto'] = $request->file('foto')->store('profile');
        }
        siswa::create($data);
        return redirect()->to('siswa')->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = siswa::where('nis',$id)->first();
        return view('siswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required',
            'jurusan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'image|file|max:2048',
        ]);
        $data = [
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'foto' => $request->fotolama,
        ];
        if ($request->file('foto')) {
            if ($request->fotolama) {
                Storage::delete($request->fotolama);
            }
            $data['foto'] = $request->file('foto')->store('profile');
        }
        siswa::where('nis',$id)->update($data);
        return redirect()->to('siswa')->with('success','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = siswa::where('nis',$id)->get();
        if ($data[0]->foto) {
            Storage::delete($data[0]->foto);
        }
        siswa::where('nis',$id)->delete();
        return redirect()->to('siswa')->with('success','Data berhasil dihapus');
    }
}
