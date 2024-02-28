
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Track When User Click On Menu
        </div>
        <div class="card-body">
            <div class="container-fluid text-center">
                <div class="row align-items-start">
                    <form action="<?php echo e(route('admin.tracking.index'), false); ?>">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group text-left">
                                    <label class="required" for="from_date">From Date </label>
                                    <input id="from_date" name="from_date" type="text"
                                        class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                        value="<?php echo e($fromDate, false); ?>" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group text-left">
                                    <label for="end_date" class="required">End Date </label>
                                    <input id="end_date" name="end_date" type="text"
                                        class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>",
                                        value="<?php echo e($endDate, false); ?>" required>
                                </div>
                            </div>
                            <div class="col-1">
                                <label for="end_date">Search </label>
                                <button class="btn btn-success " type="submit" class="form-control">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="col-8">
                        <canvas id="chart"></canvas>
                    </div>
                    <?php if($chart['mc'] != 0 || $chart['cc'] != 0): ?>
                        <div class="col-4 align-self-center">
                            Summary
                            <canvas id="chartPie" class=""></canvas>
                        </div>
                    <?php endif; ?>


                </div>
            </div>

            <div class="table-responsive">

                <table class=" table table-sm table-bordered table-striped table-hover datatable datatable-SchoolClass">
                    <thead>
                        <tr>
                            <th width="10">
                            </th>
                            <th>
                                Student ID
                            </th>
                            <th>
                                Student Name
                            </th>
                            <th>
                                Menu Name
                            </th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $track; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trackee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-entry-id="<?php echo e($trackee->id, false); ?>">
                                <td>
                                </td>
                                <td>
                                    <?php echo e($trackee->user_name ?? '', false); ?>

                                </td>
                                <td>
                                    <?php echo e($trackee->name ?? '', false); ?>

                                </td>
                                <td>
                                    <?php echo e($trackee->menu_name ?? '', false); ?>

                                </td>
                                <td>
                                    <?php echo e($trackee->created_at, false); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    labels: ["MC:  <?php echo e($chart['mc'], false); ?>", "CC :  <?php echo e($chart['cc'], false); ?>"],
                    datasets: [{
                        backgroundColor: [
                            'rgba(134, 39, 39, 1)',
                            'rgba(49, 150, 54, 1)',
                        ],
                        borderColor: 'rgba(134, 39, 39, 1)',
                        data: [<?php echo e($chart['mc'], false); ?>, <?php echo e($chart['cc'], false); ?>],
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
                        "News", "Attendance", "Timetable", "Exam Schedule",
                        "Report Card", "Events", "Gallery", "Assignments",
                        "Assignment Results", "Pick Up", "E-Learning",
                        "Feedback", "Canteen", "Contact Us", "About Us", "Profile", "Notification"
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
                            <?php echo e($chart['announcement'], false); ?> ?? 1,
                            <?php echo e($chart['attendance_calendar'], false); ?>,
                            <?php echo e($chart['timetable'], false); ?>,
                            <?php echo e($chart['exam_schedule'], false); ?>,
                            <?php echo e($chart['student_report'], false); ?>,
                            <?php echo e($chart['events'], false); ?>,
                            <?php echo e($chart['gallary'], false); ?>,
                            <?php echo e($chart['homeworks'], false); ?>,
                            <?php echo e($chart['class_results'], false); ?>,
                            <?php echo e($chart['pick_up_card'], false); ?>,
                            <?php echo e($chart['e_learning'], false); ?>,
                            <?php echo e($chart['feedback'], false); ?>,
                            <?php echo e($chart['canteen'], false); ?>,
                            <?php echo e($chart['contact us'], false); ?>,

                            <?php echo e($chart['about us'], false); ?>,
                            <?php echo e($chart['profile'], false); ?>,
                            <?php echo e($chart['notification'], false); ?>,

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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\VANNAK\Desktop\backend_school\resources\views/admin/tracking/index.blade.php ENDPATH**/ ?>