<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Register Users
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Register Users</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <?php //print_r($orders); ?>
              <table class="table table-striped table-bordered datatable">
                <thead>
                  <th>#</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>email</th>
                  <th>Register Date</th>
                  <th></th>
                </thead>
                <tbody>
                  <?php $i = 1; foreach ($users as $key => $user) { ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?=ucwords($user->first_name.' '.$user->last_name)?></td>
                      <td><?=$user->mobile?></td>
                      <td><?=$user->mail_id?></td>
                      <th><?=date('d-m-Y',strtotime($user->created))?></th>
                      <td>
                        <a href="<?=base_url('cpanel/dashboard/reguser/'.$user->id.'/details')?>" style="color:green"><i class="fa fa-files-o"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
    </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->