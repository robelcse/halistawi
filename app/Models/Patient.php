<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'patient_id';

    protected $fillable = [

        'name',
        'date_of_birth',
        'gender',
        'national_id',
        'mobile_number',
        'email',
        'photo',
        'dependent_id'
    ];

    public function checkin()
    {

        return $this->hasOne(Checkin::class, 'checkin_id');
    }

    public function records()
    {
        return $this->hasMany(Record::class, 'patient_id','patient_id');
    }

    //one patient have multiple dependents (one-to-many)
    public function dependents()
    {
         return $this->hasMany(Dependent::class, 'national_id','national_id');
    }
}
