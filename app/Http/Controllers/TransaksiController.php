<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {


        return view('transaksi.index', [
            'title' => 'Data Transaksi',
            'transaksi' => Transaksi::with(['buku', 'anggota'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        $buku=Buku::all();
        $anggota=Anggota::all();
        return view('transaksi.pinjam', [
            'title' => 'Tambah Peminjaman',
            'buku' => $buku,
            'anggota' => $anggota,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        if(Anggota::where('id', $request->id_anggota)->count() > 0) {
            if(Buku::where('id', $request->id_buku)->count() > 0) {
                // return $request;
                $transaksi=new Transaksi;
                // $transaksi->type_transaksi = $request->type_transaksi;
                $transaksi->id_anggota=$request->id_anggota;
                $transaksi->id_buku=$request->id_buku;
                if($request->type_transaksi=='pinjam') {
                    $transaksi->tgl_pinjam=$request->tgl_pinjam;
                    $transaksi->tgl_kembali=null;
                    $transaksi->save();
                    return redirect('transaksi')->with('msg', 'Data Berhasil di Simpan');
                }
                else {
                    $transaksi->tgl_kembali=$request->tgl_kembali;
                }
                // return $transaksi;
            }
            else {
                return json_encode('Buku tidak ditemukan!');
            }
        }
        else {
            return json_encode('Anggota tidak ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi = Transaksi::with(['anggota', 'buku'])->where('id', $id)->first();
        return view('transaksi.kembali',[
            'title' => 'Pengembalian Buku',
            'transaksi' => $transaksi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        Transaksi::where('id', $id)->update(['tgl_kembali'=> $request->tgl_kembali]);
        return redirect('transaksi')->with('msg', 'Buku Telah dikembalikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {
        //
    }
}
