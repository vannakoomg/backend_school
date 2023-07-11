@extends ('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Events
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div style="margin-bottom: 10px; " class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.events.create') }}">
                            Add Events
                        </a>
                        <a class="btn btn-success" href="{{ route('admin.eventsType.index') }}">
                            Add Acction
                        </a>
                    </div>
                </div>
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
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
@endsection
{{-- <!doctype html>
<html lang="en">

<head>
    <title>Laravel 9 Fullcalandar Jquery Ajax Create and Delete Event </title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script>
</head>

<body>
    <div class="card">
        <div class="card-header">
            Events
        </div>
        <div class="card-body">
            <div class="container-md">
                <div style="margin-bottom: 10px; margin-top: 30px" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('admin.events.create') }}">
                            Add Events
                        </a>
                        <a class="btn btn-success" href="{{ route('admin.eventsType.index') }}">
                            Add Acction
                        </a>
                    </div>
                </div>

                <div class="modal fade" id="reModal" tabindex="-1" aria-labelledby="reModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="reModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary ">
                    <div class="panel-body">
                        <div id='calendar'></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>


<script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            header: {
                left: 'prev,next',
                center: 'title', // right: 'month,basicWeek,basicDay'
                right: 'month'
            },
            editable: true,
            events: "getEvent",
            displayEventTime: false,
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
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

</html> --}}
