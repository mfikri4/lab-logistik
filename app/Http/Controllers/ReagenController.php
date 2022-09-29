<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reagen;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use App\Exports\ReagenExport;
use App\Imports\ImportReagen;
use Maatwebsite\Excel\Facades\Excel;

class ReagenController extends Controller
{
    //

    public function index(Request $request)
    {
        
        $pagination = 30;
        $data = Reagen::get();
        return view('reagen.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function import(Request $request){
        Excel::import(new ImportReagen, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function export_items()
	{
		return Excel::download(new ReagenExport, 'barang.xlsx');
	}

    
    public function dashboard(Request $request)
    {
        $pagination = 30;
        $data = History::orderBy('created_at','desc')->limit(10)->get();
        return view('dashboard', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        return view('reagen.create');
    }

    public function insert(Request $request)
    {

        History::create([
            'kategori'          => 'Reagen Riset',
            'metode_analisis'   => $request['metode_analisis'],
            'nama_reagen'       => $request['nama_reagen'],
            'brand'             => $request['brand'],
            'no_catalog'        => $request['no_catalog'],
            'volume_stock'      => $request['volume_stok'],
            'user'              => $request['name_user'],
            'aksi'              => 'Add Reagen'
        ]);


        $request->validate(Reagen::$rules);
        $requests = $request->all();
    
        $cat = Reagen::create($requests);
        if($cat){
            return redirect('reagena')->with('status', 'Berhasil menambah data!');
        }

        return redirect('reagena')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = Reagen::find($id);
        return view('reagen.edit', compact('data'));
    }

    public function update_logistic(Request $request,$id)
    {
        History::create([
            'kategori'          => 'Reagen Riset',
            'metode_analisis'   => $request['metode_analisis'],
            'nama_reagen'       => $request['nama_reagen'],
            'brand'             => $request['brand'],
            'no_catalog'        => $request['no_catalog'],
            'volume_stock'      => $request['volume_stok'],
            'user'              => $request['name_user'],
            'aksi'              => 'Edit All Reagen'
        ]);

        $d = Reagen::find($id);
        if ($d == null){
            return redirect('reagena')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        
        $data = Reagen::find($id)->update($req);
        if($data){
            return redirect('reagena')->with('status', 'Reagen Berhasil diedit !');
        }

        return redirect('reagena')->with('status', 'Gagal edit data reagen!');
        
    }

    public function update_user(Request $request,$id)
    {
        History::create([
            'kategori'          => 'Reagen Riset',
            'metode_analisis'   => $request['metode_analisis'],
            'nama_reagen'       => $request['nama_reagen'],
            'brand'             => $request['brand'],
            'no_catalog'        => $request['no_catalog'],
            'volume_stock'      => $request['volume_stok'],
            'user'              => $request['name_user'],
            'aksi'              => 'Edit Stok Reagen'
        ]);

        $d = Reagen::find($id);
        if ($d == null){
            return redirect('reagenu')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        
        $data = Reagen::find($id)->update($req);
        if($data){
            return redirect('reagenu')->with('status', 'Reagen Berhasil diedit !');
        }

        return redirect('reagenu')->with('status', 'Gagal edit data reagen!');
        
    }

    public function delete($id)
    {
    $data = Reagen::find($id);
    if ($data == null) {
        return redirect('reagena')->with('status', 'Data tidak ditemukan !');
    }

    History::create([
        'kategori'          => 'Reagen Riset',
        'metode_analisis'   => $data['metode_analisis'],
        'nama_reagen'       => $data['nama_reagen'],
        'brand'             => $data['brand'],
        'no_catalog'        => $data['no_catalog'],
        'volume_stock'      => $data['volume_stok'],
        'user'              => Auth::user()->name_user,
        'aksi'              => 'Hapus Reagen'
    ]);
    
    $delete = $data->delete();
    if ($delete) {
        return redirect('reagena')->with('status', 'Berhasil hapus reagen !');
    }
    return redirect('reagena')->with('status', 'Gagal hapus reagen !');
    }
}
