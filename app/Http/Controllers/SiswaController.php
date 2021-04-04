<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SiswaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $data = Siswa::all();

            return Datatables::of($data)
            ->addColumn('kelas_id',function ($s){
                return $s->kelas->nama;
            })
            ->addColumn('aksi', function ($s) {
                return '<a href="'.route('siswa.edit',$s->nisn).'" class="btn btn-warning btn-sm"><span class="fa fa-edit" style="color:white"></span></a>
                <form id="data-' . $s->nisn . '" action="' . route('siswa.destroy', $s->nisn) . '"   method="post">' . csrf_field() . ' ' . method_field('delete') . '</form> <button onclick="confirmDelete(' . $s->nisn . ' )" class="btn btn-danger btn-sm"> <i class="fa fa-trash"> </i> </button>';
            })
            ->rawColumns(['aksi','kelas_id','spp_id'])
            ->addIndexColumn()
            ->toJson();
        }
        return view('siswa.index');
    }

    public function destroy($id)
    {
        $data = Siswa::findOrFail($id);
        $data->delete();
        return back();
    }
}
