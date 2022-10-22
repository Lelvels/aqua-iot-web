<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $fillable = [
        'data',
        'device_id'
    ];
    public function device(){
        return $this->belongsTo(Device::class);
    }
}
