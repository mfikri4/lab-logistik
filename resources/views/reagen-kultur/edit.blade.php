@extends('app')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Edit Data Reagen Kultur</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-gray-800">Form Reagen Kultur</h6>
        
          </div>
        <div class="card-body">
            <div class="p-10">
                        @if(auth()->user()->level == 2)
                    <form method="post" class="user" action="{{ url('reagena-kultur/edit/' . $data->id_reagen) }}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="">Metode Analisis</label>
                            <input type="text" class="form-control"
                                name="metode_analisis" placeholder="Metode Analisis" value="{{ $data->metode_analisis }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Reagen</label>
                            <input type="text" class="form-control"
                                name="nama_reagen" placeholder="Nama Reagen" value="{{ $data->nama_reagen }}">
                        </div>

                        <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" class="form-control"
                                name="brand" placeholder="Brand" value="{{ $data->brand }}">
                        </div>
                        <div class="form-group">
                            <label for="">No Catalog</label>
                            <input type="text" class="form-control"
                                name="no_catalog" placeholder="No Catalog" value="{{ $data->no_catalog }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal ED</label>
                            <input type="date" class="form-control"
                                name="tanggal_ed" placeholder="Tanggal ED" value="{{ $data->tanggal_ed }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Penyimpanan</label>
                            <input type="text" class="form-control"
                                name="tempat_penyimpanan" placeholder="Tempat Penyimpanan" value="{{ $data->tempat_penyimpanan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control"
                                name="keterangan" placeholder="Keterangan" value="{{ $data->keterangan }}">
                        </div>
                        @elseif(auth()->user()->level == 3)
                        <form method="post" class="user" action="{{ url('reagenu-kultur/edit/' . $data->id_reagen) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Metode Analisis</label>
                            <input type="text" readonly class="form-control"
                                name="metode_analisis" placeholder="Metode Analisis" value="{{ $data->metode_analisis }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Reagen</label>
                            <input type="text" class="form-control"
                                name="nama_reagen" readonly placeholder="Nama Reagen" value="{{ $data->nama_reagen }}">
                        </div>

                        <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" class="form-control"
                                name="brand" readonly placeholder="Brand" value="{{ $data->brand }}">
                        </div>
                        <div class="form-group">
                            <label for="">No Catalog</label>
                            <input type="text" class="form-control"
                                name="no_catalog" readonly placeholder="No Catalog" value="{{ $data->no_catalog }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal ED</label>
                            <input type="date" class="form-control"
                                name="tanggal_ed" readonly placeholder="Tanggal ED" value="{{ $data->tanggal_ed }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat Penyimpanan</label>
                            <input type="text" class="form-control"
                                name="tempat_penyimpanan" readonly placeholder="Tempat Penyimpanan" value="{{ $data->tempat_penyimpanan }}">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" readonly class="form-control"
                                name="keterangan" placeholder="Keterangan" value="{{ $data->keterangan }}">
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="">Volume Stok</label>
                            <input type="text" class="form-control"
                                name="volume_stok" placeholder="Volume Stok" value="{{ $data->volume_stok }}">
                        </div>
                        <input type="hidden" name="name_user" id="name_user" value="{{Auth::user()->name_user}}"></th>

                        <button type="submit" class="btn btn-success btn-user btn-block" value="Edit Data">
                        Edit Data
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