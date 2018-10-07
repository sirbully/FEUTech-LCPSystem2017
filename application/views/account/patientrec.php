    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10"><h1>Clinic <?php $tempd = $clinic[0]; echo $tempd->user_fname?> - Patient Records</h1><hr>
                    <ul class="nav nav-tabs" id="patTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="gen-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="his-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Medical History</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="patTabContent">
                        <!-- GENERAL -->
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="gen-tab">
                            <h3 class="mt-3">GENERAL INFORMATION</h3><hr>
                            <form id="upPat" method="post" action="<?=base_url()?>clinic/upPatClinic" class="col-sm-12" novalidate>
                                <div class="form-row">
                                    <div class="form-group col-md-4 has-error has-feedback">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" pattern="[A-Za-z\s]+" value="<?=$info[0]->fname?>" required>
                                        <div class="invalid-feedback" id="vfname">Please input valid name.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="mname">Middle Name</label>
                                        <input type="text" class="form-control" id="mname" name="mname" pattern="[A-Za-z\s]+" value="<?=$info[0]->mname?>" required>
                                        <div class="invalid-feedback" id="vmname">Please input valid name.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" pattern="[A-Za-z\s]+" value="<?=$info[0]->lname?>" required>
                                        <div class="invalid-feedback" id="vlname">Please input valid name.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6">
                                        <label for="bdate">Birthdate</label>
                                        <div class="input-group date" id="bdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#bdate" name="bdate" value="<?=$info[0]->bdate?>" required/>
                                            <div class="input-group-append" data-target="#bdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                            </div>
                                            <div class="invalid-feedback" id="vbdate">Please input valid date.</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="mt-4 ml-5">Gender: </label>
                                        <div class="custom-control custom-radio custom-control-inline ml-3">
                                            <input type="radio" id="sexm" name="sex" value="Male" class="custom-control-input" required <?php if($info[0]->sex=="Male"): ?>checked<?php endif;?>>
                                            <label class="custom-control-label" for="sexm">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="sexf" name="sex" value="Female" class="custom-control-input" <?php if($info[0]->sex=="Female"): ?>checked<?php endif;?>>
                                            <label class="custom-control-label" for="sexf">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="weight">Height (cm)</label>
                                        <input type="number" class="form-control" id="height" name="height" placeholder="cm" value="<?=$info[0]->height?>" required>
                                        <div class="invalid-feedback">Please input valid height.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="weight">Weight (kg)</label>
                                        <input type="number" class="form-control" id="weight" name="weight" placeholder="kg" value="<?=$info[0]->weight?>" required>
                                        <div class="invalid-feedback">Please input valid weight.</div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="btype">Blood Type</label>
                                        <select class="form-control" name="btype" id="btype" required>
                                            <option value="AB" <?php if($info[0]->btype=="AB"): ?>selected<?php endif;?>>AB</option>
                                            <option value="A" <?php if($info[0]->btype=="A"): ?>selected<?php endif;?>>A</option>
                                            <option value="B" <?php if($info[0]->btype=="B"): ?>selected<?php endif;?>>B</option>
                                            <option value="O" <?php if($info[0]->btype=="O"): ?>selected<?php endif;?>>O</option>
                                        </select>
                                        <div class="invalid-feedback" id="vbtype">Please choose blood type.</div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?=$info[0]->email?>" required>
                                        <div class="invalid-feedback" id="vemail">Please input valid email.</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cont">Contact No.</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend"><div class="input-group-text">+63</div></div>
                                            <input type="number" class="form-control" id="cont" name="cont" value="<?=$info[0]->cont?>" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="street">Street</label>
                                        <input type="text" class="form-control" id="street" name="street" value="<?=$info[0]->street?>" required>
                                        <div class="invalid-feedback" id="vstreet">Please input valid street.</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?=$info[0]->city?>" required>
                                        <div class="invalid-feedback" id="vcity">Please input valid city.</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="state">State/Province</label>
                                        <input type="text" class="form-control" id="state" name="state" value="<?=$info[0]->state?>" required>
                                        <div class="invalid-feedback" id="vstate">Please input valid state.</div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <input id="subUpPat" type="submit" class="btn btn-primary" value="Update General Information">
                                </div>
                        </div>
                        <!-- HISTORY -->
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="his-tab">
                            <h3 class="mt-3">DIAGNOSES AND MEDICATION</h3><hr>
                            <table id="diagnosis" class="table table-striped table-bordered dataTable">
                                <thead>
                                    <tr>
                                        <th>Diagnosis</th>
                                        <th>Prescribed Medicine</th>
                                        <th>Datetime</th>
                                        <th>Physician</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>