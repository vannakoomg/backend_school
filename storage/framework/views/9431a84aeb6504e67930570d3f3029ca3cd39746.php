
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Events
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div style="margin-bottom: 10px; " class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="<?php echo e(route('admin.events.create'), false); ?>">
                            Add Events
                        </a>
                        <a class="btn btn-success" href="<?php echo e(route('admin.eventsType.index'), false); ?>">
                            Add Acction
                        </a>
                    </div>
                </div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next',
                    center: 'title', // right: 'month,basicWeek,basicDay'
                    right: 'month'
                },
                editable: false,
                events: "getEvent",
                displayEventTime: false,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                eventAfterRender: function(event, element, view) {
                    var dataHoje = new Date();
                    if (event.action == 1) {
                        //event.color = "#FFB347"; //Em andamento
                        element.css('background-color', '#FFB347');
                    } else if (event.start < dataHoje && event.end < dataHoje) {
                        //event.color = "#77DD77"; //Concluído OK
                        element.css('background-color', '#77DD77');
                    } else if (event.start > dataHoje && event.end > dataHoje) {
                        //event.color = "#AEC6CF"; //Não iniciado
                        element.css('background-color', '#AEC6CF');
                    }
                },
                selectable: true,
                selectHelper: true,
                eventClick: function(event) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: "GET",
                        dataType: 'html',
                        success: function(data) {
                            console.log("on Event have been Erro");
                            $('#calendar').fullCalendar('refetchEvents');
                            window.location.assign(
                                "events/" + event.id +
                                "/edit");
                        },
                        error: function(data) {
                            console.log("on Event have been Erro");
                        }
                    });

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\web_backend\resources\views/admin/events/index.blade.php ENDPATH**/ ?>