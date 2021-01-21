<!-- Footer -->
<footer class="footer">
 <div class="container-fluid">
   <div class="row">
     <div class="col-12">© 2020 Robi Axiata Ltd. All rights reserved.</span>
      </div>
    </div>
  </div>

</footer><!-- End Footer -->



<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create a new case</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


     <div class="modal-body">
        <?php
          if ($accessCase->casesStatusCode == 200) { //if successful request
            ?>
            <table id="createCaseTable" data-page-length="25" style="width: 100% !important;">
              <thead>
                <tr>
                  <td>Case Name</td>
                  <td class="text text-right">Action</td>
                </tr>
              </thead>
              <tbody>
                <?php
                    foreach ($accessCase->cases as $oCase) {
                      ?>
                        <tr>
                          <td><?=$oCase->pro_title?></td>

                          <td class="text text-right">
                           <?php echo '<a class="btn btn-info" href="dynaform.php?pro_uid='.$oCase->pro_uid.'&tas_uid='.$oCase->tas_uid.'"> <i class="fa fa-chevron-circle-right"></i> </a>'?>
                          </td>

                          <!--  <td class="text text-right">
                           <?php echo '<a class="btn btn-info" href="controller/common.php?pro_uid='.$oCase->pro_uid.'&tas_uid='.$oCase->tas_uid.'"> <i class="fa fa-chevron-circle-right"></i> </a>'?>
                          </td> -->

                        </tr>
                      <?php
                    }
                ?>
              </tbody>
            </table>
            <?php
          }
        ?>
     </div>

    </div>
  </div>
</div>



<!-- jQuery  -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="peity-chart/jquery.peity.min.js"></script> 


<script src="assets/pages/dashboard.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>


<!-- for datatables -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
   $(document).ready( function () {
        
        $('#myTable').dataTable( {
            "order":  [ 0, 'asc' ]
        } );

        $('#createCaseTable').DataTable();
    } );
</script>
