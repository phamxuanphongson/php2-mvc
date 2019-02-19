<?php include_once '../model/model.php'; ?>
<?php 
      if (isset($_GET['id'])){
      $id = $_GET['id'];
      $model = new model();
      $cate = $model->getOneCate($id);
      }

      if (isset($_POST['save-editcate-btn'])) {
      $model = new model();
      $name = $_POST['name'];
      $color = $_POST['color'];
      $id = $_POST['id'];
      $bl = true;
      

      if (empty($name)) {
        $err['name'] =  'Vui long nhap ten danh muc !!';
        $bl = false;
      }
      elseif (empty($color)) {
        $err['color'] = 'Vui long nhap mau sac !!!';
        $bl = false;
      }

      if ($bl == true) {
        $doEditCate = $model->editCate($name,$color,$id);
        
        if ($doEditCate == true) {
          header('Location:../view/admin-home-categories-index.php');
        }
        else {
          echo 'loi';
          die();
        }  
      
      }
      else {
        include_once '../view/add-categories.php';
      }

      }

  
?>
  <?php include_once '../layouts/admin/header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List categories Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <form enctype="multipart/form-data"action="../controller/controller.php" method="post">
        
       <input type="hidden" name="id" value="<?php echo $cate['id'] ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $cate['name'] ?>">
                   
                    <span class="text-danger"><?php echo isset($err['name']) ? $err['name'] : '' ?></span>
                    
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control" value="<?php echo $cate['color'] ?>">
                   
                    <span class="text-danger"><?php echo isset($err['color']) ? $err['color'] : '' ?></span>
                    
                </div>
                 
            </div>
           
        </div>
       
        <div class="text-left">
            <a href="{{ route('list.post') }}"
                class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" name="save-editcate-btn" class="btn btn-sm btn-primary">Lưu</button>
        </div>
    </form>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once '../layouts/admin/footer.php'; ?>  
