@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Soil Type <br />
                    <a href='/soiltypes/create'>Add Soil Type</a>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                        <tr>
                            <td></td>
                            <td>Type</td>
                            <td>Comments</td>
                            <td></td>
                        </tr>
                        @foreach($soiltypes as $soiltype)
                            <tr>
                            <td>
                                    @if($soiltype['imageFileName'] == null || $soiltype['imageFileName'] == "")
                                        <img src="{{app('system')->imageFileName}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @else
                                        <img src="{{$soiltype['imageFileName']}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @endif    
                                </td>
                                <td>{{ $soiltype['soilType'] }}</td>
                                <td>{{ $soiltype['comments'] }}</td>
                                <td><a href='/soiltypes/edit/{{ $soiltype['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection