<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReagenKultur;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use App\Exports\ReagenKulturExport;
use App\Imports\ImportReagenKultur;
use Maatwebsite\Excel\Facades\Excel;

class ReagenKulturController extends Controller
{

    public function index(Request $request)
    {
        
        $pagination = 30;
        $data = ReagenKultur::get();
        return view('reagen-kultur.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function import(Request $request){
        Excel::import(new ImportReagenKultur, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function export_items()
	{
		return Excel::download(new ReagenKulturExport, 'barang.xlsx');
	}

    public function create()
    {
        return view('reagen-kultur.create');
    }

    public function insert(Request $request)
    {
       
        $request->validate(ReagenKultur::$rules);
        $requests = $request->all();
    
        History::create([
            'kategori'          => 'Reagen Kultur',
            'metode_analisis'   => $request['metode_analisis'],
            'nama_reagen'       => $request['nama_reagen'],
            'brand'             => $request['brand'],
            'no_catalog'        => $request['no_catalog'],
            'volume_stock'      => $request['volume_stok'],
            'user'              => $request['name_user'],
            'aksi'              => 'Add Reagen'
        ]);

        $cat = ReagenKultur::create($requests);
        if($cat){
            return redirect('reagena-kultur')->with('status', 'Berhasil menambah data!');
        }

        return redirect('reagena-kultur')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = ReagenKultur::find($id);
        return view('reagen-kultur.edit', compact('data'));
    }

    public function update_logistic(Request $request,$id)
    {
        $d = ReagenKultur::find($id);
        if ($d == null){
            return redirect('reagena-kultur')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        History::create([
            'kategori'          => 'Reagen Kultur',
            'metode_analisis'   => $request['metode_analisis'],
            'nama_reagen'       => $request['nama_reagen'],
            'brand'             => $request['brand'],
            'no_catalog'        => $request['no_catalog'],
            'volume_stock'      => $request['volume_stok'],
            'user'              => $request['name_user'],
            'aksi'              => 'Edit All Reagen'
        ]);

        
        $data = ReagenKultur::find($id)->update($req);
        if($data){
            return redirect('reagena-kultur')->with('status', 'Reagen Kultur Berhasil diedit !');
        }

        return redirect('reagena-kultur')->with('status', 'Gagal edit data reagen kultur!');
        
    }

    public function update_user(Request $request,$id)
    {
        History::create([
            'kategori'          => 'Reagen Kultur',
            'metode_analisis'   => $request['metode_analisis'],
            'nama_reagen'       => $request['nama_reagen'],
            'brand'             => $request['brand'],
            'no_catalog'        => $request['no_catalog'],
            'volume_stock'      => $request['volume_stok'],
            'user'              => $request['name_user'],
            'aksi'              => 'Edit Stok Reagen'
        ]);

        $d = ReagenKultur::find($id);
        if ($d == null){
            return redirect('reagenu-kultur')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        
        $data = ReagenKultur::find($id)->update($req);
        if($data){
            return redirect('reagenu-kultur')->with('status', 'Reagen Kultur Berhasil diedit !');
        }

        return redirect('reagenu-kultur')->with('status', 'Gagal edit data reagen kultur!');
        
    }

    public function delete($id)
    {
    $data = ReagenKultur::find($id);
    if ($data == null) {
        return redirect('reagena-kultur')->with('status', 'Data tidak ditemukan !');
    }
    
    History::create([
        'kategori'          => 'Reagen Kultur',
        'metode_analisis'   => $data['metode_analisis'],
        'nama_reagen'       => $data['nama_reagen'],
        'brand'             => $data['brand'],
        'no_catalog'        => $data['no_catalog'],
        'volume_stock'      => $data['volume_stok'],
        'user'              => Auth::user()->name_user ,
        'aksi'              => 'Hapus Reagen'
    ]);

    $delete = $data->delete();
    if ($delete) {
        return redirect('reagena-kultur')->with('status', 'Berhasil hapus reagen kultur!');
    }
    return redirect('reagena-kultur')->with('status', 'Gagal hapus reagen kultur!');
    }
}
