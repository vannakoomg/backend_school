

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit'), false); ?>

        </div>
        <div class="card-body">
            

            <form method="GET" action="http://127.0.0.1:8000/admin/delete/event?id=88">
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger" type="submit">
                    Delete this event
                </button>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD'
            });;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\web_backend\resources\views/admin/events/edit.blade.php ENDPATH**/ ?>