<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'nama',
        'telepon',
        'email',
        'tanggal',
        'waktu',
        'jenis_janji',
        'catatan',
    ];
    
}