<?php include_once '../model/model.php'; ?>
<?php 
 if (isset($_GET['id'])){
    $id = $_GET['id'];
    $model = new model();
    $post = $model->getOne('posts',$id);
 }


  if (isset($_POST['save-editpost-btn'])) {
      $title = $_POST['title'];
      $cate_id = $_POST['cate_id'];
      $image = $_FILES['image'];
      $short_desc = $_POST['short_desc'];
      $content = $_POST['content'];
      $id = $_POST['id'];
      
      $bl = true;
      

      if (empty($title)) {
        $err['title'] =  'Vui long nhap ten tieu de !!';
        $bl = false;
      }
      elseif (empty($short_desc)) {
        $err['short_desc'] = 'Vui long nhap mo ta ngan !!!';
        $bl = false;
      }
      elseif (empty($content)) {
        $err['content'] = 'Vui long nhap noi dung !!!';
        $bl = false;
      }
      

      if ($bl == true) {
        $model = new model();
        $nameImage = $model->uploadImage($image);
        if ($image['name'] == null) {
          
          $doEditPost = $model->editPost($title,$short_desc,$content,null,$cate_id,$id);
        }
        else{
          
          $doEditPost = $model->editPost($title,$short_desc,$content,$nameImage,$cate_id,$id);
        }
        
        if ($doEditPost == true) {
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
        
       <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $post['title']  ?>">
                   
                    <span class="text-danger"><?php echo isset($err['title']) ? $err['title'] : '' ?></span>
                    
                </div>
                

                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="cate_id" class="form-control">
                      <?php
                        $model = new model(); 
                        $allCates = $model->selectAll('categories');
                        
                       ?>
                       <?php foreach ($allCates as $cate): ?>
                         <option 
                           <?php if ($post['cate_id'] == $cate['id']): ?>
                             selected
                           <?php endif ?>
                           value="<?php echo $cate['id'] ?>">
                             <?php echo $cate['name'] ?>
                           </option>
                       <?php endforeach ?>
                    </select>
                </div>
               
                
                
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <img id="imageTarget" src="../uploaded/images/<?php echo $post['images'] ?>" class="img-responsive">
                    </div>
                </div>
                <div class="form-group">
                    <label>Image's posts</label>
                    <input type="file" name="image" class="form-control" >
                    
                        <span class="text-danger"><?php echo isset($err['images']) ? $err['images'] : '' ?></span>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Short_Desc</label>
                    <textarea class="form-control" name="short_desc" rows="5"><?php echo $post['short_desc'] ?></textarea>
                    
                        <span class="text-danger"><?php echo isset($err['short_desc']) ? $err['short_desc'] : '' ?></span>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Content</label>
                    <textarea id="content" class="form-control" name="content" rows="15"><?php echo $post['content'] ?></textarea>
               
                        <span class="text-danger"><?php echo isset($err['content']) ? $err['content'] : '' ?></span>
                    
                </div>
            </div>
        </div>
        <div class="text-left">
            <a href="{{ route('list.post') }}"
                class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" name="save-editpost-btn" class="btn btn-sm btn-primary">Lưu</button>
        </div>
    </form>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once '../layouts/admin/footer.php'; ?>  
