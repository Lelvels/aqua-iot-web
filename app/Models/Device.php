<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $fillable = [
        'name',
        'description',
        'connection_string',
        'user_id'
    ];
    public function sensorDatas(){
        return $this->hasMany(SensorData::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
