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

        //ge all user details
        $users   = json_decode(getCaseInfo('users'));
        //echo '<pre>'; print_r($users);
        foreach ($users->cases as $u) {
          if ($u->usr_username == $_SESSION['username']) {
             $_SESSION['aActiveUsers'] = $u->usr_firstname .' '. $u->usr_lastname;
             $_SESSION['usr_uid']      = $u->usr_uid;
          }
        }

        $paged   = json_decode(getCaseInfo('cases/paged'));

        //echo '<pre>'; print_r($accessCase);
        //print_r($accessCase->cases);die();

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
                <div class="card-header" style="height: 45px !important;"><h4 class="mt-0 header-title mb-5"><i class="fa fa-fort-awesome"></i> Division: <span style="color: #F05D27;">Technology</span></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td style="border-right: 1px solid black"><i class="mdi mdi-check"></i> USB Unblock Request</td>
                          <td style="border-right: 1px solid black"><i class="mdi mdi-check"></i> IP Address Configuration Privileged for Laptop/PC</td>
                          <td><i class="mdi mdi-check"></i> Share Folder Creation Form</td>
                        </tr>
                        <tr>
                          <td style="border-right: 1px solid black"><i class="mdi mdi-check"></i> Internet Special Site Access</td>
                          <td style="border-right: 1px solid black"> <i class="mdi mdi-check"></i> Software Installation Request Form</td>
                          <td><i class="mdi mdi-check"></i> Share Folder Access Request</td>
                        </tr>
                        <tr>
                          <td style="border-right: 1px solid black"><i class="mdi mdi-check"></i> Local Administrator Privilege Request</td>
                          <td style="border-right: 1px solid black"> <i class="mdi mdi-check"></i> Dialu VPN Request For Robi Permanent Employee</td>
                          <td><i class="mdi mdi-check"></i> User Creation</td>
                        </tr>
                        <tr>
                          <td style="border-right: 1px solid black"><i class="mdi mdi-check"></i> Internet Access Request For Inern/Contractual </td>
                          <td style="border-right: 1px solid black"> <i class="mdi mdi-check"></i> Document Approval</td>
                          <td><i class="mdi mdi-check"></i> Service Assurance Reprot</td>
                        </tr>
                        <tr>
                          <td style="border-right: 1px solid black"> </td>
                          <td style="border-right: 1px solid black"></td>
                          <td class="text-right"> <button class="btn btn-outline-primary btn-sm">View More <i class="fa fa-angle-double-down"></i></button> </td>
                        </tr>
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- end row -->


    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header" style="height: 45px !important;"><h4 class="mt-0 header-title mb-5"><i class="fa fa-contao"></i> Division: <span style="color: #F05D27;">Finance</span></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><i class="mdi mdi-check"></i> USB Unblock Request</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Internet Special Site Access</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Local Administrator Privilege Request</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Internet Access Request For Inern/Contractual </td>
                        </tr>
                        <tr>
                          <td class="text-center"> <button class="btn btn-outline-primary btn-sm">View More <i class="fa fa-angle-double-down"></i></button> </td>
                        </tr>
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header" style="height: 45px !important;"><h4 class="mt-0 header-title mb-5"><i class="fa fa-optin-monster"></i> Division: <span style="color: green;">Market Operation</span></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><i class="mdi mdi-check"></i> USB Unblock Request</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Internet Special Site Access</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Local Administrator Privilege Request</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Internet Access Request For Inern/Contractual </td>
                        </tr>
                        <tr>
                          <td class="text-center"> <button class="btn btn-outline-primary btn-sm">View More <i class="fa fa-angle-double-down"></i></button> </td>
                        </tr>
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header" style="height: 45px !important;"><h4 class="mt-0 header-title mb-5"><i class="fa fa-sellsy"></i> Division: <span style="color: #F05D27;">Human Resource</span></h4>
                </div>
                <div class="card-body">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><i class="mdi mdi-check"></i> USB Unblock Request</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Internet Special Site Access</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Local Administrator Privilege Request</td>
                        </tr>
                        <tr>
                          <td><i class="mdi mdi-check"></i> Internet Access Request For Inern/Contractual </td>
                        </tr>
                        <tr>
                          <td class="text-center"> <button class="btn btn-outline-primary btn-sm">View More <i class="fa fa-angle-double-down"></i></button> </td>
                        </tr>
                        
                      </tbody>
                    </table>
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