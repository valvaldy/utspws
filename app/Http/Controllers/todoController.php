<?php

namespace App\Http\Controllers;
use App\ModelTodo;
use App\ModelBuku;
use Illuminate\Http\Request;

class todoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
    $data = ModelTodo::all();
    return response($data);
  }

  public function show($idkat){
    $data = ModelTodo::where('id',$idkat)->get();
    return response ($data);
  }

  public function store(Request $request){ //buat post
    $data = new ModelTodo();
    $data->nmkat = $request->input('nmkat');
    //$data->alamat = $request->input('alamat');
    //$data->email = $request->input('email');
    //$data->jenjang = $request->input('jenjang');
    //$data->notelp = $request->input('notelp');
    $data->save();

    return response('Berhasil Tambah Data');
  }
  
  public function update(Request $request, $idkat){
    $data = ModelTodo::where('id',$idkat)->first();
    $data->nmkat = $request->input('nmkat');
    $data->save();

    return response('Berhasil Merubah Data');
  }

  public function destroy($idkat){
    $data = ModelTodo::where('id',$idkat)->first();
    $data->delete();

    return response('Berhasil Menghapus Data');
  }
  
  public function buku(){
    $data = ModelBuku::all();
    return response($data);
  }

  public function showbuku($idbuk){
    $data = ModelBuku::where('id',$idbuk)->get();
    return response ($data);
  }

  public function storebuku(Request $request){
    $data = new ModelBuku();
    $data->nmbuk = $request->input('nmbuk');
    $data->nmpengarang = $request->input('nmpengarang');
    $data->penerbit = $request->input('penerbit');
    $data->sinopsis = $request->input('sinopsis');
    //$data->alamat = $request->input('alamat');
    //$data->email = $request->input('email');
    //$data->jenjang = $request->input('jenjang');
    //$data->notelp = $request->input('notelp');
    $data->save();

    return response('Berhasil Tambah Data');
  }
  
  public function updatebuku(Request $request, $id){
    $data = ModelBuku::where('id',$id)->first();
    $data->nmbuk = $request->input('nmbuk');
    $data->nmpengarang = $request->input('nmpengarang');
    $data->penerbit = $request->input('penerbit');
    $data->sinopsis = $request->input('sinopsis');
    $data->save();

    return response('Berhasil Merubah Data');
  }

  public function destroybuku($idbuk){
    $data = ModelBuku::where('id',$idbuk)->first();
    $data->delete();

    return response('Berhasil Menghapus Data');
  }
}