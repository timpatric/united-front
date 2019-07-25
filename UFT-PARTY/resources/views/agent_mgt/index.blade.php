@extends('agent_mgt.base')
@section('action-content')
    <!-- Main content -->
<section class="content">
@include('layouts.message')
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of party agents</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('agent-management.create') }}">Add new agent</a>
        </div>
      </div>
    </div>
  <!-- /.box-header -->
   <div class="box-body">
      <form method="POST" action="{{ route('agent-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Agent Name', 'District'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['agent_name'] : '', isset($searchingVals) ? $searchingVals['district_name'] : '']])
          @endcomponent
        @endcomponent
      </form>
      <br />
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Agent ID</th>
                <th>Agent Name</th>
                <th>Gender</th>
                <th>District</th>
                <th>Contact No</th>
                <th>Email Id</th>
                <th>Agent Sign</th>
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
                  <td>{{ $agent->contact}}</td>
                  <td>{{ $agent->email }}</td>
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