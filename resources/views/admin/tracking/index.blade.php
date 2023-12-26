@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Track When User Click On Menu
        </div>
        <div class="card-body">

            <div class="container-fluid text-center">
                <div class="row align-items-start">
                    <div class="col-8">
                        <canvas id="chart"></canvas>
                    </div>
                    <div class="col-4 align-self-center">
                        Summery MC and CC
                        <canvas id="chartPie"></canvas>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <form action="{{ route('admin.tracking.index') }}">
                    {{-- <div class="row">
                        <div class="col-3">
                            <label class="" for="name">User Name</label>
                            <input type="user_name" class="form-control mb-3" placeholder="Find name here" name="user_name"
                                id="user_name" value="{{ $user_name }}">
                        </div>
                        <div class="col-3">
                            <label class="" for="name">Menu Name</label>
                            <input type="menu_name" class="form-control mb-3" placeholder="Find name here" name="menu_name"
                                id="menu_name" value="{{ $menu_name }}">
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="" for="from_date"> From date </label>
                                <input id="startdate" name="fromdate" type="text" class="form-control datetimepicker"
                                    value="{{ $fromdate }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="" for="to_date">To date </label>
                                <input id="id" name="todate" type="text" class="form-control datetimepicker"
                                    value="">
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            Search
                        </button>
                    </div> --}}
                </form>
                <table class=" table table-sm table-bordered table-striped table-hover datatable datatable-SchoolClass">
                    <thead>
                        <tr>
                            <th width="10">
                            </th>
                            <th>
                                User Name
                            </th>
                            <th>
                                Menu Name
                            </th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($track as $key => $trackee)
                            <tr data-entry-id="{{ $trackee->id }}">
                                <td>
                                </td>
                                <td>
                                    {{ $trackee->user_name ?? '' }}
                                </td>
                                <td>
                                    {{ $trackee->menu_name ?? '' }}
                                </td>
                                <td>
                                    {{ $trackee->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
        <script>
            const pie = document.getElementById("chartPie").getContext('2d');
            const chartPie = new Chart(pie, {
                type: 'pie',
                data: {
                    labels: ["MC", "CC"],
                    datasets: [{
                        // label: ["jdfkdsjf", "dsfdsaf"],
                        backgroundColor: [
                            'rgba(134, 39, 39, 1)',
                            'rgba(49, 150, 54, 1)',
                        ],
                        borderColor: 'rgba(134, 39, 39, 1)',
                        data: [{{ $chart['mc'] }}, {{ $chart['cc'] }}],
                    }]
                },
            });
        </script>
        <script>
            const ctx = document.getElementById("chart").getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        "News", "Attendance", "Timetable", "Exam Schendules",
                        "Report Cart", "Events", "Gallery", "Assignments",
                        "Assignment Results", "Pick Up", "E-Learing",
                        "Feeback", "Canteen", "Contact Us", "About Us", "Profile", "Notification"
                    ],
                    datasets: [{

                        label: 'Click',
                        backgroundColor: [
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',
                            'rgba(41, 120, 224, 1)',
                            'rgba(226, 92, 40, 1)',

                        ],
                        borderColor: 'rgb(47, 128, 237)',
                        data: [
                            {{ $chart['new'] }},
                            {{ $chart['attendance'] }},
                            {{ $chart['timetable'] }},
                            {{ $chart['examSchendules'] }},
                            {{ $chart['reportCart'] }},
                            {{ $chart['events'] }},
                            {{ $chart['gallery'] }},
                            {{ $chart['assignments'] }},
                            {{ $chart['assignmentResults'] }},
                            {{ $chart['pickup'] }},
                            {{ $chart['elearing'] }},
                            {{ $chart['feedback'] }},
                            {{ $chart['canteen'] }},
                            {{ $chart['contactUs'] }},
                            {{ $chart['aboutUs'] }},
                            {{ $chart['profile'] }},
                            {{ $chart['notification'] }},

                        ],
                    }]
                },
                options: {

                    legend: {
                        display: false,

                    },
                    scales: {
                        yAxes: [{
                            ticks: {

                                beginAtZero: true,
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                maxRotation: 90, // Rotate labels by 90 degrees
                                minRotation: 0, // Reset rotation angle
                            }
                        }],
                    }

                },
            });
        </script>
    </div>
@endsection
@section('scripts')
    @parent

    <script>
        $(function() {
            $('input[type="checkbox"]').on("change", function() {
                $('#form1').submit();
            });
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            $.extend(true, $.fn.dataTable.defaults, {
                pageLength: 30,
            });
            $('.datatable-SchoolClass:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
            $(function() {
                $('.datetimepicker').datetimepicker({
                    format: 'YYYY/MM/DD'
                });
            });
        })
    </script>
@endsection
