@extends('treasury_mgt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register new fund</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('treasury-management.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Fund Source</label>

                            <div class="col-md-6">
                                <input id="fund_source" type="text" class="form-control" name="fund_source" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount" value="" required>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Received on</label>
                            <div class="col-md-6">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="" name="reg_date" class="form-control pull-right" id="regDate" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                 </button>
                                 <button type="submit" class="btn btn-danger">
                                     <a style="color:white"href="{{ route('treasury-management.index') }}">Back</a>
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
