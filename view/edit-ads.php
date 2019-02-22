<?php include_once '../model/model.php'; ?>
<?php 
 if (isset($_GET['id'])){
    $id = $_GET['id'];
    $model = new model();
    $ads = $model->getOne('ads',$id);
 }


  if (isset($_POST['save-editads-btn'])) {
      
      $image = $_FILES['image'];
      $link = $_POST['link'];
      $id = $_POST['id'];
      $bl = true;
            
      if ($bl == true) {
        $model = new model();
        $nameImage = $model->uploadImage($image);
        if ($image['name'] == null) {
          
          $doEditAds = $model->editAds(null,$link,$id);
        }
        elseif ($link == null) {
          $doEditAds = $model->editAds($nameImage,null,$id);
        }
        elseif($image['name'] && $link == null){
          header('Location:../view/admin-home-ads.php');
        }
        else{
          
          $doEditAds = $model->editAds($nameImage,$link,$id);
        }
        
        if ($doEditAds == true) {
          header('Location:../view/admin-home-ads.php');
        }
        else {
          echo 'loi';
          die();
        }  
      
      }
      else {
        include_once '../view/add-posts.php';
      }

      }

?>

<?php include_once '../layouts/admin/header.php'; ?>
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


    <div class="col-md-6">
      <form enctype="multipart/form-data"action="../controller/controller.php" method="post">
         <input type="hidden" name="id" value="<?php echo $id ?>">
          <div class="row">
              
              <div class="col">
                  <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                          <img id="imageTarget" src="../uploaded/images/<?php echo $ads['images'] ?>" class="img-responsive">
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Image's posts</label>
                      <input type="file" name="image" class="form-control" >
                      <label>Link</label>
                      <input type="text" name="link" class="form-control" value="<?php echo $ads['link']  ?>">
              
                  </div>
              </div>

              
          </div>
          
          
          <div class="text-left">
              <a href="{{ route('list.post') }}"
                  class="btn btn-sm btn-danger">Huỷ</a>
              <button type="submit" name="save-editads-btn" class="btn btn-sm btn-primary">Lưu</button>
          </div>
      </form>
    </div>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once '../layouts/admin/footer.php'; ?>  
