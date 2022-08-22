<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reagen;
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

    
    public function dashboard()
    {
        return view('dashboard');
    }

    public function create()
    {
        return view('reagen.create');
    }

    public function insert(Request $request)
    {
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
    
    $delete = $data->delete();
    if ($delete) {
        return redirect('reagena')->with('status', 'Berhasil hapus reagen !');
    }
    return redirect('reagena')->with('status', 'Gagal hapus reagen !');
    }
}
