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
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Updates and statistics" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">



    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href=" assets/theme/html/demo2/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundlef552.css?v=7.1.8  " rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href=" assets/theme/html/demo2/dist/assets/plugins/global/plugins.bundlef552.css?v=7.1.8  " rel="stylesheet" type="text/css" />
    <link href=" assets/theme/html/demo2/dist/assets/plugins/custom/prismjs/prismjs.bundlef552.css?v=7.1.8  " rel="stylesheet" type="text/css" />
    <link href=" assets/theme/html/demo2/dist/assets/css/style.bundlef552.css?v=7.1.8 " rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/logos/favicon.ico" />



    <!-- Styles -->
    <style>

    </style>


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
												<!--begin::Compose-->
												<div class="px-4 mt-4 mb-10">
													<a href="#" class="btn btn-block btn-primary font-weight-bold text-uppercase py-4 px-6 text-center" data-toggle="modal" data-target="#kt_inbox_compose">New Message</a>
												</div>
												<!--end::Compose-->
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
														<a href="#" class="navi-link">
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
														<a href="#" class="navi-link">
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
																<span class="label label-rounded label-light-warning font-weight-bolder">5</span>
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
											<!--begin::Header-->
											<div class="card-header row row-marginless align-items-center flex-wrap py-5 h-auto">
												<!--begin::Toolbar-->
												<div class="col-12 col-sm-6 col-xxl-4 order-2 order-xxl-1 d-flex flex-wrap align-items-center">
													<div class="d-flex align-items-center mr-1 my-2">
														<label data-inbox="group-select" class="checkbox checkbox-inline checkbox-primary mr-3">
															<input type="checkbox">
															<span class="symbol-label"></span>
														</label>
														<div class="dropdown">
															<span class="btn btn-clean btn-icon btn-sm mr-1" data-toggle="dropdown">
																<i class="ki ki-bold-arrow-down icon-sm"></i>
															</span>
															<div class="dropdown-menu dropdown-menu-left p-0 m-0 dropdown-menu-sm">
																<ul class="navi py-3">
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-text">All</span>
																		</a>
																	</li>
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-text">Read</span>
																		</a>
																	</li>
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-text">Unread</span>
																		</a>
																	</li>
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-text">Starred</span>
																		</a>
																	</li>
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-text">Unstarred</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
														<span class="btn btn-clean btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Reload list">
															<i class="ki ki-refresh icon-1x"></i>
														</span>
													</div>
													<div class="d-flex align-items-center mr-1 my-2">
														<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Archive">
															<span class="svg-icon svg-icon-md">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Mail-opened.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="btn btn-default btn-icon btn-sm mr-2 d-none" data-toggle="tooltip" title="" data-original-title="Spam">
															<span class="svg-icon svg-icon-md">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Code/Warning-1-circle.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
																		<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"></rect>
																		<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"></rect>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Delete">
															<span class="svg-icon svg-icon-md">
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
														<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Mark as read">
															<span class="svg-icon svg-icon-md">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Duplicate.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																		<path d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
														<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Move">
															<span class="svg-icon svg-icon-md">
																<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Files/Media-folder.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"></path>
																		<path d="M10.782158,17.5100514 L15.1856088,14.5000448 C15.4135806,14.3442132 15.4720618,14.0330791 15.3162302,13.8051073 C15.2814587,13.7542388 15.2375842,13.7102355 15.1868178,13.6753149 L10.783367,10.6463273 C10.5558531,10.489828 10.2445489,10.5473967 10.0880496,10.7749107 C10.0307022,10.8582806 10,10.9570884 10,11.0582777 L10,17.097272 C10,17.3734143 10.2238576,17.597272 10.5,17.597272 C10.6006894,17.597272 10.699033,17.566872 10.782158,17.5100514 Z" fill="#000000"></path>
																	</g>
																</svg>
																<!--end::Svg Icon-->
															</span>
														</span>
													</div>
												</div>
												<!--end::Toolbar-->
												<!--begin::Search-->
												<div class="col-xxl-3 d-flex order-1 order-xxl-2 align-items-center justify-content-center">
													<div class="input-group input-group-lg input-group-solid my-2">
														<input type="text" class="form-control pl-4" placeholder="Search...">
														<div class="input-group-append">
															<span class="input-group-text pr-3">
																<span class="svg-icon svg-icon-lg">
																	<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Search.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"></rect>
																			<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																			<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</span>
														</div>
													</div>
												</div>
												<!--end::Search-->
												<!--begin::Pagination-->
												<div class="col-12 col-sm-6 col-xxl-4 order-2 order-xxl-3 d-flex align-items-center justify-content-sm-end text-right my-2">
													<!--begin::Per Page Dropdown-->
													<div class="d-flex align-items-center mr-2" data-toggle="tooltip" title="" data-original-title="Records per page">
														<span class="text-muted font-weight-bold mr-2" data-toggle="dropdown">1 - 50 of 235</span>
														<div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-sm">
															<ul class="navi py-3">
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">20 per page</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link active">
																		<span class="navi-text">50 par page</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">100 per page</span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<!--end::Per Page Dropdown-->
													<!--begin::Arrow Buttons-->
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Previose page">
														<i class="ki ki-bold-arrow-back icon-sm"></i>
													</span>
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Next page">
														<i class="ki ki-bold-arrow-next icon-sm"></i>
													</span>
													<!--end::Arrow Buttons-->
													<!--begin::Sort Dropdown-->
													<div class="dropdown mr-2" data-toggle="tooltip" title="" data-original-title="Sort">
														<span class="btn btn-default btn-icon btn-sm" data-toggle="dropdown">
															<i class="flaticon2-console icon-1x"></i>
														</span>
														<div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-sm">
															<ul class="navi py-3">
																<li class="navi-item">
																	<a href="#" class="navi-link active">
																		<span class="navi-text">Newest</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">Olders</span>
																	</a>
																</li>
																<li class="navi-item">
																	<a href="#" class="navi-link">
																		<span class="navi-text">Unread</span>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<!--end::Sort Dropdown-->
													<!--begin::Options Dropdown-->
													<div class="dropdown" data-toggle="tooltip" title="" data-original-title="Settings">
														<span class="btn btn-default btn-icon btn-sm" data-toggle="dropdown">
															<i class="ki ki-bold-more-hor icon-1x"></i>
														</span>
														<div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-md">
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
													<!--end::Options Dropdown-->
												</div>
												<!--end::Pagination-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body table-responsive px-0">
												<!--begin::Items-->
												<div class="list list-hover min-w-500px" data-inbox="list">
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_13.jpg')"></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Sean Paul</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Digital PPV Customer Confirmation -</span>
																<span class="text-muted">Thank you for ordering UFC 240 Holloway vs Edgar Alternate camera angles...</span>
															</div>
															<div class="mt-2">
																<span class="label label-light-primary font-weight-bold label-inline mr-1">inbox</span>
																<span class="label label-light-danger font-weight-bold label-inline">task</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-bolder w-50px text-right" data-toggle="view">8:30 PM</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<div class="symbol symbol-light-danger symbol-35 mr-3">
																	<span class="symbol-label font-weight-bolder">OJ</span>
																</div>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Oliver Jake</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Your iBuy.com grocery shopping confirmation -</span>
																<span class="text-muted">Please make sure that you have one of the following cards with you when we deliver your order...</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-bolder w-100px text-right" data-toggle="view">day ago</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<div class="symbol symbol-light-primary symbol-35 mr-3">
																	<span class="symbol-label font-weight-bolder">EF</span>
																</div>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Enrico Fermi</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Your Order #224820998666029 has been Confirmed -</span>
																<span class="text-muted">Your Order #224820998666029 has been placed on Saturday, 29 June</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">11:20PM</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_2.jpg')"></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Jane Goodall</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Payment Notification DLOP2329KD -</span>
																<span class="text-muted">Your payment of 4500USD to AirCar has been authorized and confirmed, thank you your account. This...</span>
															</div>
															<div class="mt-2">
																<span class="label label-light-danger font-weight-bold label-inline">new</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">2 days ago</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<div class="symbol symbol-light-success symbol-35 mr-3">
																	<span class="symbol-label font-weight-bolder">MP</span>
																</div>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Max O'Brien Planck</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Congratulations on your iRun Coach subscription -</span>
																<span class="text-muted">Congratulations on your iRun Coach subscription. You made no space for excuses and you</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">July 25</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_4.jpg')"></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Rita Levi-Montalcini</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Pay bills &amp; win up to 600$ Cashback! -</span>
																<span class="text-muted">Congratulations on your iRun Coach subscription. You made no space for excuses and you decided on a healthier and happier life...</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">July 24</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_5.jpg')"></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Stephen Hawking</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Activate your LIPO Account today -</span>
																<span class="text-muted">Thank you for creating a LIPO Account. Please click the link below to activate your account.</span>
															</div>
															<div class="mt-2">
																<span class="label label-light-warning font-weight-bold label-inline mr-2">task</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">July 13</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<div class="symbol symbol-light symbol-35 mr-3">
																	<span class="symbol-label text-dark-75 font-weight-bolder">WE</span>
																</div>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Wolfgang Ernst Pauli</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">About your request for PalmLake -</span>
																<span class="text-muted">What you requested can't be arranged ahead of time but PalmLake said they'll do their best to accommodate you upon arrival....</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-bold text-muted w-100px text-right" data-toggle="view">25 May</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_6.jpg')"></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Patty Jo Watson</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Welcome, Patty -</span>
																<span class="text-muted">Discover interesting ideas and unique perspectives. Read, explore and follow your interests. Get personalized recommendations delivered to you....</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">July 24</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_8.jpg')"></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Blaise Pascal</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Free Video Marketing Guide -</span>
																<span class="text-muted">Video has rolled into every marketing platform or channel, leaving...</span>
															</div>
															<div class="mt-2">
																<span class="label label-light-success font-weight-bold label-inline">project</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">July 13</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<div class="symbol symbol-light-warning symbol-35 mr-3">
																	<span class="symbol-label font-weight-bolder">RO</span>
																</div>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Roberts O'Neill Wilson</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Your iBuy.com grocery shopping confirmation -</span>
																<span class="text-muted">Please make sure that you have one of the following cards with you when we deliver your order...</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-bolder w-100px text-right" data-toggle="view">day ago</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs text-hover-warning" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<div class="symbol symbol-light-primary symbol-35 mr-3">
																	<span class="symbol-label font-weight-bolder">EF</span>
																</div>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Enrico Fermi</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Your Order #224820998666029 has been Confirmed -</span>
																<span class="text-muted">Your Order #224820998666029 has been placed on Saturday, 29 June</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">11:20PM</div>
														<!--end::Datetime-->
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex align-items-start list-item card-spacer-x py-3" data-inbox="message">
														<!--begin::Toolbar-->
														<div class="d-flex align-items-center">
															<!--begin::Actions-->
															<div class="d-flex align-items-center mr-3" data-inbox="actions">
																<label class="checkbox checkbox-inline checkbox-primary flex-shrink-0 mr-3">
																	<input type="checkbox">
																	<span></span>
																</label>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Star">
																	<i class="flaticon-star text-muted"></i>
																</a>
																<a href="#" class="btn btn-icon btn-xs btn-hover-text-warning active" data-toggle="tooltip" data-placement="right" title="" data-original-title="Mark as important">
																	<i class="flaticon-add-label-button text-muted"></i>
																</a>
															</div>
															<!--end::Actions-->
															<!--begin::Author-->
															<div class="d-flex align-items-center flex-wrap w-xxl-200px mr-3" data-toggle="view">
																<span class="symbol symbol-35 mr-3">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_10.jpg')"></span>
																</span>
																<a href="#" class="font-weight-bold text-dark-75 text-hover-primary">Jane Goodall</a>
															</div>
															<!--end::Author-->
														</div>
														<!--end::Toolbar-->
														<!--begin::Info-->
														<div class="flex-grow-1 mt-2 mr-2" data-toggle="view">
															<div>
																<span class="font-weight-bolder font-size-lg mr-2">Payment Notification DLOP2329KD -</span>
																<span class="text-muted">Your payment of 4500USD to AirCar has been authorized and confirmed, thank you your account. This...</span>
															</div>
														</div>
														<!--end::Info-->
														<!--begin::Datetime-->
														<div class="mt-2 mr-3 font-weight-normal w-100px text-right text-muted" data-toggle="view">2 days ago</div>
														<!--end::Datetime-->
													</div>
												</div>
												<!--end::Items-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::List-->

									<!--begin::View-->
									<div class="flex-row-fluid ml-lg-8 d-none" id="kt_inbox_view">
										<!--begin::Card-->
										<div class="card card-custom card-stretch">
											<!--begin::Header-->
											<div class="card-header align-items-center flex-wrap justify-content-between py-5 h-auto">
												<!--begin::Left-->
												<div class="d-flex align-items-center my-2">
													<a href="#" class="btn btn-clean btn-icon btn-sm mr-6" data-inbox="back">
														<i class="flaticon2-left-arrow-1"></i>
													</a>
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Archive">
														<span class="svg-icon svg-icon-md">
															<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Mail-opened.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
																	<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
													</span>
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Spam">
														<span class="svg-icon svg-icon-md">
															<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Code/Warning-1-circle.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
																	<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"></rect>
																	<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"></rect>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
													</span>
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Delete">
														<span class="svg-icon svg-icon-md">
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
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Mark as read">
														<span class="svg-icon svg-icon-md">
															<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Duplicate.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																	<path d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z" fill="#000000"></path>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
													</span>
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Move">
														<span class="svg-icon svg-icon-md">
															<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Files/Media-folder.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"></path>
																	<path d="M10.782158,17.5100514 L15.1856088,14.5000448 C15.4135806,14.3442132 15.4720618,14.0330791 15.3162302,13.8051073 C15.2814587,13.7542388 15.2375842,13.7102355 15.1868178,13.6753149 L10.783367,10.6463273 C10.5558531,10.489828 10.2445489,10.5473967 10.0880496,10.7749107 C10.0307022,10.8582806 10,10.9570884 10,11.0582777 L10,17.097272 C10,17.3734143 10.2238576,17.597272 10.5,17.597272 C10.6006894,17.597272 10.699033,17.566872 10.782158,17.5100514 Z" fill="#000000"></path>
																</g>
															</svg>
															<!--end::Svg Icon-->
														</span>
													</span>
												</div>
												<!--end::Left-->
												<!--begin::Right-->
												<div class="d-flex align-items-center justify-content-end text-right my-2">
													<span class="text-muted font-weight-bold mr-4" data-toggle="dropdown">1 - 50 of 235</span>
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Previose message">
														<i class="ki ki-bold-arrow-back icon-sm"></i>
													</span>
													<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="" data-original-title="Next message">
														<i class="ki ki-bold-arrow-next icon-sm"></i>
													</span>
													<div class="dropdown" data-toggle="tooltip" title="" data-original-title="Settings">
														<span class="btn btn-default btn-icon btn-sm" data-toggle="dropdown">
															<i class="ki ki-bold-more-hor icon-1x"></i>
														</span>
														<div class="dropdown-menu dropdown-menu-right p-0 m-0 dropdown-menu-md">
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
												</div>
												<!--end::Right-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body p-0">
												<!--begin::Header-->
												<div class="d-flex align-items-center justify-content-between flex-wrap card-spacer-x py-5">
													<!--begin::Title-->
													<div class="d-flex align-items-center mr-2 py-2">
														<div class="font-weight-bold font-size-h3 mr-3">Trip Reminder. Thank you for flying with us!</div>
														<span class="label label-light-primary font-weight-bold label-inline mr-2">inbox</span>
														<span class="label label-light-danger font-weight-bold label-inline">important</span>
													</div>
													<!--end::Title-->
													<!--begin::Toolbar-->
													<div class="d-flex py-2">
														<span class="btn btn-default btn-sm btn-icon mr-2">
															<i class="flaticon2-sort"></i>
														</span>
														<span class="btn btn-default btn-sm btn-icon" data-dismiss="modal">
															<i class="flaticon2-fax"></i>
														</span>
													</div>
													<!--end::Toolbar-->
												</div>
												<!--end::Header-->
												<!--begin::Messages-->
												<div class="mb-3">
													<div class="cursor-pointer shadow-xs toggle-on" data-inbox="message">
														<!--begin::Message Heading-->
														<div class="d-flex card-spacer-x py-6 flex-column flex-md-row flex-lg-column flex-xxl-row justify-content-between">
															<div class="d-flex align-items-center">
																<span class="symbol symbol-50 mr-4">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_13.jpg')"></span>
																</span>
																<div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
																	<div class="d-flex">
																		<a href="#" class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">Chris Muller</a>
																		<div class="font-weight-bold text-muted">
																		<span class="label label-success label-dot mr-2"></span>1 Day ago</div>
																	</div>
																	<div class="d-flex flex-column">
																		<div class="toggle-off-item">
																			<span class="font-weight-bold text-muted cursor-pointer" data-toggle="dropdown">to me 
																			<i class="flaticon2-down icon-xs ml-1 text-dark-50"></i></span>
																			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-left p-5">
																				<table>
																					<tbody><tr>
																						<td class="text-muted min-w-75px py-2">From</td>
																						<td>Mark Andre</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Date:</td>
																						<td>Jul 30, 2019, 11:27 PM</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Subject:</td>
																						<td>Trip Reminder. Thank you for flying with us!</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Reply to:</td>
																						<td>mark.andre@gmail.com</td>
																					</tr>
																				</tbody></table>
																			</div>
																		</div>
																		<div class="text-muted font-weight-bold toggle-on-item" data-inbox="toggle">With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part....</div>
																	</div>
																</div>
															</div>
															<div class="d-flex my-2 my-xxl-0 align-items-md-center align-items-lg-start align-items-xxl-center flex-column flex-md-row flex-lg-column flex-xxl-row">
																<div class="font-weight-bold text-muted mx-2">Jul 15, 2019, 11:19AM</div>
																<div class="d-flex align-items-center flex-wrap flex-xxl-nowrap" data-inbox="toolbar">
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Star">
																		<i class="flaticon-star icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important">
																		<i class="flaticon-add-label-button icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reply">
																		<i class="flaticon2-reply-1 icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
																		<i class="flaticon-more icon-1x"></i>
																	</span>
																</div>
															</div>
														</div>
														<!--end::Message Heading-->
														<div class="card-spacer-x py-3 toggle-off-item">
															<p>Hi Bob,</p>
															<p>With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.</p>
															<p>Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang</p>
															<p>Best regards,</p>
															<p>Jason Muller</p>
														</div>
													</div>
													<div class="cursor-pointer shadow-xs toggle-off" data-inbox="message">
														<!--begin::Message Heading-->
														<div class="d-flex card-spacer-x py-6 flex-column flex-md-row flex-lg-column flex-xxl-row justify-content-between">
															<div class="d-flex align-items-center">
																<span class="symbol symbol-50 mr-4" data-toggle="expand">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_11.jpg')"></span>
																</span>
																<div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
																	<div class="d-flex" data-toggle="expand">
																		<a href="#" class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">Lina Nilson</a>
																		<div class="font-weight-bold text-muted">
																		<span class="label label-success label-dot mr-2"></span>2 Day ago</div>
																	</div>
																	<div class="d-flex flex-column">
																		<div class="toggle-off-item">
																			<span class="font-weight-bold text-muted cursor-pointer" data-toggle="dropdown">to me 
																			<i class="flaticon2-down icon-xs ml-1 text-dark-50"></i></span>
																			<div class="dropdown-menu dropdown-menu-md dropdown-menu-left p-5">
																				<table>
																					<tbody><tr>
																						<td class="text-muted w-75px py-2">From</td>
																						<td>Mark Andre</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Date:</td>
																						<td>Jul 30, 2019, 11:27 PM</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Subject:</td>
																						<td>Trip Reminder. Thank you for flying with us!</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Reply to:</td>
																						<td>mark.andre@gmail.com</td>
																					</tr>
																				</tbody></table>
																			</div>
																		</div>
																		<div class="text-muted font-weight-bold toggle-on-item" data-toggle="expand">Jornalists call this critical, introductory section the "Lede," and when bridge properly executed....</div>
																	</div>
																</div>
															</div>
															<div class="d-flex my-2 my-xxl-0 align-items-md-center align-items-lg-start align-items-xxl-center flex-column flex-md-row flex-lg-column flex-xxl-row">
																<div class="font-weight-bold text-muted mx-2" data-toggle="expand">Jul 20, 2019, 03:20PM</div>
																<div class="d-flex align-items-center flex-wrap flex-xxl-nowrap">
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Star">
																		<i class="flaticon-star icon-1x text-warning"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important">
																		<i class="flaticon-add-label-button icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reply">
																		<i class="flaticon2-reply-1 icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
																		<i class="flaticon-more icon-1x"></i>
																	</span>
																</div>
															</div>
														</div>
														<!--end::Message Heading-->
														<div class="card-spacer-x py-3 toggle-off-item">
															<p>Hi Bob,</p>
															<p>With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.</p>
															<p>Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang</p>
															<p>Best regards,</p>
															<p>Jason Muller</p>
														</div>
													</div>
													<div class="cursor-pointer shadow-xs toggle-off" data-inbox="message">
														<!--begin::Message Heading-->
														<div class="d-flex card-spacer-x py-6 flex-column flex-md-row flex-lg-column flex-xxl-row justify-content-between">
															<div class="d-flex align-items-center">
																<span class="symbol symbol-50 mr-4" data-toggle="expand">
																	<span class="symbol-label" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/users/100_14.jpg')"></span>
																</span>
																<div class="d-flex flex-column flex-grow-1 flex-wrap mr-2">
																	<div class="d-flex" data-toggle="expand">
																		<a href="#" class="font-size-lg font-weight-bolder text-dark-75 text-hover-primary mr-2">Sean Stone</a>
																		<div class="font-weight-bold text-muted">
																		<span class="label label-success label-dot mr-2"></span>1 Day ago</div>
																	</div>
																	<div class="d-flex flex-column">
																		<div class="toggle-off-item">
																			<span class="font-weight-bold text-muted cursor-pointer" data-toggle="dropdown">to me 
																			<i class="flaticon2-down icon-xs ml-1 text-dark-50"></i></span>
																			<div class="dropdown-menu dropdown-menu-md dropdown-menu-left p-5">
																				<table>
																					<tbody><tr>
																						<td class="text-muted w-75px py-2">From</td>
																						<td>Mark Andre</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Date:</td>
																						<td>Jul 30, 2019, 11:27 PM</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Subject:</td>
																						<td>Trip Reminder. Thank you for flying with us!</td>
																					</tr>
																					<tr>
																						<td class="text-muted py-2">Reply to:</td>
																						<td>mark.andre@gmail.com</td>
																					</tr>
																				</tbody></table>
																			</div>
																		</div>
																		<div class="text-muted font-weight-bold toggle-on-item" data-toggle="expand">With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part....</div>
																	</div>
																</div>
															</div>
															<div class="d-flex my-2 my-xxl-0 align-items-md-center align-items-lg-start align-items-xxl-center flex-column flex-md-row flex-lg-column flex-xxl-row">
																<div class="font-weight-bold text-muted mx-2" data-toggle="expand">Jul 15, 2019, 11:19AM</div>
																<div class="d-flex align-items-center flex-wrap flex-xxl-nowrap">
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Star">
																		<i class="flaticon-star icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark as important">
																		<i class="flaticon-add-label-button icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Reply">
																		<i class="flaticon2-reply-1 icon-1x"></i>
																	</span>
																	<span class="btn btn-clean btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
																		<i class="flaticon-more icon-1x"></i>
																	</span>
																</div>
															</div>
														</div>
														<!--end::Message Heading-->
														<div class="card-spacer-x py-3 toggle-off-item">
															<p>Hi Bob,</p>
															<p>With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part of any article is the title.Without a compelleing title, your reader won't even get to the first sentence.After the title, however, the first few sentences of your article are certainly the most important part.</p>
															<p>Jornalists call this critical, introductory section the "Lede," and when bridge properly executed, it's the that carries your reader from an headine try at attention-grabbing to the body of your blog post, if you want to get it right on of these 10 clever ways to omen your next blog posr with a bang</p>
															<p>Best regards,</p>
															<p>Jason Muller</p>
														</div>
													</div>
												</div>
												<!--end::Messages-->
												<!--begin::Reply-->
												<div class="card-spacer mb-3" id="kt_inbox_reply">
													<div class="card card-custom shadow-sm">
														<div class="card-body p-0">
															<!--begin::Form-->
															<form id="kt_inbox_reply_form">
																<!--begin::Body-->
																<div class="d-block">
																	<!--begin::To-->
																	<div class="d-flex align-items-center border-bottom inbox-to px-8 min-h-50px">
																		<div class="text-dark-50 w-75px">To:</div>
																		<div class="d-flex align-items-center flex-grow-1">
																			<tags class="tagify form-control border-0" tabindex="-1">
            <tag title="Chris Muller" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" pic="./assets/media/users/100_11.jpg" initialsstate="" initials="" email="chris.muller@wix.com" value="Chris Muller"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">Chris Muller</span></div></tag><tag title="Lina Nilson" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" pic="./assets/media/users/100_15.jpg" initialsstate="danger" initials="LN" email="lina.nilson@loop.com" value="Lina Nilson"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">Lina Nilson</span></div></tag><span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
        </tags><input type="text" class="form-control border-0" name="compose_to" value="Chris Muller, Lina Nilson">
																		</div>
																		<div class="ml-2">
																			<span class="text-muted font-weight-bold cursor-pointer text-hover-primary mr-2" data-inbox="cc-show">Cc</span>
																			<span class="text-muted font-weight-bold cursor-pointer text-hover-primary" data-inbox="bcc-show">Bcc</span>
																		</div>
																	</div>
																	<!--end::To-->
																	<!--begin::CC-->
																	<div class="d-none align-items-center border-bottom inbox-to-cc pl-8 pr-5 min-h-50px">
																		<div class="text-dark-50 w-75px">Cc:</div>
																		<div class="flex-grow-1">
																			<tags class="tagify form-control border-0 tagify--noTags tagify--empty" tabindex="-1">
            <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
        </tags><input type="text" class="form-control border-0" name="compose_cc" value="">
																		</div>
																		<span class="btn btn-clean btn-xs btn-icon" data-inbox="cc-hide">
																			<i class="la la-close"></i>
																		</span>
																	</div>
																	<!--end::CC-->
																	<!--begin::BCC-->
																	<div class="d-none align-items-center border-bottom inbox-to-bcc pl-8 pr-5 min-h-50px">
																		<div class="text-dark-50 w-75px">Bcc:</div>
																		<div class="flex-grow-1">
																			<tags class="tagify form-control border-0 tagify--noTags tagify--empty" tabindex="-1">
            <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
        </tags><input type="text" class="form-control border-0" name="compose_bcc" value="">
																		</div>
																		<span class="btn btn-clean btn-xs btn-icon" data-inbox="bcc-hide">
																			<i class="la la-close"></i>
																		</span>
																	</div>
																	<!--end::BCC-->
																	<!--begin::Subject-->
																	<div class="border-bottom">
																		<input class="form-control border-0 px-8 min-h-45px" name="compose_subject" placeholder="Subject">
																	</div>
																	<!--end::Subject-->
																	<!--begin::Message-->
																	<div class="ql-toolbar ql-snow px-5 border-top-0 border-left-0 border-right-0"><span class="ql-formats"><span class="ql-header ql-picker"><span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-0"><svg viewBox="0 0 18 18"> <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon> <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon> </svg></span><span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-0"><span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="3"></span><span tabindex="0" role="button" class="ql-picker-item ql-selected"></span></span></span><select class="ql-header" style="display: none;"><option value="1"></option><option value="2"></option><option value="3"></option><option selected="selected"></option></select></span><span class="ql-formats"><button type="button" class="ql-bold"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button><button type="button" class="ql-underline"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button><button type="button" class="ql-link"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button></span><span class="ql-formats"><button type="button" class="ql-list" value="ordered"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button><button type="button" class="ql-list" value="bullet"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button></span><span class="ql-formats"><button type="button" class="ql-clean"><svg class="" viewBox="0 0 18 18"> <line class="ql-stroke" x1="5" x2="13" y1="3" y2="3"></line> <line class="ql-stroke" x1="6" x2="9.35" y1="12" y2="3"></line> <line class="ql-stroke" x1="11" x2="15" y1="11" y2="15"></line> <line class="ql-stroke" x1="15" x2="11" y1="11" y2="15"></line> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="7" x="2" y="14"></rect> </svg></button></span></div><div id="kt_inbox_reply_editor" class="border-0 ql-container ql-snow" style="height: 250px"><div class="ql-editor ql-blank px-8" data-gramm="false" contenteditable="true" data-placeholder="Type message..."><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
																	<!--end::Message-->
																	<!--begin::Attachments-->
																	<div class="dropzone dropzone-multi px-8 py-4" id="kt_inbox_reply_attachments">
																		<div class="dropzone-items">
																			
																		</div>
																	<div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div></div>
																	<!--end::Attachments-->
																</div>
																<!--end::Body-->
																<!--begin::Footer-->
																<div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-top">
																	<!--begin::Actions-->
																	<div class="d-flex align-items-center mr-3">
																		<!--begin::Send-->
																		<div class="btn-group mr-4">
																			<span class="btn btn-primary font-weight-bold px-6">Send</span>
																			<span class="btn btn-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"></span>
																			<div class="dropdown-menu dropdown-menu-sm dropup p-0 m-0 dropdown-menu-right">
																				<ul class="navi py-3">
																					<li class="navi-item">
																						<a href="#" class="navi-link">
																							<span class="navi-icon">
																								<i class="flaticon2-writing"></i>
																							</span>
																							<span class="navi-text">Schedule Send</span>
																						</a>
																					</li>
																					<li class="navi-item">
																						<a href="#" class="navi-link">
																							<span class="navi-icon">
																								<i class="flaticon2-medical-records"></i>
																							</span>
																							<span class="navi-text">Save &amp; archive</span>
																						</a>
																					</li>
																					<li class="navi-item">
																						<a href="#" class="navi-link">
																							<span class="navi-icon">
																								<i class="flaticon2-hourglass-1"></i>
																							</span>
																							<span class="navi-text">Cancel</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</div>
																		<!--end::Send-->
																		<!--begin::Other-->
																		<span class="btn btn-icon btn-sm btn-clean mr-2 dz-clickable" id="kt_inbox_reply_attachments_select">
																			<i class="flaticon2-clip-symbol"></i>
																		</span>
																		<span class="btn btn-icon btn-sm btn-clean">
																			<i class="flaticon2-pin"></i>
																		</span>
																		<!--end::Other-->
																	</div>
																	<!--end::Actions-->
																	<!--begin::Toolbar-->
																	<div class="d-flex align-items-center">
																		<span class="btn btn-icon btn-sm btn-clean mr-2" data-toggle="tooltip" title="" data-original-title="More actions">
																			<i class="flaticon2-settings"></i>
																		</span>
																		<span class="btn btn-icon btn-sm btn-clean" data-inbox="dismiss" data-toggle="tooltip" title="" data-original-title="Dismiss reply">
																			<i class="flaticon2-rubbish-bin-delete-button"></i>
																		</span>
																	</div>
																	<!--end::Toolbar-->
																</div>
																<!--end::Footer-->
															</form>
															<!--end::Form-->
														</div>
													</div>
												</div>
												<!--end::Reply-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Card-->
									</div>
									<!--end::View-->
								</div>
								<!--end::Inbox-->
								<!--begin::Compose-->
								<div class="modal modal-sticky modal-sticky-lg modal-sticky-bottom-right" id="kt_inbox_compose" role="dialog" data-backdrop="false">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<!--begin::Form-->
											<form id="kt_inbox_compose_form">
												<!--begin::Header-->
												<div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-bottom">
													<h5 class="font-weight-bold m-0">Compose</h5>
													<div class="d-flex ml-2">
														<span class="btn btn-clean btn-sm btn-icon mr-2">
															<i class="flaticon2-arrow-1 icon-1x"></i>
														</span>
														<span class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
															<i class="ki ki-close icon-1x"></i>
														</span>
													</div>
												</div>
												<!--end::Header-->
												<!--begin::Body-->
												<div class="d-block">
													<!--begin::To-->
													<div class="d-flex align-items-center border-bottom inbox-to px-8 min-h-45px">
														<div class="text-dark-50 w-75px">To:</div>
														<div class="d-flex align-items-center flex-grow-1">
															<tags class="tagify form-control border-0" tabindex="-1">
            <tag title="Chris Muller" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" pic="./assets/media/users/100_11.jpg" initialsstate="" initials="" email="chris.muller@wix.com" value="Chris Muller"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">Chris Muller</span></div></tag><tag title="Lina Nilson" contenteditable="false" spellcheck="false" tabindex="-1" class="tagify__tag tagify__tag--primary tagify--noAnim" __isvalid="true" pic="./assets/media/users/100_15.jpg" initialsstate="danger" initials="LN" email="lina.nilson@loop.com" value="Lina Nilson"><x title="" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x><div><span class="tagify__tag-text">Lina Nilson</span></div></tag><span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
        </tags><input type="text" class="form-control border-0" name="compose_to" value="Chris Muller, Lina Nilson">
														</div>
														<div class="ml-2">
															<span class="text-muted font-weight-bold cursor-pointer text-hover-primary mr-2" data-inbox="cc-show">Cc</span>
															<span class="text-muted font-weight-bold cursor-pointer text-hover-primary" data-inbox="bcc-show">Bcc</span>
														</div>
													</div>
													<!--end::To-->
													<!--begin::CC-->
													<div class="d-none align-items-center border-bottom inbox-to-cc pl-8 pr-5 min-h-45px">
														<div class="text-dark-50 w-75px">Cc:</div>
														<div class="flex-grow-1">
															<tags class="tagify form-control border-0 tagify--noTags tagify--empty" tabindex="-1">
            <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
        </tags><input type="text" class="form-control border-0" name="compose_cc" value="">
														</div>
														<span class="btn btn-clean btn-xs btn-icon" data-inbox="cc-hide">
															<i class="la la-close"></i>
														</span>
													</div>
													<!--end::CC-->
													<!--begin::BCC-->
													<div class="d-none align-items-center border-bottom inbox-to-bcc pl-8 pr-5 min-h-45px">
														<div class="text-dark-50 w-75px">Bcc:</div>
														<div class="flex-grow-1">
															<tags class="tagify form-control border-0 tagify--noTags tagify--empty" tabindex="-1">
            <span contenteditable="" data-placeholder="​" aria-placeholder="" class="tagify__input" role="textbox" aria-autocomplete="both" aria-multiline="false"></span>
        </tags><input type="text" class="form-control border-0" name="compose_bcc" value="">
														</div>
														<span class="btn btn-clean btn-xs btn-icon" data-inbox="bcc-hide">
															<i class="la la-close"></i>
														</span>
													</div>
													<!--end::BCC-->
													<!--begin::Subject-->
													<div class="border-bottom">
														<input class="form-control border-0 px-8 min-h-45px" name="compose_subject" placeholder="Subject">
													</div>
													<!--end::Subject-->
													<!--begin::Message-->
													<div class="ql-toolbar ql-snow px-5 border-top-0 border-left-0 border-right-0"><span class="ql-formats"><span class="ql-header ql-picker"><span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-1"><svg viewBox="0 0 18 18"> <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon> <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon> </svg></span><span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-1"><span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="3"></span><span tabindex="0" role="button" class="ql-picker-item ql-selected"></span></span></span><select class="ql-header" style="display: none;"><option value="1"></option><option value="2"></option><option value="3"></option><option selected="selected"></option></select></span><span class="ql-formats"><button type="button" class="ql-bold"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button><button type="button" class="ql-italic"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button><button type="button" class="ql-underline"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button><button type="button" class="ql-link"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line> <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path> <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path> </svg></button></span><span class="ql-formats"><button type="button" class="ql-list" value="ordered"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line> <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line> <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path> <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path> <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path> </svg></button><button type="button" class="ql-list" value="bullet"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line> <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line> <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line> <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line> <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line> <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line> </svg></button></span><span class="ql-formats"><button type="button" class="ql-clean"><svg class="" viewBox="0 0 18 18"> <line class="ql-stroke" x1="5" x2="13" y1="3" y2="3"></line> <line class="ql-stroke" x1="6" x2="9.35" y1="12" y2="3"></line> <line class="ql-stroke" x1="11" x2="15" y1="11" y2="15"></line> <line class="ql-stroke" x1="15" x2="11" y1="11" y2="15"></line> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="7" x="2" y="14"></rect> </svg></button></span></div><div id="kt_inbox_compose_editor" class="border-0 ql-container ql-snow" style="height: 250px"><div class="ql-editor ql-blank px-8" data-gramm="false" contenteditable="true" data-placeholder="Type message..."><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
													<!--end::Message-->
													<!--begin::Attachments-->
													<div class="dropzone dropzone-multi px-8 py-4" id="kt_inbox_compose_attachments">
														<div class="dropzone-items">
															
														</div>
													<div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here to upload</button></div></div>
													<!--end::Attachments-->
												</div>
												<!--end::Body-->
												<!--begin::Footer-->
												<div class="d-flex align-items-center justify-content-between py-5 pl-8 pr-5 border-top">
													<!--begin::Actions-->
													<div class="d-flex align-items-center mr-3">
														<!--begin::Send-->
														<div class="btn-group mr-4">
															<span class="btn btn-primary font-weight-bold px-6">Send</span>
															<span class="btn btn-primary font-weight-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"></span>
															<div class="dropdown-menu dropdown-menu-sm dropup p-0 m-0 dropdown-menu-right">
																<ul class="navi py-3">
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-icon">
																				<i class="flaticon2-writing"></i>
																			</span>
																			<span class="navi-text">Schedule Send</span>
																		</a>
																	</li>
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-icon">
																				<i class="flaticon2-medical-records"></i>
																			</span>
																			<span class="navi-text">Save &amp; archive</span>
																		</a>
																	</li>
																	<li class="navi-item">
																		<a href="#" class="navi-link">
																			<span class="navi-icon">
																				<i class="flaticon2-hourglass-1"></i>
																			</span>
																			<span class="navi-text">Cancel</span>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
														<!--end::Send-->
														<!--begin::Other-->
														<span class="btn btn-icon btn-sm btn-clean mr-2 dz-clickable" id="kt_inbox_compose_attachments_select">
															<i class="flaticon2-clip-symbol"></i>
														</span>
														<span class="btn btn-icon btn-sm btn-clean">
															<i class="flaticon2-pin"></i>
														</span>
														<!--end::Other-->
													</div>
													<!--end::Actions-->
													<!--begin::Toolbar-->
													<div class="d-flex align-items-center">
														<span class="btn btn-icon btn-sm btn-clean mr-2" data-toggle="tooltip" title="" data-original-title="More actions">
															<i class="flaticon2-settings"></i>
														</span>
														<span class="btn btn-icon btn-sm btn-clean" data-inbox="dismiss" data-toggle="tooltip" title="" data-original-title="Dismiss reply">
															<i class="flaticon2-rubbish-bin-delete-button"></i>
														</span>
													</div>
													<!--end::Toolbar-->
												</div>
												<!--end::Footer-->
											</form>
											<!--end::Form-->
										</div>
									</div>
								</div>
								<!--end::Compose-->
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
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">User Profile 
				<small class="text-muted font-size-sm ml-2">12 messages</small></h3>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<!--begin::Header-->
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-100 mr-5">
						<div class="symbol-label" style="background-image:url('../theme/html/demo2/dist/assets/media/users/300_21.jpg')"></div>
						<i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">James Jones</a>
						<div class="text-muted mt-1">Application Developer</div>
						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>
								</span>
							</a>
							<a href="#" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
						</div>
					</div>
				</div>
				<!--end::Header-->
		
			</div>
			<!--end::Content-->
		</div>
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


	






    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src=" assets/theme/html/demo2/dist/assets/plugins/global/plugins.bundlef552.js?v=7.1.8 "></script>
    <script src=" assets/theme/html/demo2/dist/assets/plugins/custom/prismjs/prismjs.bundlef552.js?v=7.1.8  "></script>
    <script src=" assets/theme/html/demo2/dist/assets/js/scripts.bundlef552.js?v=7.1.8  "></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src=" assets/theme/html/demo2/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundlef552.js?v=7.1.8  "></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src=" assets/theme/html/demo2/dist/assets/js/pages/widgetsf552.js?v=7.1.8 "></script>
    <!--end::Page Scripts-->




</body>
</html>



