<div class="container">
    <center><h3 class="blue-text text-darken-2">Make an Appointment</h3></center>
    <div class="z-depth-1 grey lighten-4 row" style="padding: 32px 90px 50px 90px; border: 1px solid #EEE;">
        <form id="chDoc" method="post" action="<?=base_url()?>portal/chooseDoc" class="col s12">
            <div class="row">
                <div class="col s12">
                    <div class="input-field inline">
                        <select id="doc-calendar" name="doc-calendar">
                        <option <?php if(empty($this->uri->segment(3))):?>selected<?php endif;?> disabled="disabled">Choose a doctor...</option>
                            <?php foreach($alldoc as $ad):?>
                            <option <?php if($this->uri->segment(3)==$ad->user_id):?>selected<?php endif;?> value="<?=$ad->user_id?>"><?=$ad->doc_name?></option>
                        <?php endforeach; ?>
                        </select>
                        <label>List of Doctors</label>
                    </div>
                    <button type="submit" class="waves-effect waves-light btn blue darken-1">Submit</button>
                </div>
            </div>
        </form>
        <div id="calendar"></div>
    </div>
</div>

<!-- Add Appointment Modal -->
<div class="modal" id="addapt">
    <div class="modal-content">
        <form method="post" action="<?=base_url()?>portal/addapt" class="col s12 blue-text darken-3">
            <div class="row">
                <div class="col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text darken-3">account_circle</i>
                        <input type="text" id="schedname" name="schedname" class="blue-text darken-3" disabled value="a">
                        <label for="schedname">Name</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field col inline">
                        <i class="material-icons prefix blue-text darken-3">date_range</i>
                        <input id="startd" name="startd" type="text" class="blue-text darken-3" disabled value="a">
                        <label for="startd">Date From</label>
                    </div>
                    to
                    <div class="input-field inline">
                        <i class="material-icons prefix blue-text darken-3">date_range</i>
                        <input id="endd" name="endd" type="text" class="blue-text darken-3" disabled value="a">
                        <label for="endd">Date To</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field col inline">
                        <i class="material-icons prefix blue-text darken-3">access_time</i>
                        <input id="startt" name="startt" type="text" class="blue-text darken-3" disabled value="a">
                        <label for="startt">Time From</label>
                    </div>
                    to
                    <div class="input-field inline">
                        <i class="material-icons prefix blue-text darken-3">access_time</i>
                        <input id="endt" name="endt" type="text" class="blue-text darken-3" disabled value="a">
                        <label for="endt">Time To</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="doc_id" value="<?=$this->uri->segment(3)?>">
            <input type="hidden" name="name" id="name">
            <input type="hidden" name="start" id="start">
            <input type="hidden" name="end" id="end">
            <button type="submit" class="waves-effect waves-light btn blue darken-1">Schedule Appointment</button>
        </form>
    </div>
</div>