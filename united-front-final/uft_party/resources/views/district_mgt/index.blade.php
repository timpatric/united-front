@extends('district_mgt.base')
@section('action-content')
    <!-- Main content -->
<section class="content">
      @include('layouts.message')
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of districts</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('district-management.create') }}">Add new district </a>
        </div>
      </div>
    </div>
  <!-- /.box-header -->
   <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
          <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="{{ route('district-management.index') }}">
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
                
            </tr>
                <tr>
                </tr>
         </table>

      <table class="table table-bordered table-stripped">
          <tr>
              <th>District Code</th>
              <th>District Name</th>
              <th>Members available</th>
              <th>Agents available</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
          @foreach ($districts as $district)
              <tr>
                  <td>{{ $district->district_code }}</td>
                  <td>{{ $district->district_name }}</td>
                  <td>{{ $district->member_total}}</td>
                  <td>{{ $district->agent_total }}</td>
                  <td><a href = 'edit/{{ $district->district_id }}'>Edit</a></td>
                  <td><a href = 'destroy/{{ $district->district_id }}'>Delete</a></td>
              </tr>
          @endforeach
        </table>
    </div>
  </div>
  <!-- /.box-body -->
</section>
@endsection