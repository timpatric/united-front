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

       <div class="col-md-3" style="margin-bottom: 30px">
          <form method="get" action="members/search">
            <div class="form-group">
              <input type="search" name="search" class="form-control" required>
            </div>
            <span class="input-group-prepend">
               <button type="submit" class="btn btn-primary">Search
               </button>
            </span>
          </form>
        </div>
        <div class="col-md-3" style="margin-bottom: 30px">
          <form method="get" action="{{ route('agent-management.index') }}">
                {{ csrf_field() }}
          <table class="table table-bordered table-stripped">
              <tr>
                <th style="font-size: 20px;color:green">Pending Upgrades</th>      
              </tr>
              <tr>
                <td>{{$member_upgrade}}</td>
              </tr>
         </table>
              <span class="input-group-prepend">
                  <button type="submit" class="btn btn-primary">Upgrade
                  </button>
              </span>
          </form>
        </div>

      <br />
      @if(isset($members))
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Member ID</th>
                <th>Member Name</th>
                <th>Gender</th>  
                <th>Recommender Name</th>
                <th id="regDate">Enrollment Date</th>
            </tr>
            @foreach ($members as $member)
                <tr>
                  <td>{{ $member->member_id }}</td>
                  <td>{{ $member->member_name}}</td>
                  <td>{{ $member->gender}}</td>  
                  <td>{{ $member->rec_name}}</td>
                  <td>{{ $member->reg_date}}</td>
                </tr>
            @endforeach
          </table>
           @elseif(isset($message))
          <p style="color:red">{{$message}}</p>
          @endif
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection