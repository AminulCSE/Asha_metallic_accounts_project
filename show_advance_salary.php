<?php include 'inc/header.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
<?php
  if (isset($_GET['delid'])) {
   $id = $_GET['delid'];
   
   $query = "delete from tbl_salary_advanced where id='$id'";
   $delImage = $db->delete($query);
   if ($delImage) {
     echo "<span class='success'>Image Deleted Successfully.
     </span>";
    }else {
     echo "<span class='error'>Image Not Deleted !</span>";
    }
   }
  ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All client bill info here....</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>SL NO.</th>
                      <th>Name</th>
                      <th>Taka</th>
                      <th>Description</th>
                      <th>Edit/ Delete</th>
                    </tr>
                  </thead>
                  <tbody>
            <?php
              $query = "SELECT * FROM tbl_salary_advanced";
              $result = $db->select($query);
              if ($result) {
                $i=0;
                while ($value = $result->fetch_assoc()) {
                $i++;
            ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $value['name']; ?></td>
                      <td><?php echo $value['taka']; ?></td>
                      <td><?php echo $value['description']; ?></td>
                      <td><a OnClick="return confirm('Are you sure to delet date??');" href="?delid=<?php echo $value['id']; ?>">Delete</a>||
                        <a href="edit_advance_salary.php?editid=<?php echo $value['id']; ?>">Edit</a>
                    </td>
                    </tr>

                    <?php } } ?>
                  </tbody>
                </table>
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