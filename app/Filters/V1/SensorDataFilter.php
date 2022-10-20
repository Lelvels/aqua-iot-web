<?php
namespace App\Filters\V1;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class SensorDataFilter extends ApiFilter
{
    protected $safeParams = [
        'deviceId' => ['eq']
    ];

    protected $columnMap = [
        'deviceId' => 'device_id' //field -> 'database_field'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];
}