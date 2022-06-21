
@extends('layout.admin')

@section('content')



<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Nasabah</h1>
    
    <div class="mb-2">
      <a href="/tambahnasabah" class="btn d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2"><i class="fa fa-plus fa-sm text-white-10"></i> Tambah Data</a>
      <a href="/exportpdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-10"></i> Download Data</a>
    </div>

    </div>


{{-- <h1 class="mt-4 mb-4 text-center">Data Nasabah</h1> --}}




<div class="row g-3 align-items-center mt-2">
<div class="col-auto">
  {{-- <form action="/nasabah" method="GET">
  <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline">
  <button type="submit" class="btn btn-primary">Search</button>
</form> --}}
{{-- <form class="d-flex" role="search" action="/nasabah" method="GET">
  <input class="form-control me-2" name="search" type="search" placeholder="Cari Nasabah" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Cari</button>
</form> --}}
</div>

{{-- <div class="col-auto">
<a href="/exportpdf" class="btn btn-info btn-sm mb-1">Export PDF</a>
</div> --}}





</div>

{{-- @if ($message = Session::get('succes'))

<div class="alert alert-success" role="alert">
{{ $message }}
</div>

@endif --}}

<table class="table">
  <thead>
    <tr>
      <th scope="col" class="no">No</th>
      <th scope="col" class="nama">Nama</th>
      <th scope="col" class="poto">KTP</th>
      <th scope="col" class="jeniskelamin">Jenis Kelamin</th>
      <th scope="col" class="notelpon">No. Induk Nasabah</th>
      <th scope="col" class="join">Bergabung Sejak</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
   {{-- no berurutan --}}
   @php
     $no = 1;   
    @endphp
      @foreach ($data as $index => $item)

      <tr>
          <th class="no" scope="row">{{ $index + $data->firstItem() }}</th>
          <td class="nama">{{ $item->nama }}</td>
          <td class="poto">
            {{-- uplod foto --}}
            <img src="{{ asset('potonasabah/'.$item->foto) }}" style="width: 40px;" alt="">

          </td>
          <td class="jeniskelamin">{{ $item->jeniskelamin }}</td>
          <td class="notelpon">0{{ $item->notelpon }}</td>
          <td class="join">{{ $item->created_at }}</td> 
          {{-- ->diffForHumans() --}}
          <td>
              
              <a href="/tampildata/{{ $item->id }}" class="btn btn-warning btn-sm"><i class="fa fa-edit fa-sm text-white-10"></i> Edit</a>
              <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"><i class="fa fa-times fa-sm text-white-10"></i> Hapus</button>
          
          </td>
        </tr>
          
      @endforeach
   
   
  </tbody>
</table>
{{ $data->links() }}

</div>




@endsection


{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Nasabah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    
 




    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>

  <script>

    $('.delete').click( function(){

      var nasabahid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');


      swal({
        title: "Yakin?",
        text: "Kamu akan hapus data nasabah bernama "+nama+" ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/delete/"+nasabahid+""
            swal("Data Nasabah berhasil dihapus!", {
              icon: "success",
            });
          } 
          else {
            swal("Data tidak jadi dihapus!");
          }
      });

    });
      

  </script>

  <script>

    @if (Session::has('succes'))
    toastr.success("{{ Session::get('succes') }}")
    @endif
    
  </script>
</html> --}}