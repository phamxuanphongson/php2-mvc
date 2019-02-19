<?php include_once '../model/model.php'; ?>
<?php 
      if (isset($_POST['save-newcate-btn'])) {
      $model = new model();
      $name = $_POST['name'];
      $color = $_POST['color'];
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
        $doAddCate = $model->addCate($name,$color);
        
        if ($doAddCate == true) {
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
        
      <!--  <input type="date" name="" value=""> -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="">
                   
                    <span class="text-danger"><?php echo isset($err['name']) ? $err['name'] : '' ?></span>
                    
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input type="text" name="color" class="form-control" value="">
                   
                    <span class="text-danger"><?php echo isset($err['color']) ? $err['color'] : '' ?></span>
                    
                </div>
                 
            </div>
           
        </div>
       
        <div class="text-left">
            <a href="{{ route('list.post') }}"
                class="btn btn-sm btn-danger">Huỷ</a>
            <button type="submit" name="save-newcate-btn" class="btn btn-sm btn-primary">Lưu</button>
        </div>
    </form>
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once '../layouts/admin/footer.php'; ?>  
