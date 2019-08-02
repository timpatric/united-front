@extends('salary_mgt.base')
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
    <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="salaries/search">
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
      @if(isset($salaries))
      <table class="table table-bordered table-stripped">
            <tr>
                <th>Role</th>
                <th>Amount Each</th>
                <th>Number </th>
                <th>Total amount</th>
            </tr>
           @foreach($salaries as $salary)
                <tr>
                  <td>{{$salary->role}}</td>
                  <td>{{$salary->amount }}</td>
                  <td>{{$salary->Number}}</td>
                  <td>{{$salary->total}}</td>
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