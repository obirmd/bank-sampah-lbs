<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sampah;

class SampahController extends Controller
{
    public function sampah(){

        $data = Sampah::all();
        return view('datasampah', compact('data'));
    }

      // tambah data
    public function tambahsampah() {
        return view('tambahsampah');
    }
  
    public function insertdatasampah(Request $request) {
         // dd($request->all());
      $data = Sampah::create($request->all());
      //   upload foto
        //   if($request->hasFile('foto')){
        //       $request->file('foto')->move('potonasabah/', $request->file('foto')->getClientOriginalName());
        //       $data->foto = $request->file('foto')->getClientOriginalName();
        //       $data->save();
        //   }
          return redirect()->route('sampah')->with('succes','Sampah Telah Berhasil di Tambahkan!');
      }

}
