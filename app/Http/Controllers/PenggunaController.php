<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {

            $data = User::all();

            return Datatables::of($data)
            ->addColumn('is_active',function ($s){
                if ($s->is_active == true) {
                    $aktif = '<form action="'.route('pengguna.disable',$s->id).'" method="post">' . csrf_field() . '<button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-check"> </i> </button> </form> ';
                }else{
                    $aktif = '<form action="'.route('pengguna.active',$s->id).'" method="post">' . csrf_field() . '<button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-times"> </i> </button> </form> ';
                }
                return $aktif;
            })
            ->addColumn('aksi', function ($s) {
                return '<a href="'.route('pengguna.edit',$s->id).'" class="btn btn-warning btn-sm"><span class="fa fa-edit" style="color:white"></span></a>
                <form id="data-' . $s->id . '" action="' . route('pengguna.destroy', $s->id) . '"   method="post">' . csrf_field() . ' ' . method_field('delete') . '</form> <button onclick="confirmDelete(' . $s->id . ' )" class="btn btn-danger btn-sm"> <i class="fa fa-trash"> </i> </button>';
            })
            ->rawColumns(['aksi','is_active'])
            ->addIndexColumn()
            ->toJson();
        }
        return view('pengguna.index');
    }

    public function active($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = true;
        $user->save();
        return back();
    }

    public function disabled($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();
        return back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->user()->id) {
            return back();
        }
        $user->delete();
        return back();
    }

}
