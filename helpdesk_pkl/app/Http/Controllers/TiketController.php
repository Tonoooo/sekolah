<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tiket;
use Illuminate\Support\Facades\DB;
use Auth;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = DB::table('tiket')
                    ->join('users','tiket.id_users', '=', 'users.id')
                    ->join('departemen','users.id_departemen', '=', 'departemen.id')
                    ->join('divisi', 'users.id_divisi', '=', 'divisi.id')
                    ->join('kategori', 'tiket.id_kategori', '=', 'kategori.id')
                    ->select('tiket.*','users.npk','users.name','divisi.nama_divisi','departemen.nama_departemen','kategori.nama_kategori')
                    // ->where('tiket.status','<',2)
                    ->orderBy('tiket.id', 'desc')
                    ->get();
        // dd($tiket);
        return view('Tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $user = DB::table('users')
                    ->join('divisi','users.id_divisi', '=', 'divisi.id')
                    ->join('departemen','users.id_departemen', '=', 'departemen.id')
                    ->select('users.id','users.name','users.npk','divisi.nama_divisi','departemen.nama_departemen')
                    ->where('users.id', '=', $user_id)
                    ->first();
        $kategori = DB::table('kategori')->get();
        // dd($user);
        return view('Tiket.create', compact('user','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $id_user = Auth::user()->id;
        // dd($request->all());

        tiket::create([
            'id_users' => $request->id,
            'id_kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'status' => 0,
            'prioritas' => 0
        ]);
        
        return redirect('/tiket/create')->with('success','Berhasil dibuat!');
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

    public function prioritas()
    {
        $tiket = DB::table('tiket')
                    ->join('users','tiket.id_users', '=', 'users.id')
                    ->join('departemen','users.id_departemen', '=', 'departemen.id')
                    ->join('divisi', 'users.id_divisi', '=', 'divisi.id')
                    ->join('kategori', 'tiket.id_kategori', '=', 'kategori.id')
                    ->select('tiket.*','users.npk','users.name','divisi.nama_divisi','departemen.nama_departemen','kategori.nama_kategori')
                    ->where('tiket.prioritas','>','0')
                    ->orderBy('tiket.status', 'asc')
                    ->get();

        // dd($tiket);
        return view('Tiket.prioritas', compact('tiket'));
    }

    public function myticket()
    {
        $user_id = Auth::user()->id;
        $tiket = DB::table('tiket')
                    ->join('users','tiket.id_users', '=', 'users.id')
                    ->join('departemen','users.id_departemen', '=', 'departemen.id')
                    ->join('divisi', 'users.id_divisi', '=', 'divisi.id')
                    ->join('kategori', 'tiket.id_kategori', '=', 'kategori.id')
                    ->select('tiket.*','users.npk','users.name','divisi.nama_divisi','departemen.nama_departemen','kategori.nama_kategori')
                    ->where('tiket.id_users','=',$user_id)
                    ->orderBy('tiket.id', 'desc')
                    ->get();
        // dd($tiket);
        return view('Tiket.myticket', compact('tiket'));
    }

    public function detail($id)
    {
        $tiket = DB::table('tiket')
                ->join('users','tiket.id_users','=','users.id')
                ->join('divisi','users.id_divisi','=','divisi.id')
                ->join('departemen','users.id_departemen','=','departemen.id')
                ->join('kategori','tiket.id_kategori','=','kategori.id')
                ->select('tiket.*','users.name','users.npk','divisi.nama_divisi','departemen.nama_departemen','kategori.nama_kategori')
                ->where('tiket.id','=',$id)
                ->first();
        // dd($tiket);
        return view('Tiket.detail', compact('tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiket = DB::table('tiket')
                ->join('users','tiket.id_users','=','users.id')
                ->join('divisi','users.id_divisi','=','divisi.id')
                ->join('departemen','users.id_departemen','=','departemen.id')
                ->join('kategori','tiket.id_kategori','=','kategori.id')
                ->select('tiket.*','users.name','users.npk','divisi.nama_divisi','departemen.nama_departemen','kategori.nama_kategori')
                ->where('tiket.id','=',$id)
                ->first();
        // dd($tiket);
        return view('Tiket.edit', compact('tiket'));
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
        if($request->tgl_mulai != null && $request->tgl_selesai != null){
            $status = '2'; // finish
            $oleh = Auth::user()->name;
        } elseif($request->tgl_mulai != null){
            $status = '1'; // on progress
            $oleh = Auth::user()->name;
        } else{
            $status = '0'; // entry
        }

        if (Auth::user()->level == "admin") {
            tiket::find($id)->update([
                'prioritas' => $request->prioritas
            ]);
        }
        if (Auth::user()->level == "pic") {
            tiket::find($id)->update([
                'status' => $status,
                'keterangan' => $request->keterangan,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
                'oleh' => $oleh
            ]);
        }
        return redirect('/tiket');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = tiket::find($id)->delete();
        return redirect('/tiket');
    }

    public function laporan()
    {
        return view('Tiket.laporan');
    }
}
