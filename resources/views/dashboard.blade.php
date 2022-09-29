@extends('app')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card shadow mb-2 text-gray-800">
                <h3 class="p-4"> Selamat datang, {{Auth::user()->name_user}}</h3>
            </div>


            <!-- DataTales Example -->
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-800">History</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>Nama Reagen</th>
                                    <th>No. Catalog</th>
                                    <th>Volume Stok</th>
                                    <th>Nama Pengguna</th>
                                    <th>Tindakan</th>
                                    <th>Hari</th>
                                    <th>Pukul</th>
                                </tr>
                            </thead>
                            @foreach ($data as $dt)
                            <tbody>

                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$dt->kategori}}</td>
                                    <td>{{$dt->nama_reagen}} - {{$dt->brand}}</td>
                                    <td>{{$dt->no_catalog}}</td>
                                    <td>{{$dt->volume_stock}}</td>
                                    <td>{{$dt->user}}</td>
                                    <td>{{$dt->aksi}}</td>
                                    <td>{{date("M d Y", strtotime($dt->created_at));}} </td>
                                    <td>{{date("H:i", strtotime($dt->created_at));}} </td>
                                    
                                </tr>
                                
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>


        </div>
@endsection
