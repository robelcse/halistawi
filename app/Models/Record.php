<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected $primaryKey = 'record_id';
    use HasFactory;


    protected $fillable = [

        'patient_id',
        'doctor_id',
        'medicine',
        'notes'
    ];


    public function patient()
    {

        return $this->belongsTo(Patient::class, 'patient_id');
    }


}//
