@extends('layout.admin')

@section('content')

<div class="container">
        
  <h1 class="mt-4 mb-4 text-center">Edit Data Nasabah</h1>
 
  <div class="row justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-body">
          {{-- edit data --}}
          <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nama</label>
              <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('nama')
              <div class="alert alert-danger mt-1">{{ $message }}</div>
             @enderror
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
              <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                <option selected>{{ $data->jeniskelamin }}</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No. Induk Nasabah</label>
              <input type="number" name="notelpon" value="{{ $data->notelpon }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('notelpon')
              <div class="alert alert-danger mt-1">{{ $message }}</div>
          @enderror
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