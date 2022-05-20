<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ppbagent;
use App\Models\Individual;
use App\Models\Company;
use App\Models\EmergencyContact;
use App\Models\Deviceoperation;

class Device extends Model
{
    protected $primaryKey = 'device_id';
    use HasFactory;

   

    public function Ppbagent()
    {

        return $this->hasOne(Ppbagent::class, 'device_id');
    }

    public function Individual()
    {

        return $this->hasOne(Individual::class, 'device_id');
    }

    public function Company()
    {

        return $this->hasOne(Company::class, 'device_id');
    }
    public function Emergencycontact()
    {

        return $this->hasOne(EmergencyContact::class, 'device_id');
    }

    public function deviceoperations()
    {
        return $this->hasOne(Deviceoperation::class, 'device_id');
    }
}
