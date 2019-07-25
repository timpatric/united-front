@extends('district_mgt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new district</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('district-management.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">District</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('district_code') ? ' has-error' : '' }}">
                            <label for="district_code" class="col-md-4 control-label">District Code</label>

                            <div class="col-md-6">
                                <input id="district_code" type="text" class="form-control" name="district_code" value="{{ old('district_code') }}" required>
                                @if ($errors->has('district_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                 </button>
                                 <button type="submit" class="btn btn-danger">
                                     <a style="color:white"href="{{ route('district-management.index') }}">Back</a>
                                </button>
                            </div>
                        </div>                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
