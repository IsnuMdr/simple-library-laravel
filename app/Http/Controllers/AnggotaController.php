<?php
namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller {

    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */

    public function index() {
        return view('anggota.index', [
            'title' => 'Data Anggota',
            'anggota' => Anggota::latest()->get()
        ]);
    }
    /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */

    public function create() {
        return view('anggota.create', [
            'title' => 'Tambah Anggota',
        ]);
    }

    /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

    public function store(Request $request) {
        $validAnggota = $this->validate($request, [
            'nama_anggota' => 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
            'email' => 'required|email|unique:table_anggota,email',
            'no_telp' => 'required|unique:table_anggota,no_telp'
        ]);
        Anggota::create($validAnggota);
        return redirect('anggota')->with('msg', 'Data Berhasil di Simpan');
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
        $anggota = Anggota::findOrFail($id);
        $jk_option = [
            'Laki-laki', 'Perempuan'
        ];
        return view('anggota.edit', [
            'title' => 'Edit Anggota',
            'anggota' => $anggota,
            'jk_option' => $jk_option
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
            'nama_anggota' => 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('table_anggota', 'email')->ignore($id)
            ],
            'no_telp' => [
                'required',
                Rule::unique('table_anggota', 'no_telp')->ignore($id)
            ]
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->alamat = $request->alamat;
        $anggota->email = $request->email;
        $anggota->no_telp = $request->no_telp;
        $anggota->save();

        if($anggota){
            //redirect dengan pesan sukses
            return redirect('anggota')->with(['msg' => 'Data Berhasil Diedit!']);
        }else{
            //redirect dengan pesan error
            return redirect('anggota')->with(['msg' => 'Data Gagal Diedit!']);
        }
    }
    /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function destroy($id) {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        if($anggota){
            //redirect dengan pesan sukses
            return redirect()->back()->with(['msg' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->back()->with(['msg' => 'Data Gagal Dihapus!']);
        }
    }
}
