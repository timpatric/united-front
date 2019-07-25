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
      <form method="POST" action="{{ route('district-management.search') }}">
         {{ csrf_field() }}
        @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['District Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['district_name']: '']])
          @endcomponent
        @endcomponent
      </form>
      <br />
         <table class="table table-bordered table-stripped">
            <tr>
                <th>District Code</th>
                <th>District Name</th>
                <th>Number of members</th>
            </tr>
            @foreach ($districts as $district)
                <tr>
                  <td>{{ $district['district_code']}}</td>
                  <td>{{ $district['name']}}</td>
            @foreach
            @foreach ($members as $member)
                  <td>{{ $member['member_name']}}</td>
                </tr>
            @endforeach
         </table>
    </div>
  </div>
  <!-- /.box-body -->
</section>
@endsection