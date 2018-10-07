<div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10"><h1>Dr. <?php $tempd = $clinic[0]; echo "$tempd->user_fname $tempd->user_lname"?> - Calendar</h1><hr>                    
                    <div id="calendar"></div>
                </div>
                <div class="thelogs col-sm-2">
                    <h4>Logs</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Appointment Modal -->
    <div class="modal fade" id="addapt" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="post" action="<?=base_url()?>clinic/addapt">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="desc">Description:</label>
                                <input type="text" class="form-control" name="desc">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date From:</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="startd" disabled>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date To:</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="endd" disabled>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Time From:</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="startt" disabled>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Time To:</label>
                                        <div class="input-group date">
                                            <input type="text" class="form-control" id="endt" disabled>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input type="hidden" name="doc_id" value="<?=$this->uri->segment(3)?>">
                            <input type="hidden" name="start" id="start">
                            <input type="hidden" name="end" id="end">
                            <input type="submit" class="btn btn-primary" value="Schedule Event" style="cursor:pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>