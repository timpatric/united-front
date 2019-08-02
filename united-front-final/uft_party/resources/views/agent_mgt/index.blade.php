@extends('agent_mgt.base')
@section('action-content')
    <!-- Main content -->
<section class="content">
@include('layouts.message')
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title">List of party agents</h3>
        </div>
      </div>
    </div>
  <!-- /.box-header -->
   <div class="box-body">
    <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="{{ route('agent-management.index') }}">
        <div class="form-group">
          <input type="search" name="search" class="form-control" placeholder="Search agent details" required>
        </div>
        <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Search
          </button>
        </span>
      </form>
    </div>
            <div class="col-sm-4">
          <a style ="float: right"class="btn btn-primary" href="{{ route('agent-management.create') }}">Add new agent</a>
        </div>
      <br />
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Agent ID</th>
                <th>Agent Name</th>
                <th>District</th>
                <th>Gender</th> 
                <th>Agent Sign</th>
                <!--<th>Salary</th>-->
                <th>Role</th>
                <th id="regDate">Registration Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($agents as $agent)
                <tr>
                  <td>{{ $agent->agent_id }}</td>
                  <td>{{ $agent->agent_name }}</td>
                  <td>{{ $agent->district_name }}</td>
                  <td>{{ $agent->gender}}</td> 
                  <td>{{ $agent->agent_sign }}</td>
                  
                  <td>{{ $agent->role }}</td>
                  <td>{{ $agent->reg_date}}</td>
                  <td><a href = 'edit/{{ $agent->agent_id }}'>Edit</a></td>
                  <td><a href = 'destroy/{{ $agent->agent_id }}'>Delete</a></td>
                </tr>
            @endforeach
          </table>
      </div>
  </div>
</section>
@endsection