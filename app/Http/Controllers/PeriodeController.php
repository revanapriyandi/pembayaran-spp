<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PeriodeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $data = Periode::all();

            return Datatables::of($data)
            ->addColumn('is_active',function ($s){
                if ($s->is_active == true) {
                    $aktif = '<form action="'.route('periode.disable',$s->id).'" method="post">' . csrf_field() . '<button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-check"> </i> </button> </form> ';
                }else{
                    $aktif = '<form action="'.route('periode.active',$s->id).'" method="post">' . csrf_field() . '<button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-times"> </i> </button> </form> ';
                }
                return $aktif;
            })
            ->addColumn('aksi', function ($s) {
                return '<a href="'.route('periode.edit',$s->id).'" class="btn btn-warning btn-sm"><span class="fa fa-edit" style="color:white"></span></a>
                <form id="data-' . $s->id . '" action="' . route('periode.destroy', $s->id) . '"   method="post">' . csrf_field() . ' ' . method_field('delete') . '</form> <button onclick="confirmDelete(' . $s->id . ' )" class="btn btn-danger btn-sm"> <i class="fa fa-trash"> </i> </button>';
            })
            ->rawColumns(['aksi','is_active'])
            ->addIndexColumn()
            ->toJson();
        }
        return view('periode.index');
    }

    public function active($id)
    {
        $data = Periode::findOrFail($id);
        $data->is_active = true;
        $data->save();
        return back();
    }

    public function disabled($id)
    {
        $data = Periode::findOrFail($id);
        $data->is_active = false;
        $data->save();
        return back();
    }

    public function destroy($id)
    {
        $data = Periode::findOrFail($id);
        $data->delete();
        return back();
    }
}
