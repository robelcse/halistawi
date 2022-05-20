<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teststation extends Model
{
    use HasFactory;

    protected $primaryKey = 'teststation_id';

    protected $fillable = [

        'name',
        'type',
        'category',
        'unique_id',
        'location',
        'contact_name',
        'mobile_number',
        'email',
        'po_box',
        'city',
        'country',
        'sub_country',
        'gps_pin',
        'words',
    ];

    public function testdevices()
    {

       return $this->hasMany(Testdevice::class,'teststation_id','teststation_id');
    }
}
