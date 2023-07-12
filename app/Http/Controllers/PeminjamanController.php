<?php

namespace App\Http\Controllers;

use App\Models\DetailPengguna;
use App\Models\Kamera;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Peminjaman::with('penyewa','barang_sewa');
        return view('peminjaman.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $us = User::all();
        $cus = DetailPengguna::all();
        $kam = Kamera::all();
        return view('peminjaman.create', compact('kam','cus','us'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pinjam'=>'required',
            'user_id'=>'required',
            'id_kamera'=>'required',
            'mulai_sewa'=>'required',
            'selesai_sewa'=>'required',
            'total_harga'=>'required',
            'bukti_bayar'=>'image|mimes:jpeg,png,jpg|max:2048',
            'status',

        ]);

        $image_file = $request->file('bukti_bayar');
        $image_ekstensi = $image_file->extension();
        $image_nama = date('ymdhis') .".". $image_ekstensi;
        $image_file->move(public_path('bukti_bayar'), $image_nama);

        $data = [
            'id_pinjam'=>$request->input('id_pinjam'),
            'detail_user_id'=>$request->input('nama'),
            'kamera_id'=>$request->input('nama_kamera'),
            'mulai_sewa'=>$request->input('mulai_sewa'),
            'selesai_sewa'=>$request->input('selesai_sewa'),
            'total_harga'=>$request->input('total_harga'),
            'bukti_bayar'=>$image_nama,
            'status'=>$request->input('Pending'),
        ];
        Peminjaman::create($data);
        return redirect('/peminjaman');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
