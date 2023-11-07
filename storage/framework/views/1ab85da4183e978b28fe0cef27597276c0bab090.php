
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Student No App In <?php echo e($cam, false); ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>UserID</th>
                            <th>Name</th>
                            <th>NameKH</th>
                            <th>className</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <tr>
                                    <td><?php echo e($key + 1, false); ?></td>
                                    <td><?php echo e($value->email, false); ?></td>
                                    <td><?php echo e($value->name, false); ?></td>
                                    <td><?php echo e($value->namekh, false); ?></td>
                                    <td><?php echo e($value->class_name, false); ?></td>
                                </tr>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            $.extend(true, $.fn.dataTable.defaults, {
                pageLength: 30,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\school_v4\resources\views/admin/home/show.blade.php ENDPATH**/ ?>