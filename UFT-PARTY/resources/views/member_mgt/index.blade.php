@extends('member_mgt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      @include('layouts.message')
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of party members</h3>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="{{ route('member-management.index') }}">
        <div class="form-group">
          <input type="search" name="search" class="form-control" required>
        </div>
        <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Search
          </button>
        </span>
      </form>
    </div>
      <br />
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Gender</th>
                <th>District</th>
                <th>Agent Name</th>
                <th>Agent Sign</th>
                <th>Recommender Name</th>
                <th id="regDate">Enrollment Date</th>
                <th>Delete</th>
            </tr>
            @foreach ($members as $member)
                <tr>
                  <td>{{ $member->member_id }}</td>
                  <td>{{ $member->member_name}}</td>
                  <td>{{ $member->gender}}</td>
                  <td>{{ $member->district_name}}</td>
                  <td>{{ $member->agent_name}}</td>
                  <td>{{ $member->agent_sign}}</td>
                  <td>{{ $member->rec_name}}</td>
                  <td>{{ $member->reg_date}}</td>
                  <td><a href = 'delete/{{ $member->id }}'>Delete</a></td>
                </tr>
            @endforeach
          </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection