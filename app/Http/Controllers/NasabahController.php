<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDF;

class NasabahController extends Controller
{
    public function index(Request $request) {

        if($request->has('search')) {
            $data = Nasabah::where('nama', 'LIKE', '%' .$request->search. '%')->paginate(5);
        }
        
        else{
            $data = Nasabah::paginate(5);
        }
        return view('datanasabah', compact('data'));
    }

    public function tambahnasabah() {
        return view('tambahdatanasabah');
    }

    // tambah data
    public function insertdata(Request $request) {


        $validated = $request->validate([
            'nama' => 'required|min:3|max:25',
            'notelpon' => 'required|min:11|max:13',
        ]);

        // dd($request->all());
      $data = Nasabah::create($request->all());
    //   upload foto
        if($request->hasFile('foto')){
            $request->file('foto')->move('potonasabah/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('nasabah')->with('succes','Nasabah Telah Berhasil di Tambahkan!');
    }

    // edit data

    public function tampildata($id) {
        $data = Nasabah::find($id);

        return view('editdatanasabah', compact('data'));
    }
    

    public function updatedata(Request $request, $id){

        $validated = $request->validate([
            'nama' => 'required|min:3|max:25',
            'notelpon' => 'required|min:11|max:13',
        ]);
        
        $data = Nasabah::find($id);
        $data->update($request->all());
        return redirect()->route('nasabah')->with('succes','Nasabah Telah Berhasil di Update!');
    }


    // delete
    public function delete($id) {
        $data = Nasabah::find($id);
        $data->delete();
        return redirect()->route('nasabah')->with('succes','Nasabah Telah Berhasil di Hapus!');
    }

    // export pdf

    public function exportpdf() {
        $data = Nasabah::all();

        view()->share('data', $data);
        $pdf = 'PDF'::loadview('datanasabah-pdf');
        return $pdf->download('data.pdf');
    }
}
