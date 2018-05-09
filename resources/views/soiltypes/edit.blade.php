@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Edit Soil Type') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/soiltypes/{{ $soiltype->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $soiltype->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group{{ $errors->has('soilType') ? ' has-error' : '' }} row">
                            <label for="soilType" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <input id="soilType" type="text" class="form-control" name="soilType" value='{{ $soiltype->soilType }}' required autofocus>

                                @if ($errors->has('soilType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('soilType') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="imageFileName" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="imageFileName" type="file" class="form-control" name="imageFileName" value='{{ $soiltype->imageFileName }}'>

                                @if ($errors->has('imageFileName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imageFileName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('Comments') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ $soiltypes('comment') }}"> --}}
                                <textarea id='noteTextarea' name="comments" rows='4' cols='55' maxlength='1056'>{{ $soiltype->comments }}</textarea>
                                @if ($errors->has('comments'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href='/soiltypes/destroy/{{ $soiltype->id }}'>
                                    Delete Soil Type
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection