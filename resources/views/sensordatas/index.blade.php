@extends("layouts.myapp")
@section('title')
Sensor Data
@endsection
@section('custom-head')
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <script>
        window.onload = function() {
            var dataPoints = [];
            var data_list = {!! $data_list !!}
            if(data_list.length > 0){
                var id = {!! $id !!}
                var lasted_id = data_list[data_list.length-1]['id'];
                for(let i=0; i<data_list.length; i++){
                    const data = JSON.parse(data_list[i]['data']);
                    const date = new Date(data_list[i]['created_at']);
                    dataPoints.push({
                        x: new Date(date),
                        y: data['humidity']
                    });
                }

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    zoomEnabled: true,
                    title: {
                        text: "Data Graph"
                    },
                    axisY: {
                        title: "Humidity from ESP",
                        titleFontSize: 24,
                        prefix: "%"
                    },
                    data: [{
                        type: "line",
                        yValueFormatString: "#,##%",
                        dataPoints: dataPoints
                    }]
                });

                chart.render();

                setInterval(updateDataList, 5000);
                function updateDataList() {
                    var url = "http://localhost/iothub/api/v1/sensordatas/" + id +"?latest=true";
                    $.getJSON(url, function( data ) {
                        console.log('Last id: ' + lasted_id);
                        console.log(data);
                        if(data.id > lasted_id){
                            console.log("Updating data!");
                            const json_data = JSON.parse(data.data);
                            const date = new Date(data.createdAt);
                            console.log('data: ' + json_data['humidity'] + ' ,date: ' + date);
                            dataPoints.push({
                                x: new Date(date),
                                y: json_data['humidity']
                            });
                            lasted_id = data.id;
                            chart.render();
                        } else {
                            console.log("Data is the same!");
                        }
                    });
                }
            } else {
                document.getElementById("chartContainer").innerHtml+= "<p>No data</p>";
            }
           
        }
    </script>
@endsection
@section("content")
    <h2>Sensor Data</h2>
    <h4>Your device: {{ $device_name->name }}</h4>
    <form class="form-inline">
        <div class="form-group mb-2">
            <label for="sd-select-data">Choose devices:</label>
            <select class="form-control" id="sd-select-device">
                <option>Not working yet</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label for="sd-select-data">Choose data:</label>
            <select class="form-control" id="sd-select-device">
                <option>Not working yet</option>
            </select>
        </div>
        <br>
        <a href="{{ route('sensordatas.show', $id) }}" style="text-decoration: none">
            <button type="button" class="btn btn-success pd-2">Refresh</button>
        </a>
        @include('devices.partials.btn_backtohome')
        {{-- <div class="d-inline p-1 text-white">
            <button onclick="document.getElementById('destroy-data-id-{{ $id }}').submit();" type="button" class="btn btn-danger">Delete Data</button>
        </div>
        <form id="destroy-data-id-{{ $id }}" action="{{ route('sensordatas.destroy', $id )}}" method="POST">
            @csrf
            @method('DELETE')
        </form> --}}
    </form>
    <br></br>
    <div class="container text-center">
        <div id="chartContainer" style="height: 300px; width: 80%;"></div>
    </div>

@endsection