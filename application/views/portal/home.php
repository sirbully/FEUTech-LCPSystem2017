<!-- Carousel -->
<div class="container z-depth-1-half" style="border: 1px solid #EEE;">
    <div class="slider white">
        <ul class="slides white">
            <li><img class="responsive-img" src="<?=base_url()?>/assets/images/portal/slide1.png"></li>
            <li><img class="responsive-img" src="<?=base_url()?>/assets/images/portal/slide2.png"></li>
            <li><img class="responsive-img" src="<?=base_url()?>/assets/images/portal/slide3.png"></li>
            <li><img class="responsive-img" src="<?=base_url()?>/assets/images/portal/slide4.jpg"></li>
        </ul>
    </div>
</div> <!-- ./ end Carousel -->

<!-- Small Card -->
<div class="row container">
    <!-- Card 1 -->
    <div class="card small col s3">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" size="30" src="<?=base_url()?>/assets/images/portal/card_1.jpg">
        </div>
        <div class="editLink card-content">
            <span class="card-title activator grey-text text-darken-4"><a href="#">Job Oppurtunities</a></span>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="card small col s3">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator responsive-img" src="<?=base_url()?>/assets/images/portal/card_2.jpg">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Support Services</span>
        </div>
        <div class="card-reveal">
            <span class="noSpace card-title grey-text text-darken-4"><i class="material-icons right">close</i>Support Services</span>        
            <p><a href="#">Accounting Division</a></p>
            <p><a href="#">Admitting and Information</a></p>
            <p><a href="#">Billing Division</a></p>
            <p><a href="#">Budget Section</a></p>
            <p><a href="#">Cast Division</a></p>
            <p><a href="#">Central Supply and Sterilization</a></p>
            <p><a href="#">General Services</a></p>
            <p><a href="#">Human Resource Development</a></p>
            <p><a href="#">Information Technology Services</a></p>
            <p><a href="#">Medical Library</a></p>
            <p><a href="#">Medical Records</a></p>
            <p><a href="#">Medical Social Services</a></p>
            <p><a href="#">Nursing Department</a></p>
            <p><a href="#">Pharmacy Division</a></p>
            <p><a href="#">Saint Therese Unit</a></p>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="card small col s3">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" size="30px" src="<?=base_url()?>/assets/images/portal/card_3.jpg">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">Support Programs</span> 
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i>Support Programs</span>
            <p><a href="#">Asthma Club</a></p>
            <p><a href="#">Aviation Maritime & Travel Medicine</a></p>
            <p><a href="#">Bronchiectasis Support Group</a></p>
            <p><a href="#">COPD Support Group</a></p>
            <p><a href="#">Critical Airway & Interventional Pulmonary</a></p>
            <p><a href="#">Directly Observed Therapy (DOTS)</a></p>
            <p><a href="#">Early Lung Cancer Support</a></p>
            <p><a href="#">Esophagus and Swallowing Center</a></p>
            <p><a href="#">Pain Management & Palliative Care</a></p>
            <p><a href="#">Smoking Cessation</a></p>
            <p><a href="#">Wellness Gym</a></p>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="card small col s3">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="<?=base_url()?>/assets/images/portal/card_4.jpg">
        </div>
        <div class="card-content">
            <br><span class="editLink card-title activator grey-text text-darken-4"><a href="#">LCP Alumni</a></span>   
        </div>
    </div>
</div> <!-- /. end Small Card -->

<!-- Posts -->
<div class="container">
    <center><h3 class="blue-text text-darken-2">Announcements</h3></center>
    <?php foreach ($post as $pos):?>
    <div class="z-depth-1 grey lighten-4 row" style="padding: 32px 90px 50px 90px; border: 1px solid #EEE;">
        <div class="row">
            <div class="card">
                <div class="card-image col s7">
                    <?php $user_img = !empty($pos->image) ? $pos->image : 'default.png'; ?>
                    <img class="responsive-img materialboxed " data-caption="<?= date("M j Y, g:i a", $pos->create_date);?>" src="<?=base_url()?>/uploads/<?=$user_img?>" />
                    <span class="card-title">
                        <?= $pos->category?>                      
                    </span>
                </div>
              </div>

            <div class="col s5">
                <h3 class="blue-text text-darken-2"><?= $pos->title?></h3>
                <h6><strong><i>Posted on <?= date("M j Y, g:i a", $pos->create_date);?></i></strong></h6>
                <p><?= $pos->context?></p>
            </div> 
        </div> 
    </div>
    <br><br>
    <?php endforeach; ?>
</div>