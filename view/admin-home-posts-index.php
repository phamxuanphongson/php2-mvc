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
      <th>Title</th>
      <th>Categories</th>
      <th>Short Desc</th>
      <th >Image</th>
      <th ><a href="add-posts.php" class="btn btn-danger btn-sm">Add new posts</a></th>
    </tr>
  </thead>
  <tbody>
    
    <?php 
      $model = new model();
      $allPosts = $model->selectAll('posts');
      
    ?>
    <?php foreach ($allPosts as $post): ?>
    <?php $theCate = $model->getOne('categories',$post['cate_id']) ?>
        <tr>
          <th ><?php echo $post['id'] ?></th>
          <td ><?php echo $post['title'] ?></td>
          
          <td ><?php echo $theCate['name'] ?></td>
          <td ><?php echo $post['short_desc'] ?></td>
          <td >
            <img src="../uploaded/images/<?php echo $post['images'] ?>" alt="" width="80">
          </td>
          <td><a href="edit-post.php?id=<?php echo $post['id'] ?>" class="btn btn-dark btn-sm" title="">Edit</a>
              <a href="delete-post.php?id=<?php echo $post['id'] ?>" class="btn btn-dark btn-sm" title="">Delete</a>
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
