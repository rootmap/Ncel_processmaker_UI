<?php
    include 'controller/common.php';

    //session_start();
    //session_destroy();

    if (empty($_SESSION["access_token"])) {
        //redirect dashboard
        header("Location: ../login");

    }else{

        // get all case using this url
        $accessCase   = json_decode(getCaseInfo('cases/start-cases'));
        // get all inbox case using this url
        $inbox        = json_decode(getCaseInfo('cases'));
        // get all draft case using this url
        $draft        = json_decode(getCaseInfo('cases/draft'));
        // get all participated case using this url
        $participated = json_decode(getCaseInfo('cases/participated'));
        // get all unassigned case using this url
        $unassigned   = json_decode(getCaseInfo('cases/unassigned'));


        //echo '<pre>'; print_r($accessCase) ;
        //echo '<pre>'; print_r($draft) ;
        //print_r($accessCase->cases);die();

        /*foreach ($draft->cases as $oCase) {
          
          echo $oCase->app_status_label .'<br>';
        }*/

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- include css link -->
    <?php include 'common/css.php' ?>

</head>
<body>

  <!-- include header -->
  <?php include 'common/header.php' ?>

  
    <div class="wrapper container">
      <div class="container-fluid"></div>
      
      <!-- include dashboard_info -->
      <?php include 'common/dashboard_info.php' ?>


      <div class="row">
          <div class="col-xl-12">
              <div class="card">
                  <div class="card-header" style="height: 45px !important;"><h4 class="mt-0 header-title mb-5"><i class="ion-android-note"></i> Draft Case</h4>
                  </div>
                  <div class="card-body">

                    <div class="table-responsive">
                      <table id="myTable" data-page-length="25">
                          <thead>
                              <tr>
                                  <th><button onclick="confirm('Are you want to delete this?')" class="btn btn-sm"><i class="ion-trash-b"></i> Delete</button></th>
                                  <th>#</th>
                                  <th>Case</th>
                                  <th>Process</th>
                                  <th>Task</th>
                                  <th>Current User</th>
                                  <th>Previous User</th>
                                  <th>Status</th>
                                  <th>Due Date</th>
                                  <th>Last Modification</th>
                                  <th>Priority</th>
                                  <th>Notes</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                              if (!empty($draft)) {

                                foreach ($draft->cases as $key => $d) {
                            ?>
                                  <tr>
                                    <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                    <td><a href="<?=$d->app_uid?>"><?=$d->app_number?></a></td>
                                    <td><?=$d->app_title?></td>
                                    <td><?=$d->app_pro_title?></td>
                                    <td><?=$d->app_tas_title?></td>
                                    <td><?=$d->app_current_user?></td>
                                    <td><?=$d->app_del_previous_user?></td>
                                    <td><?=$d->app_status?></td>
                                    <td><?=$d->del_task_due_date?></td>
                                    <td><?=$d->del_delegate_date?></td>
                                    <td><?=$d->del_priority?></td>
                                    <td><a href="case-note.php?app_uid=<?=$d->app_uid?>"><i class="fa fa-wechat"></i></a></td>
                                  </tr>
                            <?php 
                              } }  
                            ?>
                          </tbody>
                      </table>
                    </div>

                  </div>
              </div>
          </div>
      </div><!-- end row -->


    </div><!-- end container-fluid -->
  </div><!-- end wrapper -->

   

 <!-- include Footer -->
 <?php include 'common/footer.php' ?>


   
</body>

</html>