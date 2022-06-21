@extends('layout.admin')

@section('content')

<div class="container">
        
  <h1 class="mt-4 mb-4 text-center">Tambah Data Nasabah</h1>
 
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          {{-- tambah data --}}
          <form action="/insertdata" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
             
              @error('nama')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                <option selected>Pilih Jenis Kelamin</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No. Induk Nasabah</label>
              <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
             
              @error('notelpon')
                  <div class="alert alert-danger mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Masukan Foto KTP</label>
              <input type="file" name="foto" class="form-control">
            </div>
           
            
            <a href="/nasabah" class="btn btn-warning">Kembali</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


</div>

@endsection