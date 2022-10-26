<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('devices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($deviceId)
    {
        $device_name = Device::where('id', $deviceId)->get('name')->first();
        $data_list = SensorData::where('device_id', $deviceId)->get(['id', 'data', 'created_at'])->toJson(JSON_PRETTY_PRINT);
        return view('sensordatas.index', 
            ['data_list'=>$data_list,
            'device_name'=>$device_name,
            'id'=>$deviceId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $deviceId
     * @return \Illuminate\Http\Response
     */
    public function destroy($deviceId)
    {
        $data_list = SensorData::where('device_id', $deviceId);
        if($data_list != null){
            $data_list->delete();
        }
        return redirect()->route('devices.index', $deviceId);
    }
}
