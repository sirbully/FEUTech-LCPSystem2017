    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.4/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.17/moment-timezone-with-data-2012-2022.min.js"></script>
    <link href="<?=base_url()?>assets/css/fullcalendar.min.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/fullcalendar.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.js"></script>
    
    <script>
    $(document).ready(function() {
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
            editable: true,
            select: function(start, end){
                <?php if (empty($this->uri->segment(3))):?>
                swal({title: "Pick a doctor!", type:"error"});
                return false;
                <?php else: ?>
                if(start.format() > moment().format() == false) {
                    $('#calendar').fullCalendar('unselect');
                    swal({title: "This date and time has passed!", type:"error"});
                    return false;
                }
                
                document.getElementById("startd").value = start.format('MMMM DD, YYYY');
                document.getElementById("endd").value = end.format('MMMM DD, YYYY');
                document.getElementById("startt").value = start.format('hh:mm a');
                document.getElementById("endt").value = end.format('hh:mm a');
                document.getElementById("start").value = start.format();
                document.getElementById("end").value = end.format();
                $("#addapt").modal('show');
                <?php endif;?>
            },
            eventClick: function(event,jsEvent, view){
                swal({
                    title: "Cancel?",
                    text: "This event will be cancelled!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Cancel",
                    closeOnConfirm: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title:"This appointment has been cancelled!", 
                            type: "success"
                        }, function(ok) {
                            if(ok) { $(location).attr('href', '<?=base_url()?>clinic/cancelappt/'+event.id) }
                        });
                    }
                });
            },
            eventDrop: function(event, delta, revertFunc){
                swal({
                    title: "Are you sure?",
                    text: "This event will be rescheduled!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Reschedule",
                    closeOnConfirm: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title:"You have successfully rescheduled this appointment!", 
                            type: "success"
                        }, function(ok) {
                            if(ok) { $(location).attr('href', '<?=base_url()?>clinic/resched/'+event.id+'/'+event.start.format()+'/'+event.end.format()); }
                        });
                    } else { revertFunc(); }
                });
            },
        });
        $('#selDoc').on('submit', function () {
            if($('#doc-calendar').val() == null){
                swal({title: "Pick a doctor!", type: 'error'});
                return false;
            } else { return true; }
        });
    });
    </script>
