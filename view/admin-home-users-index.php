<?php include_once '../layouts/admin/header.php'; ?>

<?php include_once '../model/model.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List posts Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <table class="table customtable">
  <thead>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Role</th>
      
    </tr>
  </thead>
  <tbody>
    
    <?php
      $model = new model();
      $allUsers = $model->selectAll('users');
    ?>
    <?php foreach ($allUsers as $users): ?>
        <tr>
          <th ><?php echo $users['id'] ?></th>
          <td ><?php echo $users['username'] ?></td>
          <td ><?php echo $users['email'] ?></td>
          <td ><?php echo $users['role'] ?></td>
          <td><a href="edit-user.php?id=<?php echo $users['id'] ?>" class="btn btn-dark btn-sm" title="">Edit</a>
              <a href="delete-user.php?id=<?php echo $users['id'] ?>" class="btn btn-dark btn-sm" title="">Delete</a>
          </td>
        </tr>
    <?php endforeach ?>
  

       
    
  </tbody>    
</table>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once '../layouts/admin/footer.php'; ?>  
