<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KelasController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $data = Kelas::all();

            return Datatables::of($data)
            ->addColumn('periode_id',function ($s){
                return $s->periode->nama;
            })
            ->addColumn('aksi', function ($s) {
                return '<a href="'.route('kelas.edit',$s->id).'" class="btn btn-warning btn-sm"><span class="fa fa-edit" style="color:white"></span></a>
                <form id="data-' . $s->id . '" action="' . route('kelas.destroy', $s->id) . '"   method="post">' . csrf_field() . ' ' . method_field('delete') . '</form> <button onclick="confirmDelete(' . $s->id . ' )" class="btn btn-danger btn-sm"> <i class="fa fa-trash"> </i> </button>';
            })
            ->rawColumns(['aksi','periode_id'])
            ->addIndexColumn()
            ->toJson();
        }
        return view('kelas.index');
    }

    public function destroy($id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return back();
    }
}
