<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;
    protected $primaryKey = 'dependent_id';
    protected $fillable = [

        'name',
        'date_of_birth',
        'gender',
        'national_id',
        'mobile_number',
        'email',
        'photo'
    ];

    public function checkin()
    {

        return $this->hasOne(Checkin::class, 'checkin_id');
    }

    //each dependent belongs to a patient 
    // public function patient()
    // {

    //     return $this->belongsTo(Patient::class, 'national_id');
    // }
}
