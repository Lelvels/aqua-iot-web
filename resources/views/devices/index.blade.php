@extends("layouts.myapp")
@section("title", "Devices")
@section("custom-head")
@endsection
@section("content")
    {{-- @php dd($devices) @endphp --}}
    <h2>Devices Management</h2>
    <h4>My Devices</h4>
    <br>
    <a style="margin-right: 10px" href="{{ route('devices.create') }}"><button class="btn btn-outline-primary">Create new device</button></a>
    <br><br>
    <div class="col-xs-4 text-center">
        <table id="mytable" class="table table-striped">
            <caption>List of devices</caption>
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Device Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody id="table_data">
                @if(count((array) $devices))
                    @foreach ($devices as $device)
                        <tr>
                            <th scope="row">{{ $device->id }}</th>
                            <th><a style="text-decoration: none" href="{{ route('devices.show', $device->id) }}"> {{ $device['name'] }} </a></th>
                            <th>{{ $device['description'] }}</th>
                            <th>
                                <div class="d-inline p-1 text-white">
                                    <a href="{{ route('sensordatas.show', $device->id) }}" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-success btn-sm pd-2">View Data</button>
                                    </a>
                                </div>
                                <div class="d-inline p-1 text-white">
                                    <a href="{{ route('devices.edit', ['device' => $device->id]) }}" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-primary btn-sm pd-2">Edit Device</button>
                                    </a>
                                </div>
                                <div class="d-inline p-1 text-white">
                                    <button onclick="document.getElementById('destroy-device-id-{{ $device->id }}').submit();" type="button" class="btn btn-outline-danger btn-sm">Delete Device</button>
                                </div>
                                <div class="d-inline p-1 text-white">
                                    <button onclick="document.getElementById('destroy-data-id-{{ $device->id }}').submit();" type="button" class="btn btn-outline-danger btn-sm">Delete Data</button>
                                </div>
                                <form id="destroy-device-id-{{ $device->id }}" action="{{ route('devices.destroy', $device->id )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <form id="destroy-data-id-{{ $device->id }}" action="{{ route('sensordatas.destroy', $device->id )}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </th>
                        </tr>
                    @endforeach
                @else
                    <p>You have no devices right now! Try to create a new one!</p>
                @endif 
            </tbody>
        </table>
    </div>
   
@endsection
