@extends('app')

@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Data Reagen Kultur</h1>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-800">Reagen Kultur</h6>
                        </div>

                        @if(auth()->user()->level == 2)
                        <div class="card-body">
                            <div class="my-2">
                                <a href="{{url('reagena-kultur/create')}}" class="btn btn-success btn-icon-split">  
                                    <span class="text">Tambah Data</span>
                                </a>     
                                <a href="{{url('exp_excel_kultur')}}" class="btn btn-primary btn-icon-split">  
                                    <span class="text">Export Data</span>
                                </a>
                                <form action="{{ url('import_kultur') }}" class="user"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group my-2">
                                        <div class="custom-file text-left">
                                            <input type="file" name="file" class="custom-file-input btn" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success ">Import Reagen</button>                   
       
                                </form>    
                            </div>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Metode Analisis</th>
                                            <th>Nama Reagen</th>
                                            <th>Brand</th>
                                            <th>No. Catalog</th>
                                            <th>Tanggal ED</th>
                                            <th>Tempat Penyimpanan</th>
                                            <th>Keterangan</th>
                                            <th>Volume Stok</th>
                                            @if(auth()->user()->level == 2)
                                            <th>Aksi</th>
                                            @elseif(auth()->user()->level == 3)
                                            <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    @foreach ($data as $dt)
                                    <tbody>

                                      <tr>
                                          <td>{{ ++$i }}</td>
                                          <td>{{$dt->metode_analisis}}</td>
                                          <td>{{$dt->nama_reagen}}</td>
                                          <td>{{$dt->brand}}</td>
                                          <td>{{$dt->no_catalog}}</td>
                                          <td>{{date("M d Y", strtotime($dt->tanggal_ed));}} </td>
                                          <td>{{$dt->tempat_penyimpanan}}</td>
                                          <td>{{$dt->keterangan}}</td>
                                          <td>{{$dt->volume_stok}}</td>
                                            @if(auth()->user()->level == 2)
                                            <td>
                                                <a href="{{ url('reagena-kultur/edit/'.$dt->id_reagen) }}" class="btn btn-primary mb-2">  
                                                    <i class="fa fa-edit"></i>
                                                    Edit    
                                                </a>
                                                <a href="{{ url('reagena-kultur/delete/'.$dt->id_reagen) }}" class="btn btn-danger mb-2">  
                                                    <i class="fa fa-times"></i>
                                                    Hapus
                                                </a>

                                            </td>
                                            @elseif(auth()->user()->level == 3)
                                            <td>
                                                <a href="{{ url('reagenu-kultur/edit/'.$dt->id_reagen) }}" class="btn btn-primary mb-2">  
                                                    <i class="fa fa-edit"></i>
                                                    Edit    
                                                </a>
                                            </td>
                                            @endif
                                      </tr>
                                       
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

@endsection