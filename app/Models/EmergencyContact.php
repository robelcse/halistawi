<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $primaryKey = 'emergency_id';
    use HasFactory;


    public function device()
    {

        return $this->hasOne(Device::class,'device_id','device_id');
    }
}
