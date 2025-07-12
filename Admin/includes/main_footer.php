<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- Dropzone -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>

<script>
$(document).ready(function () {
    // DataTable initialization
    $('#example1').DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // Initialize Select2 Elements
    $('.select2').select2();
    $('.select2bs4').select2({ theme: 'bootstrap4' });

    // Initialize input masks
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    $('[data-mask]').inputmask();

    // Initialize date pickers
    $('#reservationdate').datetimepicker({ format: 'L' });
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    $('#reservation').daterangepicker();
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: { format: 'MM/DD/YYYY hh:mm A' }
    });
    $('#daterange-btn').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });
    $('#timepicker').datetimepicker({ format: 'LT' });

    // Initialize other plugins
    $('.duallistbox').bootstrapDualListbox();
    $('.my-colorpicker1').colorpicker();
    $('.my-colorpicker2').colorpicker();
    $('.my-colorpicker2').on('colorpickerChange', function (event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    // Initialize BS-Stepper
    window.stepper = new Stepper(document.querySelector('.bs-stepper'));

    // Initialize Dropzone
    Dropzone.autoDiscover = false;
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
    var myDropzone = new Dropzone(document.body, {
        url: "/target-url",
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false,
        previewsContainer: "#previews",
        clickable: ".fileinput-button"
    });
    myDropzone.on("addedfile", function (file) {
        file.previewElement.querySelector(".start").onclick = function () { myDropzone.enqueueFile(file); };
    });
    myDropzone.on("totaluploadprogress", function (progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });
    myDropzone.on("sending", function (file) {
        document.querySelector("#total-progress").style.opacity = "1";
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });
    myDropzone.on("queuecomplete", function (progress) {
        document.querySelector("#total-progress").style.opacity = "0";
    });
    document.querySelector("#action1 .start").onclick = function () {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };  
    document.querySelector("#action1 .cancel").onclick = function () {
        myDropzone.removeAllFiles(true);
    };

});
</script>

<script>
$(document).ready(function(){
  
  //order_model
  $(".view-order-btn").click(function() {
            var productId = $(this).data("product-id");
            // AJAX request to load modal content dynamically
            $.ajax({
                type: "POST",
                url: "lastorder_model.php",
                data: { product_id: productId },
                success: function(response) {
                    // Load modal content into the container
                    $("#modalContent").html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle error
                }
            });
        });
//add ajax
$("#form1").submit(function(e){
        e.preventDefault();
        
        var formData = new FormData(this); 
        
        $.ajax({
            url: "includes/add_ajax.php", 
            type: 'post',
            data:formData,
            contentType: false,
            processData: false,
            success: function(response) {  
                $(".msg").html(response);
            }
        });
    });//add product

    
    $("#form2").submit(function(e){
            e.preventDefault();
            $.ajax({
            url: "includes/add_ajax.php", 
            type: 'post',
            data: $("#form2").serialize(),
            success: function(response) 
            {  
                $(".msg").html(response);
            
            }
  });
  });//add role

    $("#form3").submit(function(e){
    e.preventDefault();
    $.ajax({
    url: "includes/add_ajax.php", 
    type: 'post',
    data: $("#form3").serialize(),
    success: function(response) {  
     $(".msg").html(response);
   }});
});//add sub_cat


$("#form4").submit(function(e){
    e.preventDefault();
    var category_data = new FormData(this); 
        $.ajax({
            url: "includes/add_ajax.php", 
            type: 'post',
            data: category_data,
            contentType: false,
            processData: false,
            success: function(response) 
            {  
              $(".msg").html(response);
            }
        });
    });//add category

    $("#update_role_form").submit(function(e) {
        e.preventDefault();
        var role_id = $(this).find("[name='role_id']").val(); // Get the role ID from the form
        $.ajax({
            url: "includes/update_ajax.php",
            type: 'post',
            data: $("#update_role_form").serialize() + "&role_id=" + role_id,
            success: function(response) {
                $(".msg").html(response);
            }
        });
    });//update role    


    $("#update_category_form").submit(function (e) {
        e.preventDefault();
        var category_data = new FormData(this);
        $.ajax({
            url: "includes/update_ajax.php", // Change the URL to the appropriate endpoint for updating
            type: 'post',
            data: category_data,
            contentType: false,
            processData: false,
            success: function (response) {
                $(".msg").html(response);
            }
        });
    });//update_cat


    $("#update_sub_category_form").submit(function(e) {
        e.preventDefault();
        var sub_category_id = $(this).find("[name='sub_category_id']").val(); // Get the role ID from the form
        $.ajax({
            url: "includes/update_ajax.php",
            type: 'post',
            data: $("#update_sub_category_form").serialize() + "&sub_category_id=" + sub_category_id,
            success: function(response) {
                $(".msg").html(response);
            }
        });
    });//update_sub_cat

    $("#update_product_form").submit(function (e) {
        e.preventDefault();
        var product_data = new FormData(this);
        $.ajax({
            url: "includes/update_ajax.php", // Change the URL to the appropriate endpoint for updating
            type: 'post',
            data: product_data,
            contentType: false,
            processData: false,
            success: function (response) {
                $(".msg").html(response);
            }
        });
    });//update_product  


//delete_ajax
  $('.delete_role').click(function(){
        var role_id = $(this).attr('data-id');

        $.ajax({
            url: 'includes/delete_ajax.php',
            data: {"role_id": role_id, "action_value": "delete_role"},
            type: 'post',
            success: function(response) {
                // Refresh the page after 1 second
                setTimeout(function() {
                  $(".msg").html(response);
                  location.reload();
                }, 1000);
            }
        });
    });//delete role

  $('.delete_cat').click(function(){
        var category_id = $(this).attr('data-id');

        $.ajax({
            url: 'includes/delete_ajax.php',
            data: {"category_id": category_id, "action_value": "delete_cat"},
            type: 'post',
            success: function(response) {
                // Refresh the page after 1 second
                setTimeout(function() {
                  $(".msg").html(response);
                  location.reload();
                }, 1000);
            }
        });
    });//delete cat

    $('.delete_sub_cat').click(function(){
        var sub_category_id = $(this).attr('data-id');

        $.ajax({
            url: 'includes/delete_ajax.php',
            data: {"sub_category_id": sub_category_id, "action_value": "delete_sub_cat"},
            type: 'post',
            success: function(response) {
                setTimeout(function() {
                  $(".msg").html(response);
                  location.reload();
                }, 1000);
            }
        });
    });//delete sub_cst

$('.delete_product').click(function(){
    var product_id = $(this).data('id');

    // Confirm if the correct product_id is being obtained
    console.log(product_id);

    // Make AJAX request to delete the product
    $.ajax({
        url: 'includes/delete_ajax.php',
        data: {"product_id": product_id, "action_value": "delete_product"},
        type: 'post',
        success: function(response) {
            // Refresh the page after 1 second
            setTimeout(function() {
                $(".msg").html(response);
                location.reload();
            }, 1000);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

   

} );
</script>


