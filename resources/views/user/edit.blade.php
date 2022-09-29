@extends('app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Form Data Pengguna</h1>
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-gray-800">Form Data Pengguna</h6>
    </div>

    <div class="card-body">
      <div class="p-10">
        @if(auth()->user()->level == 1)
        <form method="post" class="user" action="{{ url('edit-manager/' . $data->id ) }}" enctype="multipart/form-data">
        @elseif(auth()->user()->level == 2)
        <form method="post" class="user" action="{{ url('user-data/edit/' . $data->id ) }}" enctype="multipart/form-data">
        @elseif(auth()->user()->level == 3)
        <form method="post" class="user" action="{{ url('edit-user/' . $data->id ) }}" enctype="multipart/form-data">
        @elseif(auth()->user()->level == 4)
        <form method="post" class="user" action="{{ url('edit-riset/' . $data->id ) }}" enctype="multipart/form-data">
        @elseif(auth()->user()->level == 5)
        <form method="post" class="user" action="{{ url('edit-kultur/' . $data->id ) }}" enctype="multipart/form-data">
        @endif
        @csrf    
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" class="form-control"
                    name="name_user" placeholder="Nama Lengkap" value="{{ $data->name_user }}">
            </div>
            <div class="form-group">
                <label for="">Alamat Email</label>
                <input type="email" class="form-control"
                    name="email" placeholder="Email" value="{{ $data->email }}">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control"
                    name="password" placeholder="Password" value="{{ $data->password }}">
            </div>
            <div class="form-group">
                <label for="">Konfirmasi Password</label>
                <input type="password" class="form-control"
                    name="password_confirmation" placeholder="Password"value="{{ $data->password }}">
            </div>
            @if(auth()->user()->level == 1)
            <div class="form-group">
                <label for="">Level Akses</label>
                <input type="text" class="form-control" readonly
                    name="level" value="{{ $data->level }}">
            </div>
            @elseif(auth()->user()->level == 2)
            <div class="form-group">
                <label for="">Level Akses</label>
                <select readonly name="level" class="select form-control form-control-md">     
                  <option value="{{ $data->level }}" >{{ $data->level }}</option>
                  <option value="1">Manager</option>
                  <option value="2">PJ Logistic</option>
                  <option value="3">User All Reagen</option>
                  <option value="4">User Reagen Riset</option>
                  <option value="5">User Reagen Kultur</option>
                <select>
            </div>
            @elseif(auth()->user()->level == 3)
            <div class="form-group">
                <label for="">Level Akses</label>
                <input type="text" class="form-control" readonly
                    name="level" value="{{ $data->level }}">
            </div>
            @elseif(auth()->user()->level == 4)
            <div class="form-group">
                <label for="">Level Akses</label>
                <input type="text" class="form-control" readonly
                    name="level" value="{{ $data->level }}">
            </div>
            @elseif(auth()->user()->level == 5)
            <div class="form-group">
                <label for="">Level Akses</label>
                <input type="text" class="form-control" readonly
                    name="level" value="{{ $data->level }}">
            </div>
            @endif
            <button type="submit" class="btn btn-success btn-user btn-block" value="Tambah Data">
            Edit Data
            </button>
            <a href="{{ url('user-data') }}" class="btn btn-secondary btn-user btn-block">
                Kembali
            </a>
                
        </form>
                  
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection