<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menamplkan menu
        $data = menu::all();
        $kategori = kategori::all();

        return view('menu.tampil', compact('data', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // tambah menu
        $request->validate([
            'foto'=>'required|image|max:10000'
        ]);

        // lokasi untuk menyimpan foto
        $file = $request->file('foto')->store('public/menu/foto');

        menu::create([
            'nama'=>$request->nama,
            'foto'=>$file,
            'harga'=>$request->harga,
            'keterangan'=>$request->keterangan,
            'kategori_id'=>$request->kategori_id,
        ]);

        return redirect('menu');

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
        //
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
        // update menu
        $data = menu::findOrFail($id);

        $validator = $request->validate([
            'nama'=>'required',
            'harga'=>'required',
            'keterangan'=>'required',
            'kategori_id'=>'required',
        ]);

        $data->update($validator);

        // pengecekan jika foto diupdate atau tidak
        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('public/menu/foto');

            Storage::delete($data->foto);

            $data->update([
                'foto'=>$foto
            ]);
        } else {
            $data->update([
                'foto'=>$data->foto
            ]);

            return redirect('menu');
        }

        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // menghapus menu
        $data = menu::findOrFail($id);

        // pengecekan jika ada foto
        if($data->foto){
            Storage::delete($data->foto);
        }

        $data->delete();

        return redirect('menu');
    }
}
