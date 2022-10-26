<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\Models\Device;
use App\Models\SensorData;
use App\Ultilities\StringGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::where("user_id", Auth::id())->get();
        return view('devices.index', ['devices' => $devices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {
        $validated = $request->validated();
        $device = Device::make($validated);
        $device->user_id = Auth::id();
        $connectionString = "Hostname:http://aqua-iot.pro;device-name:".
            $device->name.";primary-key:".StringGenerator::str_rand();
        $device->connection_string = $connectionString;
        $device->save();
        $request->session()->flash('success', 'Your device was created!');
        return redirect()->route('devices.show', ['device' => $device->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::findOrFail($id);
        return view('devices.show', ['device'=>$device]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('devices.edit', ['device' => Device::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceRequest $request, $id)
    {
        $device = Device::findOrFail($id);
        $validated = $request->validated();
        $device->fill($validated);
        $device->save();
        $request->session()->flash('success', 'Your device was updated!');

        return redirect()->route('devices.show', ['device' => $device->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $sensorDatas = SensorData::where('device_id', $id)->delete();
        $device->delete();
        return redirect()->route('devices.index');
    }
}
