@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Edit Planter') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/planters/{{ $planter->id }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input value='{{ $planter->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group{{ $errors->has('PlanterType') ? ' has-error' : '' }} row">
                            <label for="PlanterType" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <input id="PlanterType" type="text" class="form-control" name="PlanterType" value='{{ $planter->PlanterType }}' required autofocus>

                                @if ($errors->has('PlanterType'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('PlanterType') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="imageFileName" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="imageFileName" type="file" class="form-control" name="imageFileName" value='{{ $planter->imageFileName }}'>

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
                                {{-- <input id="comment" type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" value="{{ old('comment') }}"> --}}
                                <textarea id='noteTextarea' name="comments" rows='4' cols='55' maxlength='1056'>{{ $planter->comments }}</textarea>
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
                                <a href='/planters/destroy/{{ $planter->id }}'>
                                    Delete Planter
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