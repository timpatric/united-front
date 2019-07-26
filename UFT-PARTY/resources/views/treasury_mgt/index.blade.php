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
    </div><br>
        <div class="col-sm-4" style="float:right">
          <a class="btn btn-primary" href="{{ route('treasury-management.create') }}">Register new fund </a>
        </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
     <div class="col-md-4" style="margin-bottom: 30px">
      <h style="font-size:20px"><b>Monthly Totals</b></h1>
      <form method="get" action="{{ route('salary-management.index') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <input type="search" name="search" class="form-control" value="30000">
        </div>
        <span class="input-group-prepend">
          <button type="submit" class="btn btn-primary">Distribute
          </button>
        </span>
      </form>
    </div>
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