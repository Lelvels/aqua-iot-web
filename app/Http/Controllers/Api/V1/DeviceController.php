<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Device;
use App\Http\Requests\V1\StoreDeviceRequest;
use App\Http\Requests\V1\UpdateDeviceRequest;
use Illuminate\Http\Request;
use App\Filters\V1\DeviceFilter;
use App\Http\Resources\V1\DeviceCollection;
use App\Http\Resources\V1\DeviceResource;
use App\Http\Controllers\Controller;
use App\Models\User;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new DeviceFilter();
        $filterItems = $filter->transform($request); //['column', 'operator', 'value']
        $includeSensorData = $request->query('includeSensorDatas');
        $device = Device::where($filterItems);
        if($includeSensorData){
            $device = $device->with('sensorData');
        }
        return new DeviceCollection($device->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {
        $userId = $request->input("userId");
        $user = User::findOrFail($userId);
        if($user != null || !empty($user)){
            $device = Device::create([
                "user_id" => $userId,
                "name" => $request->input("name"),
                "description" => $request->input("description"),
                "connection_string" => $request->input("connectionString")
            ]);
            return new DeviceResource($device);
        }
        return Response("Bad Request! No such user id", 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device, Request $request)
    {
        $includeSensorData = $request->query('includeSensorDatas');
        if($includeSensorData){
            return new DeviceResource($device->loadMissing('sensorDatas'));
        }
        return new DeviceResource($device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceRequest  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceRequest $request, Device $device)
    {
        $device->update($request->all());
        return new DeviceResource($device);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        if($device->delete()){
            return new DeviceResource($device);
        }
    }
}
