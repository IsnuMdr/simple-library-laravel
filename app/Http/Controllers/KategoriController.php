<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class KategoriController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $kategori=Kategori::all();
        return view('kategori/index', ['title' => 'Kategori Buku', 'kategori' => $kategori]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('kategori.create',['title' => 'Tambah Kategori Buku']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request,[
            'nama_kategori' => 'required|unique:table_kategori,nama_kategori'
        ]);
        Kategori::create($request->all());
        return redirect('kategori')->with('msg', 'Data Berhasil di Simpan');
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
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', [
            'title' => 'Edit Kategori Buku',
            'kategori' => $kategori
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
        $this->validate($request,[
            'nama_kategori' => [
                'required',
                Rule::unique('table_kategori', 'nama_kategori')->ignore($id)
            ]
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        if($kategori){
            //redirect dengan pesan sukses
            return redirect('kategori')->with(['msg' => 'Data Berhasil Diedit!']);
        }else{
            //redirect dengan pesan error
            return redirect('kategori')->with(['msg' => 'Data Gagal Diedit!']);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        if($kategori){
            //redirect dengan pesan sukses
            return redirect()->back()->with(['msg' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->back()->with(['msg' => 'Data Gagal Dihapus!']);
        }
    }
}
