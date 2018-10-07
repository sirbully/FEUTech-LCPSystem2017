<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico"/>
        <title>Moderator</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?=base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <script>
            $(document).ready(function() {
                $('select').material_select();
            });
    </script>
    <body>
        <nav class="blue darken-2" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo white-text">GOVPH</a>
                <ul class="right hide-on-med-and-down">
                   <li class="active"><a class="white-text" href="<?= base_url()?>moderator">Make An Announcement</a></li>
                  <li><a class="white-text" href="<?= base_url()?>moderator/edit">Edit</a></li>
                  <li><a class="white-text" href="<?= base_url()?>dashboard/logout">Logout</a></li>
                </ul>
            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <br><br><br><br><br><br><br>
        <div class="container ">
            <div class="z-depth-1 grey lighten-4 row" style="padding: 32px 90px 50px 90px; border: 1px solid #EEE;"> 
                <form class="col s12" method="post" action="<?=base_url()?>moderator/submit" enctype="multipart/form-data">
                    <div class="input-field col s12">
                        <select class="browser-default" name="category">
                          <option value="" disabled selected>Category</option>
                          <option value="Services">Services</option>
                          <option value="Support">Support</option>
                          <option value="Job Opportunities">Job Opportunities</option>
                        </select>
                    </div>
                    <div>  
                        <div class="input-field col s12">
                            <input name="title" type="text" class="validate">
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="file-field input-field col s12 ">
                        <div class="file-path-wrapper">
                            <i class="material-icons prefix blue-text text-darken-2">attach_file</i>
                            <input type="file" name="pic">
                            <input class="file-path" type="text" placeholder="Upload image" >  
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea" name="message"></textarea> 
                        <label for="textarea1">Message</label>
                    </div>
                    <br><br><br><br>
                    <div class='input-field col s12'>
                        <button type='submit' name='btn_post' class='col s12 btn btn-large waves-effect blue darken-2 '>Post</button>
                    </div>
                </form>    
            </div>
        </div>
        <!--  Scripts-->
   
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="<?=base_url()?>assets/js/materialize.js"></script>
        <script src="<?=base_url()?>assets/js/init.js"></script>
       
    </body>
</html>