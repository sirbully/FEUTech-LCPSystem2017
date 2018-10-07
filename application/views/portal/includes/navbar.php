</head>
<body>
    <!-- Loader -->
    <div class="preloader-background">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                <div class="circle"></div>
                </div>
                <div class="gap-patch">
                <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
          </div>
        </div>
    </div>
    <!-- Navbar -->
    <div class="navbar-fixed">
        <nav class="blue darken-2" role="navigation">
            <div class="nav-wrapper container">
                <a href="<?=base_url()?>portal/"><img class="responsive-img" width="10%" src="<?=base_url()?>assets/images/lcp.png"
                style="margin-top:1%; cursor: pointer;"/></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down ">
                    <li><a class="white-text" href="<?=base_url()?>portal/">Home</a></li>
                    <li><a class="dropdown-trigger" data-target="dropAbout">About Us<i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id="dropAbout" class="dropdown-content ">
                        <li><a href="#">History</a></li>
                        <li><a href="#">Mission and Vision</a></li>
                        <li><a href="#">Directory of Key Officials</a></li>
                        <li><a href="#">Organization Structure</a></li>
                        <li><a href="#">Mandate</a></li>
                        <li><a href="#">Citizen's Charter</a></li>
                    </ul>
                    <li><a class="dropdown-trigger" data-target="dropServices" >Services<i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id="dropServices" class="dropdown-content">
                        <li><a href="#">Ambulatory Medical Oncology Unit</a></li>
                        <li><a href="#">ER and OutPatient</a></li>
                        <li><a href="#">Institutional Ethics Review Board</a></li>
                        <li><a href="#">Executive Check-Up</a></li>
                        <li><a href="#">Health and Fitness</a></li>
                        <li><a href="#">Hyperbaric Medicine & Wound Care Center</a></li>
                        <li><a href="#">Pathology and Laboratory</a></li>
                        <li><a href="#">Pediatric Unit</a></li>
                        <li><a href="#">Pulmonary, Critical Care and Sleep Medicine</a></li>
                        <li><a href="#">Radiological Services</a></li>
                        <li><a href="#">Research & Development</a></li>
                        <li><a href="#">Stem Cell Therapy</a></li>
                        <li><a href="#">Surgery and Anesthesia</a></li>
                    </ul>
                    <li><a class="white-text" href="#">Physicians</a></li>
                    <li><a class="white-text" href="<?=base_url()?>portal/contact">Contact Us</a></li>
                    <?php if(!$this->session->has_userdata('isloggedin')): ?>
                    <li><a class="white-text" href="<?=base_url()?>portal/appointment">Make an Appointment</a></li>
                    <li><a class="white-text" href="<?=base_url()?>landing">Login</a></li>
                    <?php else: if($this->session->userdata('user_type')==3):?>
                    <li><a class="white-text" href="<?=base_url()?>portal/appointment">Make an Appointment</a></li>
                    <li><a class="dropdown-trigger" data-target="dropAccount" >Account<i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id="dropAccount" class="dropdown-content">
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Appointments</a></li>
                        <li><a href="<?=base_url()?>dashboard/logout">Logout</a></li>
                    </ul>
                    <?php else:?>
                    <li><a class="white-text" href="#">LCP Alumni</a></li>
                    <li><a class="white-text" href="<?=base_url()?>dashboard">Dashboard</a></li>
                    <li><a class="white-text" href="<?=base_url()?>dashboard/logout">Logout</a></li>
                    <?php endif; endif;?>
                </ul>
            </div>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="sass.html">Sass</a></li>
                <li><a href="badges.html">Components</a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
            </ul>
        </nav>
    </div> <!-- ./ end Navbar -->

