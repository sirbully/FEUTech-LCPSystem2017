    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.17/moment-timezone-with-data-2012-2022.min.js"></script>
    <link href="<?=base_url()?>assets/css/tempusdominus-bootstrap-4.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/tempusdominus-bootstrap-4.js"></script>
    
    <script>
    $(document).ready(function() {
        $table = $('#pat').DataTable({
            "ajax": {
                url: "<?=base_url()?>dashboard/jsonp",
                dataSrc: "patient",
            },
            "columns": [
                { "data": null },
                { "data": "patid" },
                { "data": "lname" },
                { "data": "fname" },
                { "data": "mname" },
                { "data": null },
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0,
                    "width": "5%",
                },
                {
                    "targets": 1,
                    "searchable": false,
                    "orderable": false,
                    "visible": false,
                },
                {
                    "targets": 2,
                    "orderData": [2,3]
                },
                {
                    "targets": 3,
                    "orderData": [3,2]
                },
                {
                    "targets": -1,
                    "searchable": false,
                    "orderable": false,
                    "defaultContent": "<button class='btn btn-warning'><i class='far fa-eye'></i></button>",
                    "width": "5%",
                },
            ],
            "order": [[ 2, 'asc' ]]
        });
        $table.on( 'order.dt search.dt', function () {
            $table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        }).draw();
        $('#pat tbody').on( 'click', 'button', function () {
            $data = $table.row( $(this).parents('tr') ).data();
            <?php if($this->session->userdata('user_type')==1):?>
            window.location.href = "<?=base_url()?>clinic/patient/"+$data['patid'];
            <?php else: ?>
            window.location.href = "<?=base_url()?>doctor/patient/"+$data['patid'];
            <?php endif;?>
        });
        $('#diagnosis').DataTable({
            "ajax": {
                "url": '<?= base_url() ?>dashboard/jsond',
                <?php if($this->uri->segment(3)): ?>"data": { "pat_id": <?=$this->uri->segment(3)?> },<?php endif;?>
                "dataSrc": "diagnosis",
            },
            "columns": [
                { "data": "dgn" },
                { "data": "med" },
                { "data": "date" },
                { "data": "doc" },
            ],
        });
        $('#bdate').datetimepicker({
            format:'MM/DD/YYYY',
        });
        $("#subAdPat").on('click',function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>clinic/addPat',
                data: {
                    'fname': $('#fname').val(),
                    'mname': $('#mname').val(),
                    'lname': $('#lname').val(),
                    'bdate': $('input[name="bdate"]').val(),
                    'sex': $('input[name="sex"]:checked').val(),
                    'height': $('#height').val(),
                    'weight': $('#weight').val(),
                    'btype': $('#btype').val(),
                    'email': $('#email').val(),
                    'cont': $('#cont').val(),
                    'street': $('#street').val(),
                    'city': $('#city').val(),
                    'state': $('#state').val(),
                },
                dataType: 'html',
                success: function(msg){
                    if(msg=="err") {$("#adPat").addClass('was-validated');}
                    else if(msg=="bad") {alert("DB Error");} else {
                        swal({
                            title:"Added a patient record!", 
                            type: "success"
                        }, function(ok) {
                            if(ok) { location.reload(); }
                        });
                    }
                }
            });
        });
        $("#subUpPat").on('click',function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?=base_url()?>clinic/editPat',
                data: {
                    'fname': $('#fname').val(),
                    'mname': $('#mname').val(),
                    'lname': $('#lname').val(),
                    'bdate': $('input[name="bdate"]').val(),
                    'sex': $('input[name="sex"]:checked').val(),
                    'height': $('#height').val(),
                    'weight': $('#weight').val(),
                    'btype': $('#btype').val(),
                    'email': $('#email').val(),
                    'cont': $('#cont').val(),
                    'street': $('#street').val(),
                    'city': $('#city').val(),
                    'state': $('#state').val(),
                    <?php if($this->uri->segment(3)): ?>'where': <?=$this->uri->segment(3)?><?php endif;?>
                },
                dataType: 'html',
                success: function(msg){
                    if(msg=="err") {$("#upPat").addClass('was-validated');}
                    else if(msg=="bad") {alert("DB Error");} else {
                        swal({
                            title:"Updated general information!", 
                            type: "success"
                        }, function(ok) {
                            if(ok) { location.reload(); }
                        });
                    }
                }
            });
        });
        $('#addpat').on('hidden.bs.modal', function (e) {
            $("#adPat").removeClass('was-validated');
        });
    });
    </script>
