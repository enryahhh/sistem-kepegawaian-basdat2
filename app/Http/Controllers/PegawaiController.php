<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Bagian;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = \DB::table('pegawai')->join('bagian','pegawai.id_bagian','=','bagian.id_bagian')
        ->join('jabatan','pegawai.id_jabatan','=','jabatan.id_jabatan')
        ->select('pegawai.*','jabatan.nama_jabatan','bagian.nama_bagian')->get();
        // dd($pegawai);
        return view("admin.pegawai.index",['pegawai'=>$pegawai]);
    }

    public function generateKode(){
        $kode_pegawai = Pegawai::pluck('kode_pegawai')->last();
        if($kode_pegawai == null){
            $new_kode = "PG-001";
        }else{
            $new_kode = explode("-",$kode_pegawai)[1];
            $new_kode += 1;
            if($new_kode <=100){
                $new_kode = sprintf("PG-%03d", $new_kode);
            }else{
                $new_kode="PG-".$new_kode;
            }
        }
        return $new_kode;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = $this->generateKode();
        $bagian = Bagian::all();
        $jabatan = Jabatan::all();
        return view("admin.pegawai.form",compact('bagian','jabatan','kode'));
    }

    public function uploadImage($filenya){
        $file = $filenya;
        $nama_file = time()."_".$file->getClientOriginalName();
      
		$file->move("img",$nama_file);
        return $nama_file;
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
        $messages = [
            'required' => ' :attribute barang tidak boleh kosong.',
        ];
        
        // $validator = Validator::make($input, $rules, $messages);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'gaji' => 'required',
            'no_telp' => 'required',
            'status' => 'required',
            'bagian' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
        ],$messages);

        
        $nama_file = $this->uploadImage($request->file('foto'));
        Pegawai::create([
            "kode_pegawai" => $request->kode,
            "nama" => $request->nama,
            "jenis_kelamin" =>  $request->jk,
            "agama" =>  $request->agama,
            "alamat"=> $request->alamat,
            "tgl_lahir"=>$request->tgl_lahir,
            "gaji"=>$request->gaji,
            "no_telp"=>$request->no_telp,
            "photo" => $nama_file,
            'status' => $request->status,
            'id_bagian' => $request->bagian,
            'id_jabatan' => $request->jabatan,
        ]);

        return redirect()->route("pegawai.create")->with('pesan','Berhasil Menambahkan Data Pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $bagian = Bagian::all();
        $jabatan = Jabatan::all();
        return view("admin.pegawai.update",['pegawai'=>$pegawai,'bagian'=>$bagian,'jabatan'=>$jabatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $messages = [
            'required' => ' :attribute barang tidak boleh kosong.',
        ];
        // dd($request->all());
        
        // $validator = Validator::make($input, $rules, $messages);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tgl_lahir' => 'required',
            'gaji' => 'required',
            'no_telp' => 'required',
            'status' => 'required',
            'bagian' => 'required',
            'jabatan' => 'required',
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:1024',
        ],$messages);
        $nama_file =$pegawai->photo;
        if($request->file('foto') != null){
            $nama_file = $this->uploadImage($request->file('foto'));
        }

            $pegawai->kode_pegawai = $request->kode;
            $pegawai->nama=  $request->nama;
            $pegawai->jenis_kelamin=   $request->jk;
            $pegawai->agama=   $request->agama;
            $pegawai->alamat=  $request->alamat;
            $pegawai->tgl_lahir= $request->tgl_lahir;
            $pegawai->gaji= $request->gaji;
            $pegawai->no_telp= $request->no_telp;
            $pegawai->photo=  $nama_file;
            $pegawai->status=  $request->status;
            $pegawai->id_bagian=  $request->bagian;
            $pegawai->id_jabatan=  $request->jabatan;
            $pegawai->save();
            return redirect()->route('pegawai.index')->with('pesan','Berhasil Mengubah Data Pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::where('kode_pegawai',$pegawai->kode_pegawai)->delete();
        return redirect()->route('pegawai.index')
                        ->with('pesan','Data Berhasil Di Hapus');
    }
}
