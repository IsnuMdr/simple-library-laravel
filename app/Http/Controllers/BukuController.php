<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Rule;

class BukuController extends Controller
{
    public function index() {
        return view('buku.index', [
            'title' => 'Daftar Buku',
            'buku' => Buku::with(['category'])->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create() {
        $kategori=Kategori::all();
        return view('buku.create', [
            'title' => 'Tambah Buku',
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        $this->validate($request, [
            'judul_buku'=> 'required|unique:table_buku,judul_buku',
            'deskripsi'=> 'required',
            'id_kategori' => 'required',
            'cover_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $cover_img=$request->file('cover_img');
        $cover_img->storeAs('public/image', $cover_img->hashName());

        $buku=new Buku;
        $buku->judul_buku=$request->judul_buku;
        $buku->deskripsi=$request->deskripsi;
        $buku->id_kategori=$request->id_kategori;
        $buku->cover_img=$cover_img->hashName();
        $buku->save();

        if($buku){
            //redirect dengan pesan sukses
            return redirect('buku')->with(['msg' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect('buku')->with(['msg' => 'Data Gagal Ditambahkan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id) {
        $buku=Buku::where('id', $id)->first();
        return $buku;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {
        $buku = Buku::findOrFail($id);
        $kategori=Kategori::all();
        return view('buku.edit', [
            'title' => 'Edit Buku',
            'buku' => $buku,
            'kategori' => $kategori
        ]);
    }

    /***
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $buku = Buku::findOrFail($id);
        $this->validate($request, [
            'judul_buku'=> 'required',
            'deskripsi'=> 'required',
            'id_kategori' => 'required',
        ]);

        if($request->file('cover_img') == "") {
            $buku->update([
                'judul_buku'     => $request->judul_buku,
                'deskripsi'   => $request->deskripsi,
                'id_kategori'   => $request->id_kategori
            ]);
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/image/'.$buku->cover_img);

            //upload new image
            $cover_img = $request->file('cover_img');
            $cover_img->storeAs('public/image', $cover_img->hashName());

            $buku->update([
                'judul_buku'     => $request->judul_buku,
                'deskripsi'   => $request->deskripsi,
                'id_kategori'   => $request->id_kategori,
                'cover_img'     => $cover_img->hashName()
            ]);

        }

        if($buku){
            //redirect dengan pesan sukses
            return redirect('buku')->with(['msg' => 'Data Berhasil Diedit!']);
        }else{
            //redirect dengan pesan error
            return redirect('buku')->with(['msg' => 'Data Gagal Diedit!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        if($buku){
            //redirect dengan pesan sukses
            return redirect()->back()->with(['msg' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->back()->with(['msg' => 'Data Gagal Dihapus!']);
        }
    }
}
