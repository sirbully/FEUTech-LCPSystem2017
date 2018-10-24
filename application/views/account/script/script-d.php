    <script>
    $(document).ready(function() {
        $("#edittxt").click(function() {
            if($("#edittxt").html()=="EDIT MODE: OFF"){
                $("#edittxt").html("EDIT MODE: <b>ON</b>");
                $('.fixdel').attr('style','display: block');
                $head = $("head");
                $style = $head.find("style");
                if($style.length==2||$style.length==1){
                    $( "style" ).remove();
                }
                $('.docbox').attr('style','display: block');
                $('.docbox-add').attr('style','display: block');
                $('.docbox').off("click");
            } else {
                $("#edittxt").html("EDIT MODE: OFF");
                $('.fixdel').attr('style','display: none');
                $('.docbox-add').attr('style','display: none');
                $("head").append("<style> .docbox:hover{ transform: scale(1.025); } </style>");
                $('.docbox').attr('style','cursor:pointer');
                $('.docbox').on ("click",function(){
                    $doc = $(this).data("id");
                    window.location.href = "<?=base_url()?>clinic/calendar/"+$doc;
                });
            }
        });
        $('.fixdel').click(function(e){
            e.stopPropagation();
            $temp = this.id;
            swal({
                title: "Are you sure?",
                text: "This doctor will be removed!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Remove",
                closeOnConfirm: false
            }, function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title:"Success!", 
                        type: "success"
                    }, function(ok) {
                        if(ok) { $(location).attr('href', '<?=base_url()?>clinic/deleteDocClinic/'+$temp); }
                    });
                }
            });
        });
        $('#adDoc').on('submit', function () {
            if($('#inputDoc').val() == null){
                swal({title: "Pick a doctor!", type: 'error'});
                return false;
            } else { return true; }
        });
        $('.docbox').on ("click",function(){
            $doc = $(this).data("id");
            window.location.href = "<?=base_url()?>clinic/calendar/"+$doc
        });
    });
    </script>
