    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10"><h1>Clinic <?php $tempd = $clinic[0]; echo $tempd->user_fname?> - Patient Records</h1><hr>
                    <div class="col-sm-12 bdown">
                        <?php if($this->session->userdata('user_type')==1):?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpat">
                            <span class="sf sf-plus-2" style="font-size:12px; margin-right:5px;"></span> Add Patient
                        </button>
                        <?php endif;?>
                    </div>
                    <table id="pat" class="table table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                