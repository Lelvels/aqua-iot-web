<?php

namespace App\Http\Services;
use App\Models\Device;
use App\Filters\V1\DeviceFilter;
use App\Http\Resources\V1\DeviceCollection;
use App\Http\Resources\V1\DeviceResource;
use App\Models\User;

class DeviceServices extends Services {
    public function findDevicesByUserId($userId){
        $devices = Device::where('user_id', '=', $userId);
        if(!empty($devices)){
            return new DeviceCollection($devices);
        }
        return null;
    }
}