<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>LCP Portal</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?=base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>          
            $(document).ready(function(){
                 $(".dropdown-trigger").dropdown({
                     hover: true
                 });
                 
        });
        </script>
    </head>
    <style>
        #sidenav-overlay { z-index: 1; }
        ul.dropdown-content {
            width: auto !important;           
            li > span {
              white-space: nowrap;
            }
          }    
    </style>
    <body>       
    <div class="row">
        <div class="navbar-fixed">
                <nav class="blue darken-2" role="navigation">
                    <div class="nav-wrapper container">
                         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                        <ul class="right hide-on-med-and-down ">
                            <li><a class="white-text" href="<?=base_url()?>home">Home</a></li>
                            <li><a class="dropdown-trigger" data-target="dropAbout" >About Us<i class="material-icons right">arrow_drop_down</i></a></li>
                                <ul id="dropAbout" class="dropdown-content">
                                    <li><a href="#!">History</a></li>
                                    <li><a href="#!">Mission and Vision</a></li>
                                    <li><a href="#!">Directory of Key Officials</a></li>
                                    <li><a href="#!">Organization Structure</a></li>
                                    <li><a href="#!">Mandate</a></li>
                                    <li><a href="#!">Citizen's Charter</a></li>
                                </ul>
                            <li><a class="dropdown-trigger" data-target="dropServices" >Services<i class="material-icons right">arrow_drop_down</i></a></li>
                                <ul id="dropServices" class="dropdown-content">
                                    <li><a href="#!">Ambulatory Medical Oncology Unit</a></li>
                                    <li><a href="#!">ER and OutPatient</a></li>
                                    <li><a href="#!">Institutional Ethics Review Board</a></li>
                                    <li><a href="#!">Executive Check-Up</a></li>
                                    <li><a href="#!">Health and Fitness</a></li>
                                    <li><a href="#!">Hyperbaric Medicine & Wound Care Center</a></li>
                                    <li><a href="#!">Pathology and Laboratory</a></li>
                                    <li><a href="#!">Pediatric Unit</a></li>
                                    <li><a href="#!">Pulmonary, Critical Care and Sleep Medicine</a></li>
                                    <li><a href="#!">Radiological Services</a></li>
                                    <li><a href="#!">Research & Development</a></li>
                                    <li><a href="#!">Stem Cell Therapy</a></li>
                                    <li><a href="#!">Surgery and Anesthesia</a></li>
                                </ul>
                            <li><a class="white-text" href="#">Physicians</a></li>
                            <li><a class="white-text" href="<?=base_url()?>porta/contact">Contact Us</a></li>
                            <li><a class="white-text" href="<?=base_url()?>landing/">Login</a></li>
                            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                            <ul id="dropdown1" class="dropdown-content">
                                <li><a href="#!">one</a></li>
                                <li><a href="#!">two</a></li>
                                <li class="divider"></li>
                                <li><a href="#!">three</a></li>
                            </ul>
                        </ul>
                    </div>
                    <ul class="side-nav" id="mobile-demo">
                            <li><a href="sass.html">Sass</a></li>
                            <li><a href="badges.html">Components</a></li>
                            <li><a href="collapsible.html">Javascript</a></li>
                            <li><a href="mobile.html">Mobile</a></li>
                        </ul>
                </nav>
            </div>
        <div class="col s1">
            
            <ul id="slide-out" class="side-nav fixed">
                <div class="user-view">
                    <li class="logo"><img class="responsive-img" src="<?=base_url()?>/assets/images/logo.png"/></li>  
                </div>
                <ul class="collapsible collapsible-accordion ">
                    <li class="bold"><a class="collapsible-header" href="">Job Oppurtunities</a></li>
                    <li class="bold"><a class="collapsible-header">Support Services</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Billing Division</a></li>
                                <li><a href="#">Budget Section</a></li>
                                <li><a href="#">Cast Division</a></li>
                                <li><a href="#">Central Supply and Sterilization</a></li>
                                <li><a href="#">General Services</a></li>
                                <li><a href="#">Human Resource Development</a></li>
                                <li><a href="#">Information Technology Services</a></li>
                                <li><a href="#">Medical Library</a></li>
                                <li><a href="#">Medical Records</a></li>
                                <li><a href="#">Medical Social Services</a></li>
                                <li><a href="#">Nursing Department</a></li>
                                <li><a href="#">Pharmacy Division</a></li>
                                <li><a href="#">Saint Therese Unit</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold"><a class="collapsible-header">Support Programs</a>
                      <div class="collapsible-body">
                            <ul>
                                <li><a href="#">Asthma Club</a></li>
                                <li><a href="#">Aviation Maritime & Travel</a></li>
                                <li><a href="#">Bronchiectasis Support Group</a></li>
                                <li><a href="#">COPD Support Group</a></li>
                                <li><a href="#">Critical Airway & Interventional</a></li>
                                <li><a href="#">Directly Observed Therapy (DOTS)</a></li>
                                <li><a href="#">Early Lung Cancer Support</a></li>
                                <li><a href="#">Esophagus and Swallowing Center</a></li>
                                <li><a href="#">Pain Management & Palliative Care</a></li>
                                <li><a href="#">Smoking Cessation</a></li>
                                <li><a href="#">Wellness Gym</a></li>
                             </ul>
                      </div>
                    </li>
                    <li class="bold"><a class="collapsible-header" href="">LCP Alumni</a></li>
                </ul>
            </ul>     
        </div>
        <div class="col s11">
            
            <div class="container">
                <br><br><br><br><br><br>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy 
                text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
             <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <footer class="page-footer blue darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
            <p class="grey-text text-lighten-4">The <strong>Lung Center of the Philippines (LCP)</strong> was established through Presidential Decree No. 1823 on January 16, 1981 to provide the Filipino people state-of-the-art specialized care for lung and other chest diseases.  </p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
    <a class="brown-text text-lighten-3">Lung Center of The Philippines</a>
      </div>
    </div>
  </footer>
        </div>
     
    </div>
       
     
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="<?=base_url()?>assets/js/materialize.js"></script>
        <script src="<?=base_url()?>assets/js/init.js"></script>
        <script>
            $(".button-collapse").sideNav();
        </script>
    </body>
</html>