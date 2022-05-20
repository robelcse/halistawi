<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testdevice extends Model
{

    protected $primaryKey = 'testdevice_id';
    use HasFactory;

    public function teststation()
    {

         return $this->belongsTo(Teststation::class, 'teststation_id','teststation_id');
    }

    public function tststation()
    {

         return $this->belongsTo(Tstation::class, 'teststation_id','teststation_id');
    }
}
