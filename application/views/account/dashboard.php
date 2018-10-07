    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10"><h1>Clinic <?php $tempd = $clinic[0]; echo $tempd->user_fname?> - Dashboard</h1><hr>
                    <div class="row">
                        <p class="righto col-sm-12"><span class="mouse"><span class="sf sf-switch"></span><span id="edittxt" class="mx-sm-2">EDIT MODE: OFF</span></span></p>
                        <?php if(empty($doctor)):?>
                        <div class="col-sm-12 notice">
                            There are no assigned doctors for this clinic as of the moment. Click on <b>EDIT MODE</b> on the top right corner to add a doctor.
                        </div>
                        <?php else: 
                            foreach($doctor as $doc):?>
                        <div class="col-sm-4">
                            <div data-id="<?=$doc->user_id?>" class="col-sm-12 docbox" style="cursor:pointer;">
                                <div class="row">
                                    <span id="<?=$doc->user_id?>" class="sf sf-cross-o fixdel"></span>
                                    <div class="col-sm-3 pic">
                                        <img src="<?=base_url()?>uploads/<?=$doc->doc_image?></p>"/>
                                    </div>
                                    <div class="col-sm-9 docdesc">
                                        <p class="name">Dr. <?=$doc->doc_name?></p>
                                        <p class="desc"><?=$doc->doc_specialty?></p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; endif;?>
                        <div class="col-sm-4">
                            <div class="col-sm-12 docbox-add" data-toggle="modal" data-target="#adddoc">
                                <div><p class="adddoc"><i class="fas fa-plus-circle plusdoc"></i><br>Add New Doctor</p></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add Doctor Modal -->
                <div class="modal fade" id="adddoc" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form id="adDoc" method="post" action="<?=base_url()?>clinic/addDocClinic">
                                    <div class="form-group">
                                        <label for="inputDoc">Add A Doctor</label>
                                        <select id="inputDoc" name="inputDoc" class="form-control selectpicker" data-live-search="true">
                                            <option selected disabled="disabled">-</option>
                                            <?php foreach($alldoc as $ad):?>
                                            <option value="<?=$ad->user_id?>"><?=$ad->doc_name?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" class="btn btn-primary" value="Add Doctor">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>