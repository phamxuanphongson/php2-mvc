

<?php 

  if (isset($_POST['save-btn'])) {

      $model = new model();
      $title = $_POST['title'];
      $cate_id = $_POST['cate_id'];
      $image = $_FILES['image'];
      $short_desc = $_POST['short_desc'];
      $content = $_POST['content'];
      $bl = true;
      

      if (empty($title)) {
        $errTitle['title'] =  'Vui long nhap ten tieu de !!';
        $bl = false;
      }
      elseif (empty($short_desc)) {
        $errSd['short_desc'] = 'Vui long nhap mo ta ngan !!!';
        $bl = false;
      }
      elseif (empty($content)) {
        $errContent['content'] = 'Vui long nhap noi dung !!!';
        $bl = false;
      }
      elseif (empty($image)) {
        $bl = false;
      }

      if ($bl == true) {
        include_once '../model/model.php';
        $nameImage = $model->uploadImage($image);
        // var_dump($nameImage);
        $doAddPost = $model->addPost($title,$short_desc,$content,$nameImage,$cate_id);
        
        if ($doAddPost == true) {
          header('Location:../view/admin-home-posts-index.php');
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
    <form enctype="multipart/form-data"action="../controller/controller.php" method="post">
        
      <!--  <input type="date" name="" value=""> -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="">
                   
                    <span class="text-danger"><!-- {{$errors->first('title')}} --></span>
                    
                </div>
                

                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="cate_id" class="form-control">
                      <?php
                        include_once '../model/model.php';
                        $model = new model(); 
                        $allCates = $model->selectAllCates();
                        $allPosts = $model->selectAllPosts();
                       ?>
                       <?php foreach ($allCates as $cate): ?>
                         <option 
                           
                           value="<?php echo $cate['id'] ?>">
                             <?php echo $cate['name'] ?>
                           </option>
                       <?php endforeach ?>
                    </select>
                </div>
               
                
                
            </div>
            <div class="col-md-6">
                
                <div class="form-group">
                    <label>Image's posts</label>
                    <input type="file" name="image" class="form-control" >
                    
                        <span class="text-danger"></span>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Short_Desc</label>
                    <textarea class="form-control" name="short_desc" rows="5"></textarea>
                    
                        <span class="text-danger"></span>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Content</label>
                    <textarea id="content" class="form-control" name="content" rows="15"></textarea>
               
                        <span class="text-danger"></span>
                    
                </div>
            </div>
        </div>
        <div class="text-left">
            <a href="{{ route('list.post') }}"
                class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" name="save-btn" class="btn btn-sm btn-primary">Lưu</button>
        </div>
    </form>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once '../layouts/admin/footer.php'; ?>  
