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
    <div class="col-md-4" style="margin-bottom: 30px">
      <form method="get" action="{{ route('salary-management.index') }}">
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