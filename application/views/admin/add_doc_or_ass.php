<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico"/>
        <title>LCP Portal</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="<?=base_url()?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css"/>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
               $('.datepicker').datepicker({
                   format: 'mmmm/dd/yyyy',
                   yearRange:[1900,2018]
               });
               $('select').formSelect();
           });
        </script>
        <style>
        
      .with-gap[type="radio"]:checked+label:after{
        background-color: #1976d2 !important;
        border-color: #1976d2 !important;
     } 
     .with-gap[type="radio"]:checked+label:before{
        border-color: #1976d2 !important;
      }
        .input-field textarea:focus + label {
        color: #1976d2 !important;
      }

      .row .input-field textarea:focus {
        border-bottom: 1px solid #1976d2 !important;
        box-shadow: 0 1px 0 0 #1976d2 !important
      }
        .input-field input:focus + label {
            color: #1976d2 !important;
        }
        .row .input-field input:focus {
            border-bottom: 1px solid #1976d2 !important;
            box-shadow: 0 1px 0 0 #1976d2 !important
        }
        .gender{
            display: inline-block !important;
        }
        }
        
    </style>
    </head>
    <body>
        <div class="navbar-fixed">
            <nav class="blue darken-2" role="navigation">         
            </nav>
        </div>
    <div class="row">
        <div class="col s3">  
            <ul id="slide-out" class="side-nav fixed">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="<?=base_url()?>assets/images/bg_side.jpg">
                        </div>
                        <img class="circle" src="<?=base_url()?>assets/images/admin.png">
                        <span class="name">Administrator</span>
                        <br>
                    </div>
                </li>
                <li class="active"><a href="<?= base_url()?>admin" class="waves-effect"><i class="material-icons">account_box</i>Accounts</a></li>
                <li><a href="<?= base_url()?>admin/userlogs" class="waves-effect"><i class="material-icons">history</i>User Logs</a></li>
                <li><a href="<?= base_url()?>admin/add" class="waves-effect"><i class="material-icons">add</i>Add Doctor or Assistant</a></li>
                <li><div class="divider"></div></li>
                <li><a href="<?= base_url()?>dashboard/logout"><i class="material-icons">exit_to_app</i>Logout</a></li> 
            </ul>     
        </div>
        <div class="col s9">
        <div class="container ">
               <br><br>
               <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
            <form class="col s12" method="post" action="<?= base_url()?>admin/add_submit">
                <div class='row'>
                    <div class='input-field col s4'>
                        <i class="material-icons prefix blue-text text-darken-2">account_circle</i>
                        <input  name="first_name" type="text"  autofocus >
                        <label for="first_name" data-error="wrong">First Name</label>
                        
                    </div>
                    <div class='input-field col s4'>
                        <i class="material-icons prefix blue-text text-darken-2">account_circle</i>
                        <input name="middle_name" type="text"   class="validate">
                        <label for="middle_name" data-error="">Middle Name</label>
                    </div>
                    <div class='input-field col s4'>
                        <i class="material-icons prefix blue-text text-darken-2">account_circle</i>
                        <input name="last_name" type="text"  class="validate">
                        <label for="last_name" data-error="">Last Name</label>
                    </div>
                </div>
                <div class='row'>
                    <div class='input-field col s12'>
                        <i class="material-icons prefix blue-text text-darken-2">accessibility</i>
                        <input  name="specialty" type="text">
                        <label for="specialty" data-error="wrong">Specialty</label>
                        
                    </div>
                </div>
                <div class='row'>
                    <div class='input-field col s6'>
                        <i class="material-icons prefix blue-text text-darken-2">email</i>
                        <input  name="email" type="email"  >
                        <label for="email" data-error="wrong">Email</label>
                    </div>
                    <div class='input-field col s6'>
                        <i class="material-icons prefix blue-text text-darken-2">contact_phone</i>
                        <input  name="con_num" type="number"  >
                        <label for="con_num" data-error="wrong">Contact Number</label>   
                    </div>
                </div>
                <div class="input-field col s12">
                    <select name="doc_or_ass">
                        <option value="" disabled selected>Doctor or Assistant</option>
                        <option value="doctor">Doctor</option>
                        <option value="assistant">Assistant</option>
                    </select>
                    <label>Doctor or Assistant</label>
                </div>
                <br/>
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect blue text-darken-2'>Add</button>
              </div>
            </center>
          </form>
        </div>
      </div>
        </div>    
  <!--  Scripts-->       
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="<?=base_url()?>assets/js/materialize.js"></script>
        <script src="<?=base_url()?>assets/js/init.js"></script>
        <script>
            $(".button-collapse").sideNav();
    </script>
    </body>
</html>



