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
      <th>Images</th>
      <th>Link</th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
      $model = new model();
      $allAds = $model->selectAll('ads');
      
    ?>
    <?php foreach ($allAds as $ads): ?>
   
        <tr>
          <th ><?php echo $ads['id'] ?></th>
          <td >
            <img src="../uploaded/images/<?php echo $ads['images'] ?>" alt="" width="80">
          </td>
          <td ><?php echo $ads['link'] ?></td>
          
          <td><a href="edit-ads.php?id=<?php echo $ads['id'] ?>" class="btn btn-dark btn-sm" title="">Edit</a>
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
