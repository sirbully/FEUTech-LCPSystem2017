<link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.js"></script>

<script>
$(document).ready(function(){
    $('select').formSelect();
    $('#calendar').fullCalendar({
        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '<?php echo base_url() ?>dashboard/jsonc',
                dataType: 'json',
                data: {
                    start: start.unix(),
                    end: end.unix(),
                    <?php if($this->uri->segment(3)): ?>doc_id: <?=$this->uri->segment(3)?><?php endif;?>
                }, success: function(msg) {
                    var events = msg.events;
                    callback(events);
                }
            });
        },
        eventRender: function(event, element) {
            element.qtip({
                content: {
                    title: event.title,
                    text: event.description,
                },
                style: { classes: 'qtip-tipped' },
                position: {
                    target: 'mouse', // Track the mouse as the positioning target
                    adjust: { x: 5, y: 5 } // Offset it slightly from under the mouse
                },
            });
        },
        defaultView: 'agendaWeek',
        nowIndicator: 'true',
        navLinks: 'true',
        header: {
        left: 'prev,next today',
        center: 'title',
        right: 'agendaWeek,month,agendaDay'
        },
        allDay: false,
        selectable: true,
        select: function(start, end){
        <?php if($this->session->has_userdata('isloggedin')==TRUE):?>
        <?php if (empty($this->uri->segment(3))):?>
            swal({title: "Pick a doctor!", icon: 'error'});
            return false;
            <?php else: ?>
            if(start.format() > moment().format() == false) {
                $('#calendar').fullCalendar('unselect');
                swal({title: "This date and time has passed!", icon: 'error'});
                return false;
            }
            
            document.getElementById("schedname").value = "<?=$user[0]->user_fname?> <?=$user[0]->user_lname?>";
            document.getElementById("startd").value = start.format('MMMM DD, YYYY');
            document.getElementById("endd").value = end.format('MMMM DD, YYYY');
            document.getElementById("startt").value = start.format('hh:mm a');
            document.getElementById("endt").value = end.format('hh:mm a');
            document.getElementById("name").value = "<?=$user[0]->user_fname?> <?=$user[0]->user_lname?>";
            document.getElementById("start").value = start.format();
            document.getElementById("end").value = end.format();
            $("#addapt").modal();
            $("#addapt").modal('open');
            <?php endif;?>
        <?php else: ?>
            swal({title: "Please login to schedule an appointment!", icon: 'error'});
            return false;
        <?php endif;?>
        },
    });
    $('#chDoc').on('submit', function () {
      if($('#doc-calendar').val() == null){
        swal({title: "Pick a doctor!", icon: 'error'});
        return false;
      } else { return true; }
    });
});
</script>