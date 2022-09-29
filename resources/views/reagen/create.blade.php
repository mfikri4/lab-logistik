@extends('app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Tambah Data Reagen Riset</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">Form Reagen Riset</h6>
        
          </div>
        <div class="card-body">
            <div class="p-10">
                    <form method="post" class="user" action="{{ url('reagena/create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Metode Analisis</label>
                            <input type="text" class="form-control"
                                name="metode_analisis" placeholder="Metode Analisis">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Reagen</label>
                            <input type="text" class="form-control"
                                name="nama_reagen" placeholder="Nama Reagen">
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" class="form-control"
                                name="brand" placeholder="Brand">
                        </div>

                        <div class="form-group">
                            <label for="">No Catalog</label>
                            <input type="text" class="form-control"
                                name="no_catalog" placeholder="No Catalog">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal ED</label>
                            <input type="date" class="form-control"
                                name="tanggal_ed" placeholder="Tanggal ED">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Penyimpanan</label>
                            <input type="text" class="form-control"
                                name="tempat_penyimpanan" placeholder="Tempat Penyimpanan">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control"
                                name="keterangan" placeholder="Keterangan">
                        </div>
                        <div class="form-group">
                            <label for="">Volume Stok</label>
                            <input type="text" class="form-control"
                                name="volume_stok" placeholder="Volume Stok">
                        </div>
                        <input type="hidden" name="name_user" id="name_user" value="{{Auth::user()->name_user}}"></th>

                        <button type="submit" class="btn btn-success btn-user btn-block" value="Tambah Data">
                        Tambah Data
                        </button>
                        <a href="{{ url('reagen') }}" class="btn btn-secondary btn-user btn-block">
                            Kembali
                        </a>
                            
                    </form>
                    
                </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection