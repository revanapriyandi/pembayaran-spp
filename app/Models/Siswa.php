<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nisn';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siswa';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class,'spp_id') ?? '00000';
    }

}
