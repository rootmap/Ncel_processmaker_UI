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
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Updates and statistics" />

    <title>Laravel</title>

    <?php include 'common_2/css.php' ?>


</head>


<body id="kt_body" style="background-image: url(assets/theme/html/demo2/dist/assets/media/bg/bg-10.jpg )" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">


<!--begin::Main-->
<!--begin::Header Mobile-->
<?php include 'common_2/mobile-header.php' ?>
<!--end::Header Mobile-->


<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            <!--begin::Header-->
            <?php include 'common_2/header.php' ?>
            <!--end::Header-->


            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
                    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap mr-1">
                            <!--begin::Heading-->
                            <div class="d-flex flex-column">
                                <!--begin::Title-->
                                <h2 class="text-white font-weight-bold my-2 mr-5">Dashboard</h2>
                                <!--end::Title-->
                                <!--begin::Breadcrumb-->
                                <div class="d-flex align-items-center font-weight-bold my-2">
                                    <!--begin::Item-->
                                    <a href="#" class="opacity-75 hover-opacity-100">
                                        <i class="flaticon2-shelter text-white icon-1x"></i>
                                    </a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                                    <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">Dashboard</a>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                                    <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">Latest Updated</a>
                                    <!--end::Item-->
                                </div>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Heading-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Toolbar-->
                        <div class="d-flex align-items-center">
                            <!--begin::Button-->
                            <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>
                            <!--end::Button-->
                            <!--begin::Dropdown-->
                            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
                                <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-drop"></i>
													</span>
                                                <span class="navi-text">New Group</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-list-3"></i>
													</span>
                                                <span class="navi-text">Contacts</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
                                                <span class="navi-text">Groups</span>
                                                <span class="navi-link-badge">
														<span class="label label-light-primary label-inline font-weight-bold">new</span>
													</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
                                                <span class="navi-text">Calls</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-gear"></i>
													</span>
                                                <span class="navi-text">Settings</span>
                                            </a>
                                        </li>
                                        <li class="navi-separator my-3"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-magnifier-tool"></i>
													</span>
                                                <span class="navi-text">Help</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
                                                <span class="navi-text">Privacy</span>
                                                <span class="navi-link-badge">
														<span class="label label-light-danger label-rounded font-weight-bold">5</span>
													</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Toolbar-->

                    </div>
                </div>
                <!--end::Subheader-->

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Inbox-->
                        <div class="d-flex flex-row">

                            <!--begin::Aside-->
                            <div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_inbox_aside">
                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">
                                    <!--begin::Body-->
                                    <div class="card-body px-5">


                                        <!--begin::Navigations-->
                                        <div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">
                                            <!--begin::Item-->
                                            <div class="navi-item my-2">
                                                <a href="#" class="navi-link active">
														<span class="navi-icon mr-4">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Mail-heart.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M13.8,4 C13.1562,4 12.4033,4.72985286 12,5.2 C11.5967,4.72985286 10.8438,4 10.2,4 C9.0604,4 8.4,4.88887193 8.4,6.02016349 C8.4,7.27338783 9.6,8.6 12,10 C14.4,8.6 15.6,7.3 15.6,6.1 C15.6,4.96870845 14.9396,4 13.8,4 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                                    <span class="navi-text font-weight-bolder font-size-lg">Inbox</span>
                                                    <span class="navi-label">
															<span class="label label-rounded label-light-success font-weight-bolder">3</span>
														</span>
                                                </a>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="navi-item my-2">
                                                <a href="index" class="navi-link">
														<span class="navi-icon mr-4">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Half-star.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000"></path>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                                    <span class="navi-text font-weight-bolder font-size-lg">Marked</span>
                                                </a>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="navi-item my-2">
                                                <a href="draft" class="navi-link">
														<span class="navi-icon mr-4">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Design/PenAndRuller.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                                    <span class="navi-text font-weight-bolder font-size-lg">Draft</span>
                                                    <span class="navi-label">
															<span class="label label-rounded label-light-warning font-weight-bolder"><?=count($draft->cases)?></span>
														</span>
                                                </a>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="navi-item my-2">
                                                <a href="#" class="navi-link">
														<span class="navi-icon mr-4">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Sending.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z" fill="#000000"></path>
																		<path d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                                    <span class="navi-text font-weight-bolder font-size-lg">Sent</span>
                                                </a>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <div class="navi-item my-2">
                                                <a href="#" class="navi-link">
														<span class="navi-icon mr-4">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Trash.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
																		<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                                    <span class="navi-text font-weight-bolder font-size-lg">Trash</span>
                                                </a>
                                            </div>
                                            <!--end::Item-->
                                            <!--begin::Separator-->
                                            <div class="navi-item my-10"></div>
                                            <!--end::Separator-->

                                        </div>
                                        <!--end::Navigations-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Aside-->


                            <!--begin::List-->
                            <div class="flex-row-fluid ml-lg-8 d-block" id="kt_inbox_list">

                                <!--begin::Card-->
                                <div class="card card-custom card-stretch">


                                    <!--begin::Body-->
                                    <div class="card-body table-responsive px-0">

                                        <!--begin::Items-->
                                        <div class="card">
                                            <div class="card-header" style="padding-top: 10px;padding-bottom: 0px;">
                                                <h4 class="mt-0 header-title mb-5" ><i class="mdi mdi-email"></i> Draft Case</h4>
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
                                        <!--end::Items-->

                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::List-->

                        </div>
                        <!--end::Inbox-->



                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <?php include 'common_2/footer.php' ?>
            <!--end::Footer-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->



<!-- begin::User Panel-->
<?php include 'common_2/user-panel.php' ?>
<!-- end::User Panel-->


<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
		<span class="svg-icon">
			<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<polygon points="0 0 24 0 24 24 0 24" />
					<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
					<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
				</g>
			</svg>
            <!--end::Svg Icon-->
		</span>
</div>
<!--end::Scrolltop-->


<?php include 'common_2/script.php' ?>


</body>
</html>