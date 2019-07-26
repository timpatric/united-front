@extends('agent_mgt.base')
@section('action-content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
               <div class="panel panel-default">
                <div class="panel-heading">Edit agent info</div>
                   <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('agent-management.update') }}" enctype="multipart/form-data">
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
                                </tr>
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                         </button>
                                    </div>
                                @endforeach
                           </table>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
