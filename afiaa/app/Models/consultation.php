<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consultatoin extends Model
{
    protected $table = 'consultatoins'; 

    protected $fillable = [ 
        'user_id',
        'specialty_id',
        'title',
        'result',
        'doctor_note',
        'patient_note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
