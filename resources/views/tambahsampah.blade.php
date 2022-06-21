@extends('layout.admin')

@section('content')

    <div class="container">

        <h1 class="text-center mt-2">Tambah Data Sampah</h1>

        <div class="row justify-content-center">
            <div class="col-8">
              <div class="card">
                <div class="card-body">

                    <form action="/insertdatasampah" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama Sampah</label>
                          <input type="text" name="nama_sampah" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
            
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Jenis Sampah</label>
                          <input type="text" name="jenis_sampah" class="form-control" id="exampleInputPassword1">
                        </div>
            
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Harga Sampah</label>
                          <input type="text" name="harga_sampah" class="form-control" id="exampleInputPassword1">
                        </div>
            
                        <a href="/sampah" type="submit" class="btn btn-warning">Kembali</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
          </div>
        </div>

       


        
    </div>

    

    @endsection