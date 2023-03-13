<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;

class UseradminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')
                ->join('divisi', 'users.id_divisi', '=', 'divisi.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id')
                ->select('users.*', 'divisi.nama_divisi', 'departemen.nama_departemen')
                ->get();
        // dd($user);
        return view('Useradmin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisi = DB::table('divisi')->get();
        $departemen = DB::table('departemen')->get();
        return view('Useradmin.create', compact('divisi', 'departemen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->nama,
            'level' => $request->level,
            'npk' => $request->npk,
            'id_divisi' => $request->divisi,
            'id_departemen' => $request->departemen,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60)
        ]);

        return redirect('/useradmin');
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
        // $user = User::find($id);
        $divisi = DB::table('divisi')->get();
        $departemen = DB::table('departemen')->get();
        $user = DB::table('users')
                ->join('divisi', 'users.id_divisi', '=', 'divisi.id')
                ->join('departemen', 'users.id_departemen', '=', 'departemen.id')
                ->select('users.*', 'divisi.nama_divisi', 'departemen.nama_departemen')
                ->where('users.id', '=', $id)
                ->first();
        // dd($user->id);
        return view('Useradmin.edit', compact('user', 'divisi', 'departemen'));
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
        User::find($id)->update([
            'name' => $request->nama,
            'npk' => $request->npk,
            'level' => $request->level,
            'id_divisi' => $request->divisi,
            'id_departemen' => $request->departemen
        ]);

        return redirect('/useradmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/useradmin');
    }
}
