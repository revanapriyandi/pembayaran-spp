<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagihanController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $data = Spp::all();

            return Datatables::of($data)
            ->addColumn('periode_id',function ($s){
                return $s->perioded->nama;
            })
            ->addColumn('jumlah',function ($s){
                return 'Rp.'.$s->jumlah;
            })
            ->addColumn('aksi', function ($s) {
                return '<a href="'.route('tagihan.edit',$s->id).'" class="btn btn-warning btn-sm"><span class="fa fa-edit" style="color:white"></span></a>
                <form id="data-' . $s->id . '" action="' . route('tagihan.destroy', $s->id) . '"   method="post">' . csrf_field() . ' ' . method_field('delete') . '</form> <button onclick="confirmDelete(' . $s->id . ' )" class="btn btn-danger btn-sm"> <i class="fa fa-trash"> </i> </button>';
            })
            ->rawColumns(['aksi','periode_id','jumlah'])
            ->addIndexColumn()
            ->toJson();
        }
        return view('tagihan.index');
    }

    public function destroy($id)
    {
        $data = Spp::findOrFail($id);
        $data->delete();
        return back();
    }
}
