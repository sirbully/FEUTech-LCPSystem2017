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
        
         <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="<?=base_url()?>assets/js/materialize.js"></script>
        <script src="<?=base_url()?>assets/js/init.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <script>
            $(document).ready(function() {
                $('select').material_select();
            });
            $(document).ready(function(){
                $('.materialboxed').materialbox();
            });
            $(document).ready(function(){
            $('.modal').modal();
            $('.btn_edit').click(function(){
                var $row = $(this).closest('tr');
                var rowID = $row.find('.td_id').text();
                var cat =  $row.find('.td_cat').text();
                var con =  $row.find('.td_con').text();
                var title =  $row.find('.td_title').text();
                var img =  $row.find('.td_img').text();
                $('#frm_id').val(rowID);
                $('#frm_cat').val(cat);
                $('#frm_con').val(con);
                $('#frm_title').val(title);
                $('#frm_img').val(img);
                document.getElementById("textMy").innerHTML = con
                document.getElementById("image").innerHTML = img
            });          
        });
    </script>
    <body>
        <nav class="blue darken-2" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="#" class="brand-logo white-text">GOVPH</a>
                <ul class="right hide-on-med-and-down">
                   <li><a class="white-text" href="<?= base_url()?>moderator">Make An Announcement</a></li>
                  <li class="active"><a class="white-text" href="<?= base_url()?>moderator/edit">Edit</a></li>
                  <li><a class="white-text" href="<?= base_url()?>dashboard/logout">Logout</a></li>
                </ul>
            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <br><br><br><br><br><br><br>
        <div class="container">        
          <table class="bordered highlight centered">
        <thead>
          <tr>
              <th>Post Id</th>
              <th>Category</th>
              <th>Title</th>
              <th>Context</th>
              <th>Create Date</th>
              <th>Image</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
            <?php
                foreach ($post as $pos):
            ?>
            <tr>
                <td class="td_id"><strong><?= $pos->post_id?></strong></td>
                <td class="td_cat"><?= $pos->category?></td>
                <td class="td_title"><?= $pos->title?></td>
                <td class="td_con"><?= $pos->context?></td>
                <td><?= date("M j Y, g:i a", $pos->create_date);?></td>
                <td class="td_img"><img class=" materialboxed responsive-img" src="<?=base_url()?>/uploads/<?=$pos->image?>"/></td> 
                <td>
                    <a class="btn-floating btn_edit waves-effect waves-light modal-trigger" href="#modal1" ><i class="material-icons right">edit</i></a>
                    <a id="delBtn" data-id="<?= $pos->post_id ?>"  class="btn-floating  waves-effect waves-light red"><i class="material-icons">delete</i></a>
                </td>
            </tr>
            <script>
    $("#delBtn").click(function () {
        var id = $(this).data('id');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this post!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "<?= base_url() ?>moderator/delete_account/" + id;
                    }
                });
    });

</script>
            <?php endforeach; ?>
        </tbody>
    </table>
            </div>
            <div id="modal1" class="modal">
    <div class="modal-content">
      <form class="col s12" method="post" action="<?= base_url()?>moderator/edit_submit" enctype="multipart/form-data" >
                <input type="hidden" id="frm_id" name="post_id"/>
                <div class='row'>
                <div class="input-field col s12">
                        <select class="browser-default" name="category" id="frm_cat">
                          <option value="" disabled selected>Category</option>
                          <option value="Services">Services</option>
                          <option value="Support">Support</option>
                          <option value="Job Opportunities">Job Opportunities</option>
                        </select>
                    </div>
                </div>
                <div class='row'> 
                        <div class="input-field col s12">
                            <input name="title" type="text" class="validate" id="frm_title" autofocus>
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="file-field input-field col s12 ">
                            <div class="file-path-wrapper" >
                                <i class="material-icons prefix blue-text text-darken-2">attach_file</i>
                                <input type="file" name="picc">
                                <input class="file-path" type="text" >  
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="input-field col s12">
                            <textarea id="textMy" class="materialize-textarea" name="message" autofocus ></textarea> 
                            <label for="textarea1">Message</label>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class='row'>
                        <div class='input-field col s12'>
                            <button type='submit' name='btn_post' class='col s12 btn btn-large waves-effect blue darken-2 '>Edit</button>
                        </div>
                    </div>
        </form>
    </div>
       
       
    </body>
</html>
