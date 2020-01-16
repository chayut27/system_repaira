<?php
  defined('APPS') OR exit('No direct script access allowed');
  
  
  $fields = "*";
  $table = "type";
  $conditions = " WHERE `status` = 'Y' ";
  $types = fetch_all($fields, $table, $conditions);

  $fields = "*";
  $table = "brand";
  $conditions = " WHERE `status` = 'Y' ";
  $brand = fetch_all($fields, $table, $conditions);

  $fields = "*";
  $table = "category";
  $conditions = " WHERE `status` = 'Y' ";
  $categorys = fetch_all($fields, $table, $conditions);

  $fields = "*";
  $table = "inventory";
  $conditions = " WHERE `status` = 'Y' ";
  $inventorys = fetch_all($fields, $table, $conditions);
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Repair</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item"><a href="?page=repair">Repair</a></li>
            <li class="breadcrumb-item active">New Repair</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form id="forminfo" class="form-horizontal" enctype="multipart/form-data" action="apps/repair/do_repair.php?action=create_repair"
                method="POST" autocomplete="off">


                <div class="form-group row">
                  <label for="category" class="col-sm-2 col-form-label">Category <span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <select name="category" id="category" class="form-control">
                      <option value="">-- Please Select Category --</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="type" class="col-sm-2 col-form-label">Type <span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <select name="type" id="type" class="form-control">
                      <option value="">-- Please Select Type --</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="brand" class="col-sm-2 col-form-label">Brand <span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <select name="brand" id="brand" class="form-control">
                        <option value="">-- Please Select Brand --</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inven" class="col-sm-2 col-form-label">Inventory <span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <select name="inven" id="inven" class="form-control">
                        <option value="">-- Please Select Inventory --</option>
                      </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="title" class="col-sm-2 col-form-label">Title <span
                      class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value=""
                      placeholder="Title" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Description" class="col-sm-2 col-form-label">Description <span
                      class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <textarea name="description" id="Description"rows="5" class="form-control"></textarea>
                  </div>
                </div>
                
               
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-upload"><i class="fas fa-check-circle"></i>
                      Save</button>
                  </div>
                </div>
              </form>
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>



<script>
var arr_type = <?php echo json_encode($types);?>;
var arr_brand = <?php echo json_encode($brand);?>;
var arr_cate = <?php echo json_encode($categorys);?>;
var arr_inven = <?php echo json_encode($inventorys);?>;
</script>