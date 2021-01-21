<?php
    include 'controller/common.php';

    //session_start();
    //session_destroy();

    if (empty($_SESSION["access_token"])) {
        //redirect dashboard
        header("Location: ../login");

    }else{

      
        $pro_uid = $_REQUEST['pro_uid']; 
        $tas_uid = $_REQUEST['tas_uid']; 

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


        //create new case
        //$dynaforms          = json_decode(createNewCase());
        //get single dynaform info
        //$single_dynaform    = json_decode(getCaseInfo('cases/'.$dynaforms->app_uid));
        

        //echo $pro_uid.'/dynaforms'; die();
        //prj_uid and pro_uid is same
        $dynaforms      = json_decode(getDynaformInfo($pro_uid.'/dynaforms'));
        $first_dynaform = end($dynaforms->cases);
        //echo '<pre>'; print_r($dynaforms ); //die();
        //echo $_SESSION["access_token"];

        $pro_uid_id     = $pro_uid;
        $token_id       = $_SESSION["access_token"];
        $tas_uid_id     = $tas_uid;

        //$dyn_uid_id     = $single_dynaform->cases->current_task[0]->tas_uid;
        //$we_title_id    = $single_dynaform->cases->current_task[0]->tas_title.'_'.uniqid();
        //$dyn_uid_id     = $first_dynaform->dyn_uid;
        $dyn_uid_id     = $first_dynaform->dyn_uid;
        $we_title_id    = uniqid();
        //$we_title_id    = $first_dynaform->dyn_title.'_'.uniqid();

    }


    

?>




<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- include css link -->
    <?php include 'common/css.php' ?>

</head>
<body onload="getDynaform( '<?=$pro_uid_id?>', '<?=$token_id?>', '<?=$tas_uid_id?>', '<?=$dyn_uid_id?>', '<?=$we_title_id?>','<?=$_SESSION['usr_uid']?>') ">

    <!-- include header -->
    <?php include 'common/header.php' ?>

  
    <div class="wrapper container">
        <div class="container-fluid"></div>
      
            <!-- include dashboard_info -->
            <?php include 'common/dashboard_info.php' ?>


            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header" style="height: 45px !important;"><h4 class="mt-0 header-title mb-5"><i class="ion-android-note"></i> Dynaform details</h4>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" >
                              
                                <iframe id="iframex" name="iframex" src="" width="90%" height="550" scrolling="yes" frameborder="0"></iframe>

                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end wrapper -->


 <!-- include Footer -->
 <?php include 'common/footer.php' ?>



<script>
    
    
    //dynamic process using function
    function getDynaform(pro_uid, token, tas_uid, dyn_uid, we_title, user_id) {
      
        console.log(pro_uid+'_'+token+'_'+tas_uid+'_'+dyn_uid+'_'+we_title+'_'+user_id);
       
        var settings = {
            "url": "http://localhost:81/api/1.0/workflow/project/"+pro_uid+"/web-entry",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer "+token,
                "Content-Type": "application/json"
            },
            "data": JSON.stringify({
                "tas_uid":tas_uid,
                "dyn_uid":dyn_uid,
                "usr_uid": user_id,
                "we_title":we_title, 
                "we_description":"Description.......",
                "we_method":"WS",
                "we_input_document_access":1
            }),
        }

        $.ajax(settings).done(function (response) {
            console.log(response.we_data);
            var url     = response.we_data;
            $('#iframex').prop("src",url);

            var we_uid  = response.we_uid
            console.log(we_uid);
            //updateDynaform(pro_uid, token, tas_uid, dyn_uid, we_title, we_uid)

        });
    }


    //update dynaform 
    /*function updateDynaform(pro_uid, token, tas_uid, dyn_uid, we_title, we_uid) {
        
        var settings = {
        "url": "http://localhost:81/api/1.0/workflow/project/"+pro_uid+"/web-entry/"+we_uid+"",
        "method": "PUT",
        "timeout": 0,
        "headers": {
            "Authorization": "Bearer "+token,
            "Content-Type": "application/json"
        },
        "data": JSON.stringify({"tas_uid":tas_uid,"dyn_uid":dyn_uid,"usr_uid":"","we_title":we_title,"we_description":"Initiation 3","we_method":"WS","we_input_document_access":1}),
        };

        $.ajax(settings).done(function (response) {
          console.log(response);
        });

    }*/



    //manual process
    /*var settings = {
      "url": "http://localhost:81/api/1.0/workflow/project/9770453305fc4c1eb455543020401473/web-entry",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Authorization": "Bearer 600bb4e3ce128bb5ae158ee2b684fd4be1f58c13",
        "Content-Type": "application/json"
      },
      "data": JSON.stringify({"tas_uid":"3687802475fc4c26f44ff08025269497","dyn_uid":"5647041045fc4cd68b5b043005341772","we_title":"Initiation 92"+Math.random(),"we_description":"Initiation 3","we_method":"WS","we_input_document_access":1}),
    }

    $.ajax(settings).done(function (response) {
      //console.log(response.we_data);
      var url = response.we_data;
      $('#iframex').prop("src",url);
    });*/


</script>



   
</body>

</html>




