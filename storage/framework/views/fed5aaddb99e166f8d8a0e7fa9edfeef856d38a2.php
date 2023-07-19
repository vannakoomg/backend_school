

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Tracking <?php echo e(trans('global.list'), false); ?>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="<?php echo e(route('admin.tracking.index'), false); ?>">
                    <div class="row">
                        <div class="col-3">
                            <label class="" for="name">Name </label>
                            <input type="search" class="form-control mb-3" placeholder="Find name here" name="search"
                                id="search" value="<?php echo e($search, false); ?>">
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="" for="from_date"> From date </label>
                                <input id="startdate" name="fromdate" type="text" class="form-control datetimepicker"
                                    value="<?php echo e($fromdate, false); ?>">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="" for="to_date">To date </label>
                                <input id="id" name="todate" type="text" class="form-control datetimepicker"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            search
                        </button>
                    </div>
                </form>
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">
                            </th>
                            <th>
                                Name
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
                                    <?php echo e($trackee->name ?? '', false); ?>

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
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lesson_delete')): ?>
                let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete'), false); ?>'
            <?php endif; ?>
            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 50,
            });
            $('.datatable-Lesson:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
        // $('#search').on('keyup', function() {
        //     $value = $(this).val();
        //     $.ajax({
        //         type: 'get',
        //         url: "<?php echo e(route('admin.tracking.index'), false); ?>",
        //         data: {
        //             'name': $value
        //         },

        //     })
        // });
        // window.onload = function() {
        //     document.getElementById("search").focus();
        // };
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD'
            });;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\web_backend\resources\views/admin/tracking/index.blade.php ENDPATH**/ ?>