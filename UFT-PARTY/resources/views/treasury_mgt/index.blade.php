@extends('treasury_mgt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
          @include('layouts.message')
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Fund Details</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('treasury-management.create') }}">Register new fund </a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('treasury-management.search') }}">
         {{ csrf_field() }}
         <table class="table table-bordered table-stripped">
          <tr>
           <b>Monthly fund totals:</b><td>Amount received per month</td>
          </tr>
         </table>
         <a class="btn btn-primary" href="{{ route('treasury-management.create') }}">Distribute </a>
       </form>
      <br />
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Fund Source</th>
                <th>Amount</th>
                <th>Date Received</th>
            </tr>
            @foreach ($funds as $fund)
                <tr>
                  <td>{{ $fund['fund_source']}}</td>
                  <td>{{ $fund['amount']}}</td>
                  <td>{{ $fund['reg_date']}}</td>
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