<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\SensorData;
use App\Http\Requests\V1\StoreSensorDataRequest;
use App\Http\Requests\V1\UpdateSensorDataRequest;
use App\Http\Controllers\Controller;
use App\Filters\V1\SensorDataFilter;
use App\Http\Resources\V1\SensorDataCollection;
use App\Http\Resources\V1\SensorDataResource;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SensorDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new SensorDataFilter();
        $queryItems = $filter->transform($request); //['column', 'operator', 'value']
        if(count($queryItems) == 0){
            return new SensorDataCollection(SensorData::paginate());
        } else {
            $sensorDatas = SensorData::where($queryItems)->paginate();
            return new SensorDataCollection($sensorDatas->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSensorDataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSensorDataRequest $request)
    {
        $deviceId = $request->input("deviceId");
        $device = Device::findOrFail($deviceId);
        if($device != null || !empty($device) ){
            $sensorData = SensorData::create([
                'device_id' => $deviceId,
                'data' => $request->input("data")
            ]);
            return new SensorDataResource($sensorData);
        }
        return Response("Bad Request! No such device id", 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensorData = SensorData::findOrFail($id);
        return new SensorDataResource($sensorData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function edit(SensorData $sensorData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSensorDataRequest  $request
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSensorDataRequest $request, SensorData $sensorData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SensorData  $sensorData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensorData = SensorData::findOrFail($id);
        if($sensorData != null){
            $sensorData->delete();
            return new Response("Delete!", 200);
        } else {
            return new Response("Cannot find data", 404);
        }
    }
}
