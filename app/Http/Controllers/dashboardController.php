<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.tampil');
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
        $nama = $request->nama;
        $pesanan = $request->pesanan;
        $status = $request->status;
        $jumlah = explode(",", $request->pesanan);
        $total = count($jumlah) * 50000;
        
        $class = new total($status, $total);

        $data = [
            'nama'=>$nama,
            'jumlah'=>count($jumlah). ' Pcs',
            'pesanan'=>$pesanan,
            'total'=>$total,
            'status'=>$status,
            'diskon'=>$class->diskon(),
            'bayar'=>floor($class->bayar())
        ];

        return view('dashboard.tampil', compact('data'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

interface hitung {
    public function diskon();
}

class diskon implements hitung {

    public function __construct($status, $total) {
        $this->status = $status;
        $this->total = $total;
    }

    public function diskon(){
        $status = $this->status;
        $total = $this->total;

        if ($status == 'MEMBER' && $total >= 100000) {
            return 20;
        } elseif ($status == 'MEMBER' && $total < 100000) {
            return 10;
        } else {
            return 0;
        }
    }

}

class total extends diskon {
    public function bayar(){
        $diskon = $this->diskon();
        $total = $this->total;

        $awal = $total * ($diskon / 100);

        return $total - $awal;
    }
}
