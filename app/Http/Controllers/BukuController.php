<?php

namespace App\Http\Controllers;

use App\Http\Models\Buku;
use App\Http\Transformers\CategoryTransformer;
use Mockery\Exception;

class BukuController extends Controller
{
    use Helpers;

    public function index(){

        $a = Category::all();

        return $this->response->collection($a,new CategoryTransformer);
    }

    public function show($id){

        try{
            $a = Category::find($id);
        }catch(Exception $e){
            return $e;
        }

        if($a){
            return $this->response->item($a,new CategoryTransformer);
        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }
    }

    public function store(Request $request){

        #filtering cuma 1 value yg masuk
        $data = $request->only([
            'namakategori',
        ]);

        #bikin object untuk nampung data utk disave ke kategori
        $a = new Category([
            'name' => $data['namakategori']
        ]);

        #validasi


        #insert ke db
        try{
            $a->save();
        }catch (Exception $e){
            $this->response->error($e,500);
        }

        #kirim response bahwa berhasil diinsert, status code 200
        $this->response->created();
    }

    public function update($id,Request $request){
        try{
            $a = Category::find($id);
        }catch(Exception $e){
            $this->response->error($e,500);
        }

        if($a){
            $data = $request->only([
                'namakategori'
            ]);

            $a->fill([
                'name' => $data['namakategori'],
            ]);

            try{
                $a->save();
            }catch (Exception $e){
                $this->response->error($e,500);
            }

            $this->response->error('',200);

        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }
    }

    public function destroy($id){

        try{
            $a = Category::find($id);
        }catch(Exception $e){
            $this->response->error($e,500);
        }

        if($a){

            try{
                $a->delete();
            }catch (Exception $e){
                $this->response->error($e,500);
            }

            $this->response->noContent();

        }else{
            $this->response->errorNotFound('data tidak ditemukan');
        }
    }

}