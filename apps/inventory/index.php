<?php
  defined('APPS') OR exit('No direct script access allowed');
  $fields = "*";
  $table = "inventory";
  $inventory = fetch_all($fields, $table);

  $fields = "*";
  $table = "brand";
  // $value = " WHERE `status` = 'Y' ";
  $value = "";
  $brands = fetch_all($fields, $table, $value);
  $brand_txt = array();
  foreach($brands as $brand){
    $brand_txt[$brand["id"]] = $brand["name"];
  }

  $fields = "*";
  $table = "category";
  // $value = " WHERE `status` = 'Y' ";
  $value = "";
  $categorys = fetch_all($fields, $table, $value);
  $cate_txt = array();
  foreach($categorys as $category){
    $cate_txt[$category["id"]] = $category["name"];
  }


  $fields = "*";
  $table = "type";
  // $value = " WHERE `status` = 'Y' ";
  $value = "";
  $types = fetch_all($fields, $table, $value);
  $type_txt = array();
  foreach($types as $type){
    $type_txt[$type["id"]] = $type["name"];
  }
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Inventory</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active">Inventory</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- /.col-md-6 -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <a href="?page=inventory/add" class="btn btn-success btn-sm float-right"><i class="fas fa-plus-circle"></i>
                New Inventory</a>
            </div>
            <div class="card-body">
              <form action="apps/inventory/do_inventory.php?action=delete_all" id="frm" method="POST">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-sm">
                    <thead>
                      <tr>
                        <th>#</th>
                        <?php if($_SESSION["PERMISSION"] == "1"){?>
                        <th class="text-center"></th>
                        <?php } ?>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                $i = 1;
                  foreach($inventory as $v){
                    if($v["status"] == "Y"){
                      $status = "Enabled";
                      $bg = "success";
                    }else{
                      $status = "Disabled";
                      $bg = "danger";
                    }
                ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td class="text-center">
                          <div class="icheck-primary d-inline">
                            <input type="checkbox" id="checK_<?php echo $i;?>" name="ch[]"
                              value="<?php echo $v["id"].",".$v["photo"];?>">
                            <label for="checK_<?php echo $i;?>">
                            </label>
                          </div>
                        </td>
                        <td>
                          <?php if(!empty($v["photo"])){ ?>
                          <?php if(file_exists("uploads/inventory/".$v["photo"])){ ?>
                          <img src="uploads/inventory/<?php echo $v["photo"];?>" class="picture-show"
                            alt="Profile-img">
                          <?php }else{ ?>
                          <img src="dist/img/pic_empty.jpg" class="picture-show" alt="Image">
                          <?php } ?>
                          <?php }else{ ?>
                          <img src="dist/img/pic_empty.jpg" class="picture-show" alt="Image">
                          <?php } ?>
                        </td>
                        <td><?php echo $v["name"];?></td>
                        <td><?php echo $cate_txt[$v["category"]];?></td>
                        <td><?php echo $type_txt[$v["type"]];?></td>
                        <td><?php echo $brand_txt[$v["brand"]];?></td>
                        <td><span class="badge badge-<?php echo $bg;?> badge-pill"><?php echo $status;?></span></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <small><a class="dropdown-item"
                                  href="?page=users/view&user_id=<?php echo $v["id"];?>"><i
                                    class="fas fa-search"></i> View</a></small>
                          
                               
                              <small><a class="dropdown-item"
                                  href="?page=inventory/edit&inventory_id=<?php echo $v["id"];?>"><i class="fas fa-edit"></i>
                                  Edit</a></small>
                              
                              <small><a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                  data-target="#modalDelete" data-id="<?php echo $v["id"];?>"
                                  data-name="<?php echo $v["name"];?>" data-photo="<?php echo $v["photo"];?>"><i class="fas fa-trash"></i>
                                  Delete</a></small>
                             
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>

            
                <div class="row">
                  <div class="col-md-12">
                    <div class="btn-group">
                      <button type="button" class="btn-sm btn">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" id="checkall">
                          <label for="checkall">Check All
                          </label>
                        </div>
                      </button>
                      <button type="button" class="btn-sm btn btn-danger btn-delete-all" disabled data-toggle="modal"
                        data-target="#modalDeleteAll"><i class="fas fa-trash"></i>
                        Delete</button>
                    </div>
                  </div>
                </div>
               
                <form>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content -->
</div>


<div class="modal" id="modalDeleteAll" role="dialog" tabindex="-1" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <i class="fas fa-exclamation-circle"></i> Are you sure you want to delete all?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary btn-continue">Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalDelete" role="dialog" tabindex="-1" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <i class="fas fa-exclamation-circle"></i>
        <span></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary btn-continue" onClick="">Yes</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  var msg = "<?php echo isset($_SESSION["MSG"]) ? $_SESSION["MSG"] : ""  ?>";
  var status = "<?php echo isset($_SESSION["STATUS"]) ? $_SESSION["STATUS"] : ""  ?>";
  var permission = "<?php echo $_SESSION["PERMISSION"] ?>";
</script>

<?php unset($_SESSION["STATUS"],$_SESSION["MSG"]); ?>
