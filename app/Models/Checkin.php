<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;


    protected $primaryKey = 'checkin_id';

    protected $fillable = [

            'doctor_id',
            'checked_in_time'
    ];

    public function patient()
    {

        return $this->belongsTo(Patient::class, 'national_id','national_id');
    }

    public function dependent()
    {

        return $this->belongsTo(Dependent::class, 'dependent_id','dependent_id');
    }


}//
