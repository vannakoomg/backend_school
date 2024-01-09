

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.edit'), false); ?>

        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.events.update', $event->id), false); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="from_date"> Start Date </label>
                            <input id="startdate" name="startdate" type="text"
                                class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                value="<?php echo e($event->start, false); ?>" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="to_date">End Date </label>
                            <input id="id" name="end_date" type="text"
                                class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                value="<?php echo e($endddd, false); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="time">Time</label>
                            <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>" type="text"
                                name="time" id="name" value="<?php echo e($event->time, false); ?>" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="" for="template_id">Evnet Type</label>
                            <select name='event_type_id' class="custom-select select2">
                                <?php $__currentLoopData = $eventsType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key, false); ?>"
                                        <?php echo e($key + 1 == $event->event_type_id ? 'selected' : '', false); ?>>
                                        <?php echo e($Type->name, false); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="required" for="From Date">Title</label>
                    <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>" type="text"
                        name="title" id="title" value="<?php echo e($event->title, false); ?>" required>
                </div>
                <div class="form-group pt-5">
                    <button class="btn btn-success mr-1" type="submit">
                        <?php echo e(trans('global.update'), false); ?>

                    </button>
                    <a class="btn btn-danger" href="<?php echo e(route('admin.events.destroy', $event->id), false); ?>">
                        Delete
                    </a>
                </div>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\school_v4\resources\views/admin/events/edit.blade.php ENDPATH**/ ?>