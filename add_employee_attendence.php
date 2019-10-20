<?php include 'inc/header.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
<?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
      $att         = $_POST['attendence_status'];
      $designation  = $_POST['designation'];
      $name         = $_POST['name'];
      $overtime     = $_POST['overtime'];
      $att_date      = date('Y-m-d');
      $getquery     = "SELECT distinct att_date FROM tbl_employee";
      $getresult    = $db->select($getquery);
      $b=false;
      if ($getresult) {
        while ($getvalue = $getresult->fetch_assoc()) {
      if ($att_date == $getvalue['att_date']) {
        $b=true;
        echo "<div class='alert alert-danger error'>Attendance Already taken</div>";
      }
    }
  }
      if(!$b){
        foreach ($att as $key => $value) {
          if ($value == 'present') {
            $query_att = "INSERT INTO tbl_employee(at_value, emp_id, at_date)VALUES('$name','$designation','present','$key', '$overtime', '$att_date')";
            $result_att = $db->insert($query_att);
          }else{
            $query_att = "INSERT INTO tbl_employee(at_value, emp_id, at_date)VALUES('$name','$designation','absent','$key', '$overtime', '$att_date')";
            $result_att = $db->insert($query_att);
          }
        }
        if ($result_att) {
          echo "<div class='alert alert-success error'>Attendance take Successfully</div>";
        }
      }
    }
?>
                <form class="user" action="" method="GET" enctype="multipart/form-data">
                    <table class="table table-striped" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>SL NO.</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Designation</th>
                          <th>Joining Date</th>
                          <th>Present/ Absent</th>
                        </tr>
                      </thead>
                      <tbody>
<?php
  $query = "SELECT * FROM tbl_employee";
  $result = $db->select($query);
  if ($result) {
    $i=0;
    while ($value = $result->fetch_assoc()) {
    $i++;
?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><img src="<?php echo $value['image']; ?>" height="50px;" width="50px;"></td>
                          <td name="designation"><?php echo $value['designation']; ?></td>
                          <td><?php echo $value['joining_date']; ?></td>
                          <td style="color: green;font-weight:bold;"  name="name"><?php echo $value['name']; ?></td>
                          <td>  
                            <label>
                              Present&nbsp;<input type="checkbox" value="Present" name="attendence_status[<?php echo $value['id']; ?>]">
                              <label class="checkbox-inline">||
                              Absent&nbsp;<input type="checkbox" value="Absent" name="attendence_status[<?php echo $value['id']; ?>]">
                              </label>
                            </label>
                          </td>
                        </tr>
      <?php } } ?>
                  </tbody>
                </table>
                      <div class="d-flex p-3 bg-secondary text-white">
                        <button style="margin:auto;" type="submit" name="submit" class="btn btn-warning">Submit</button>
                      </div>
                </form>










              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
  <?php include 'inc/footer.php'; ?>
  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>