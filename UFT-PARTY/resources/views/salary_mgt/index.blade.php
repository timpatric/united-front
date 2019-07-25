@extends('salary_mgt.base')
@extends('salary_mgt.payments')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Salaries distributions per month</h3>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('salary-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Agent Head Name', 'Agent Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['head_name'] : '', isset($searchingVals) ? $searchingVals['agent_name'] : '']])
          @endcomponent
        @endcomponent
      </form>
      <br />
      <table class="table table-bordered table-stripped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Amount</th>
            </tr>
           
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
         
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