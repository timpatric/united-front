@extends('agent_mgt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit agent info</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/edit/<?php echo $agents[0]->id; ?>" enctype="multipart/form-data">
                    <div class="form-group{{ $errors->has('agent_name') ? ' has-error' : '' }}">
                        <label for="agent_name" class="col-md-4 control-label">Agent Name</label>
                            <div class="col-md-6">
                                <input id="agent_name" type="text" class="form-control" name="agent_name" value="<?php echo$agents[0]->agent_name; ?>" required autofocus>

                                @if ($errors->has('agent_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agent_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select class="form-control js-states" name="gender">
                                  <option value="select">Select gender</option>
                                  <option value="<?php echo$agents[0]->agent_name; ?>">Male</option>
                                  <option value="<?php echo$agents[0]->gender; ?>">Female</option>
                                </select> 
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('district_name') ? ' has-error' : '' }}">
                        <label for="district_name" class="col-md-4 control-label">District</label>
                            <div class="col-md-6">
                                <input id="district_name" type="text" class="form-control" name="district_name" value="<?php echo$agents[0]->district_name; ?>" required>

                                @if ($errors->has('district_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('district_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div> 
                    <div class="form-group{{ $errors->has('agent_sign') ? ' has-error' : '' }}">
                        <label for="agent_sign" class="col-md-4 control-label">Agent sign</label>
                            <div class="col-md-6">
                                <input id="agent_sign" type="text" class="form-control" name="agent_sign" value="<?php echo$agents[0]->agent_sign; ?>" required>

                                @if ($errors->has('agent_sign'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('agent_sign') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        <label for="role" class="col-md-4 control-label">Role</label>
                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" value="<?php echo$agents[0]->role; ?>">

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Registration Date</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="<?php echo$agents[0]->reg_date; ?>" name="reg_date" class="form-control pull-right" id="regDate" required>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
