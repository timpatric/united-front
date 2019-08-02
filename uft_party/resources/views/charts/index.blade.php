@extends('charts.base')
@section('action-content')
    <!-- Main content -->
    {!! Charts::assets() !!}
<section class="content">
  <div class="box">
    <div class="box-header">

  <!-- /.box-header -->
   <div class="box-body">

      <br />
      {!! $chart->render() !!}

    </div>
  </div>
  <!-- /.box-body -->
</section>
@endsection