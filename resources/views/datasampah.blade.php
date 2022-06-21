@extends('layout.admin')

@section('content')
    

    {{-- <div class="container">
        <h1 class="mt-2 text-center">Daftar Sampah</h1>

        <a href="/tambahsampah" type="button" class="btn btn-success btn-sm mb-2">Tambah sampah</a> --}}

        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Sampah</h1>
            
            <div class="mb-2">
              <a href="/tambahsampah" class="btn d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i class="fa fa-plus fa-sm text-white-10"></i> Tambah Data Sampah</a>
               </div>
        
            </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Sampah</th>
                <th scope="col" class="jenissampah">Jenis Sampah</th>
                <th scope="col" class="harsampah">Harga/1kg</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $sampah => $item)
              <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->nama_sampah }}</td>
                <td class="jenissampah">{{ $item->jenis_sampah }}</td>
                <td class="harsampah">{{ $item->harga_sampah }}</td>
                <td>
                   
                    <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm text-white-10"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times fa-sm text-white-10"></i> Hapus</button>

                </td>
              </tr>

              @endforeach

            </tbody>
          </table>
     





      </div>
    
   
   
   
   
   
   
   
   
   
      @endsection