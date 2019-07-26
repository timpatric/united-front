@extends('agent_mgt.base')
@include('layouts.message')
@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new agent</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('agent-management.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-md-4 control-label">Agent Name</label>
                            <div class="col-md-6">
                                <input id="agent_name" type="text" class="form-control" name="agent_name" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                           <label class="col-md-4 control-label">Gender</label>
                            <div class="col-md-6">
                                <select class="form-control js-states" name="gender">
                                  <option value="select">Select gender</option>
                                  <option value="M">Male</option>
                                  <option value="F">Female</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">District</label>

                            <div class="col-md-6">
                                <input id="district_name" type="text" class="form-control" name="district_name" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Contact No</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control" name="contact" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Email Id</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Agent sign</label>

                            <div class="col-md-6">
                                <input id="agent_sign" type="text" class="form-control" name="agent_sign" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Registration Date</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="" name="reg_date" class="form-control pull-right" id="regDate" required>
                                </div>
                            </div>
                            <br/><br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                                <button type="submit" class="btn btn-danger">
                                     <a style="color:white"href="{{ route('agent-management.index') }}">Back</a>
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
