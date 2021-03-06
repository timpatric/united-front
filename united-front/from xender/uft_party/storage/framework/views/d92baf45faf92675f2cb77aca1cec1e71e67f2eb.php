<?php echo $__env->make('layouts.cdn_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">

  <!-- Main Header -->
  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Sidebar -->
  <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
        <div class="container-fluid">
          <div class="d-sm-flex align-items-left justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Overview</h1>
          </div>

          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="col-auto">
                      <i class="fa fa-group fa-2x text-gray-300"></i>
                    </div>
                      <div class="text-xs text-primary mb-4">Agents</div>
                      <div style="font-size:20px;font-style: italic;">
                        <?php echo e($agentno); ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="col-auto">
                      <i class="fa fa-group fa-2x text-gray-300"></i>
                    </div>
                      <div class="text-xs text-success mb-1">Members</div>
                      <div style="font-size:20px;font-style: italic;">
                        <?php echo e($memberno); ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="col-auto">
                      <i class="fa fa-list fa-2x text-gray-300"></i>
                    </div>
                      <div class="text-xs text-info mb-1">Pending Upgrades</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div style="font-size:20px;font-style: italic;">
                            <?php echo e($member_upgrade); ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="col-auto">
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                    </div>
                      <div class="text-xs text-warning mb-1">Funds</div>
                      <div style="font-size:20px;font-style: italic;">
                        <?php echo e($amount); ?>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
  </div>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.cdn_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\wamp64\www\uft_party\resources\views/dashboard.blade.php ENDPATH**/ ?>