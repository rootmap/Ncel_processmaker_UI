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



<script src="assets/js/jquery.min.js"></script>

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