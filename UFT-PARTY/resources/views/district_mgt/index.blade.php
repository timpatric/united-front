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
                <th>District Code</th>
                <th>District Name</th>
                <th>Total number of members</th>
                
            </tr>
                <tr>
                  <td>3</td>
                  <td>33</td>
                  <td>3</td>
                </tr>
         </table>
    </div>
  </div>
  <!-- /.box-body -->
</section>
@endsection