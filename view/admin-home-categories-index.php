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
      <th>Name</th>
      <th>Color</th>
      <th ><a href="add-categories.php" class="btn btn-danger btn-sm">Add new categories</a></th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
      $model = new model();
      $allCates = $model->selectAll('categories');
    ?>
    <?php foreach ($allCates as $cate): ?>
        <tr>
          <th ><?php echo $cate['id'] ?></th>
          <td ><?php echo $cate['name'] ?></td>
          
          <td ><?php echo $cate['color'] ?></td>
          
          
          <td><a href="edit-categories.php?id=<?php echo $cate['id'] ?>" class="btn btn-dark btn-sm" title="">Edit</a>
              <a href="delete-categories.php?id=<?php echo $cate['id'] ?>" class="btn btn-dark btn-sm" title="">Delete</a>
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
