<!-- Loader -->
<div id="preloader">
    <div id="status">
      <div class="spinner">

      </div>
    </div>
  </div>
  <div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
      <div class="topbar-main">
        <div class="container-fluid">
          <!-- Logo-->
          <div class="d-block d-lg-none mr-5">
            <a href="index" class="logo">
              <img src="assets/images/logo-sm.png" alt="" height="28" class="logo-small">
            </a>
          </div><!-- End Logo-->
          <div class="menu-extras topbar-custom navbar p-0">
            <ul class="list-inline flags-dropdown d-none d-lg-block mb-0">
              <li class="list-inline-item text-white-50 mr-3">
                <span class="font-13">Help : +012 3456 789</span>
              </li>
              <li class="list-inline-item text-white-50 mr-3"><i class="fa fa-folder"></i>
                <span style="margin-left: 5px;" class="font-13">Support Mail : eapproval@robi.com.bd</span>
              </li>
              <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle text-white-50 arrow-none waves-effect waves-light"
                  data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                  <img src="assets/images/flags/bd_flug.png" alt="" class="flag-img"> Bangladesh <i
                    class="mdi mdi-chevron-down"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated">
                  <a href="#" class="dropdown-item">
                    <img src="assets/images/flags/us_flag.jpg" alt="" class="flag-img"> United States
                  </a>
                  <a href="#" class="dropdown-item">
                    <img src="assets/images/flags/french_flag.jpg" alt="" class="flag-img"> French
                  </a>
                  <a href="#" class="dropdown-item">
                    <img src="assets/images/flags/germany_flag.jpg" alt="" class="flag-img"> Germany
                  </a>
                  <a href="#" class="dropdown-item">
                    <img src="assets/images/flags/italy_flag.jpg" alt="" class="flag-img"> Italy
                  </a>
                  <a href="#" class="dropdown-item">
                    <img src="assets/images/flags/spain_flag.jpg" alt="" class="flag-img"> Spain
                  </a>
                </div>
              </li>

              <li class="list-inline-item text-white-50 mr-3">
                <!-- Large modal -->
                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">Create new</button>
              </li>
            </ul><!-- Search input -->
            <div class="search-wrap" id="search-wrap">
              <div class="search-bar">
                <input class="search-input" type="search" placeholder="Search">
                <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                  <i class="mdi mdi-close-circle"></i>
                </a>
              </div>
            </div>
            <ul class="list-inline ml-auto mb-0">
              <!-- notification-->
              <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                  role="button" aria-haspopup="false" aria-expanded="false">
                  <i class="mdi mdi-bell-outline noti-icon"></i>
                  <span class="badge badge-info badge-pill noti-icon-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-arrow dropdown-menu-lg">
                  <!-- item-->
                  <div class="dropdown-item noti-title">
                    <h5>Notification (3)</h5>
                  </div>
                  <div class="slimscroll-noti">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                      <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                      <p class="notify-details"><b>Your order is placed</b>
                        <span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                      </p>
                    </a><!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i></div>
                      <p class="notify-details"><b>New Message received</b>
                        <span class="text-muted">You have 87 unread messages</span>
                      </p>
                    </a><!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                      <p class="notify-details"><b>Your item is shipped</b>
                        <span class="text-muted">It is a long established fact that a reader will</span>
                      </p>
                    </a><!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i></div>
                      <p class="notify-details"><b>New Message received</b>
                        <span class="text-muted">You have 87 unread messages</span>
                      </p>
                    </a><!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                      <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                      <p class="notify-details"><b>Your order is placed</b>
                        <span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                      </p>
                    </a>
                  </div><!-- All-->
                  <a href="javascript:void(0);" class="dropdown-item notify-all">View All</a>
                </div>
              </li><!-- User-->
              <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#"
                  role="button" aria-haspopup="false" aria-expanded="false">
                  <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle">
                  <span class="d-none d-md-inline-block ml-1"><?=$_SESSION['aActiveUsers']?><i class="mdi mdi-chevron-down"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                  <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                  <a class="dropdown-item" href="#">
                    <span class="badge badge-success float-right m-t-5">5</span>
                    <i class="dripicons-gear text-muted"></i> Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="controller/common.php?action=logout"><i class="dripicons-exit text-muted"></i> Logout</a>
                </div>
              </li>
              <li class="menu-item list-inline-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle nav-link">
                  <div class="lines"><span></span> <span></span> <span></span></div>
                </a><!-- End mobile menu toggle-->
              </li>
            </ul>
          </div><!-- end menu-extras -->
          <div class="clearfix"></div>
        </div><!-- end container -->
      </div><!-- end topbar-main -->
      <!-- MENU Start -->
      <div class="navbar-custom">
        <div class="container-fluid">
          <!-- Logo-->
          <div class="d-none d-lg-block">
            <!-- Text Logo
            <a href="index" class="logo">
                Robi
            </a>
              -->
            <!-- Image Logo -->
            <a href="index" class="logo">
              <!-- <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small"> -->
              <img src="assets/images/logo.png" alt="" height="35" width="70" class="logo-large">
            </a>
          </div><!-- End Logo-->
          <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
              <li class="has-submenu">
                <a href="index"><i class="dripicons-meter"></i>Dashboard</a>
              </li>
              <li class="has-submenu">
                <a href="#"><i class="mdi mdi-database"></i>eApproval <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                <ul class="submenu megamenu">
                  <li>
                    <ul>
                      <li><a href="ui-alerts.html">Alerts</a></li>
                      <li><a href="ui-badge.html">Badge</a></li>
                      <li><a href="ui-buttons.html">Buttons</a></li>
                      <li><a href="ui-cards.html">Cards</a></li>
                      <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                      <li><a href="ui-navs.html">Navs</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                      <li><a href="ui-modals.html">Modals</a></li>
                      <li><a href="ui-images.html">Images</a></li>
                      <li><a href="ui-progressbars.html">Progress Bars</a></li>
                      <li><a href="ui-lightbox.html">Lightbox</a></li>
                      <li><a href="ui-pagination.html">Pagination</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                      <li><a href="ui-carousel.html">Carousel</a></li>
                      <li><a href="ui-video.html">Video</a></li>
                      <li><a href="ui-typography.html">Typography</a></li>
                      <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                      <li><a href="ui-grid.html">Grid</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"><i class="mdi mdi-account"></i>User Management <i
                    class="mdi mdi-chevron-down mdi-drop"></i></a>
                <ul class="submenu">
                  <li class="has-submenu"><a href="#">Email</a>
                    <ul class="submenu">
                      <li><a href="email-inbox.html">Inbox</a></li>
                      <li><a href="email-read.html">Email Read</a></li>
                      <li><a href="email-compose.html">Email Compose</a></li>
                    </ul>
                  </li>
                  <li><a href="calendar.html">Calendar</a></li>
                  <li class="has-submenu"><a href="#">Forms</a>
                    <ul class="submenu">
                      <li><a href="form-elements.html">Form Elements</a></li>
                      <li><a href="form-validation.html">Form Validation</a></li>
                      <li><a href="form-advanced.html">Form Advanced</a></li>
                      <li><a href="form-editors.html">Form Editors</a></li>
                      <li><a href="form-uploads.html">Form File Upload</a></li>
                      <li><a href="form-mask.html">Form Mask</a></li>
                      <li><a href="form-summernote.html">Summernote</a></li>
                      <li><a href="form-xeditable.html">Form Xeditable</a></li>
                    </ul>
                  </li>
                  <li class="has-submenu"><a href="#">Icons</a>
                    <ul class="submenu">
                      <li><a href="icons-material.html">Material Design</a></li>
                      <li><a href="icons-ion.html">Ion Icons</a></li>
                      <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                      <li><a href="icons-themify.html">Themify Icons</a></li>
                      <li><a href="icons-dripicons.html">Dripicons</a></li>
                      <li><a href="icons-typicons.html">Typicons Icons</a></li>
                    </ul>
                  </li>
                  <li class="has-submenu"><a href="#">Charts</a>
                    <ul class="submenu">
                      <li><a href="charts-chartist.html">Chartist Chart</a></li>
                      <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                      <li><a href="charts-flot.html">Flot Chart</a></li>
                      <li><a href="charts-c3.html">C3 Chart</a></li>
                      <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                    </ul>
                  </li>
                  <li class="has-submenu"><a href="#">Tables</a>
                    <ul class="submenu">
                      <li><a href="tables-basic.html">Basic Tables</a></li>
                      <li><a href="tables-datatable.html">Data Table</a></li>
                      <li><a href="tables-responsive.html">Responsive Table</a></li>
                      <li><a href="tables-editable.html">Editable Table</a></li>
                    </ul>
                  </li>
                  <li class="has-submenu"><a href="#">Maps</a>
                    <ul class="submenu">
                      <li><a href="maps-google.html">Google Map</a></li>
                      <li><a href="maps-vector.html">Vector Map</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"><i class="mdi mdi-receipt"></i>NOC <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                <ul class="submenu">
                  <li><a href="advanced-animation.html">Animation</a></li>
                  <li><a href="advanced-highlight.html">Highlight</a></li>
                  <li><a href="advanced-rating.html">Rating</a></li>
                  <li><a href="advanced-nestable.html">Nestable</a></li>
                  <li><a href="advanced-alertify.html">Alertify</a></li>
                  <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                  <li><a href="advanced-sessiontimeout.html">Session Timeout</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"><i class="mdi mdi-receipt"></i>Renewal <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                <ul class="submenu">
                  <li><a href="advanced-animation.html">Animation</a></li>
                  <li><a href="advanced-highlight.html">Highlight</a></li>
                  <li><a href="advanced-rating.html">Rating</a></li>
                  <li><a href="advanced-nestable.html">Nestable</a></li>
                  <li><a href="advanced-alertify.html">Alertify</a></li>
                  <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                  <li><a href="advanced-sessiontimeout.html">Session Timeout</a></li>
                </ul>
              </li>
              <li class="has-submenu">
                <a href="#"><i class="mdi mdi-receipt"></i>Report <i class="mdi mdi-chevron-down mdi-drop"></i></a>
                <ul class="submenu megamenu">
                  <li>
                    <ul>
                      <li><a href="pages-timeline.html">Timeline</a></li>
                      <li><a href="pages-invoice.html">Invoice</a></li>
                      <li><a href="pages-directory.html">Directory</a></li>
                      <li><a href="pages-login.html">Login</a></li>
                      <li><a href="pages-register.html">Register</a></li>
                    </ul>
                  </li>
                  <li>
                    <ul>
                      <li><a href="pages-recoverpw.html">Recover Password</a></li>
                      <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                      <li><a href="pages-blank.html">Blank Page</a></li>
                      <li><a href="pages-404.html">Error 404</a></li>
                      <li><a href="pages-500.html">Error 500</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li style="border-left: 1px solid white;" class="has-submenu">
                <a href="#"><i class="fa fa-search"></i>eApproval Process <i
                    class="mdi mdi-chevron-down mdi-drop"></i></a>
                <ul class="submenu">
                  <li><a href="advanced-animation.html">Animation</a></li>
                  <li><a href="advanced-highlight.html">Highlight</a></li>
                  <li><a href="advanced-rating.html">Rating</a></li>
                  <li><a href="advanced-nestable.html">Nestable</a></li>
                  <li><a href="advanced-alertify.html">Alertify</a></li>
                  <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                  <li><a href="advanced-sessiontimeout.html">Session Timeout</a></li>
                </ul>
              </li>
            </ul><!-- End navigation menu -->
          </div><!-- end #navigation -->
        </div><!-- end container -->
      </div><!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->
  </div>