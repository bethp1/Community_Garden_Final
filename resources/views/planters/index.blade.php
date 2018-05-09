@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Planter <br />
                    <a href='/planters/create'>Add Planter</a>
                </div>

                <div class="card-body">
                    <table class="table" border='1'>
                        <tr>
                            <td></td>
                            <td>Type</td>
                            <td>Comments</td>
                            <td></td>
                        </tr>
                        @foreach($planters as $planter)
                            <tr>
                                <td>
                                    @if($planter['imageFileName'] == null || $planter['imageFileName'] == "")
                                        <img src="{{app('system')->imageFileName}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @else
                                        <img src="{{$planter['imageFileName']}}" style="width: 35px; height: 35px" class="rounded imgPopup">
                                    @endif    
                                </td>
                                <td>{{ $planter['PlanterType'] }}</td>
                                <td>{{ $planter['comments'] }}</td>
                                <td><a href='/planters/edit/{{ $planter['id'] }}'>Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection