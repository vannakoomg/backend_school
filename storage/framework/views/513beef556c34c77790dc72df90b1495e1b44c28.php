

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('global.create'), false); ?>

        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.events.index'), false); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="from_date"> Start Date </label>
                            <input id="startdate" name="startdate" type="text"
                                class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                value="<?php echo e(old('name', ''), false); ?>" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="to_date">End Date </label>
                            <input id="end_date" name="end_date" type="text"
                                class="form-control datetimepicker <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>"
                                value="<?php echo e(old('name', ''), false); ?>" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="" for="template_id">Event Type</label>
                            <select name='event_type_id' class="custom-select select2 ">
                                <?php $__currentLoopData = $eventsType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $Type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Type->id, false); ?>"><?php echo e($Type->name, false); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="required" for="From Date">Title</label>
                    <input class="form-control <?php echo e($errors->has('name') ? 'is-invalid' : '', false); ?>" type="text" name="title"
                        id="title" value="<?php echo e(old('name', ''), false); ?>" required>
                </div>
                <div class="form-group">
                    <label for="time">Description</label>
                    <input class="form-control " type="text" name="time" id="name" value="">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        <?php echo e(trans('global.save'), false); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
    <script>
        const startDateInput = document.getElementById('startdate');
        const endDateInput = document.getElementById('end_date');
        startDateInput.addEventListener('blur', function() {
            const startDateValue = startDateInput.value;
            endDateInput.value = startDateValue;
        });
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD',
                locale: 'en',
                sideBySide: true,
                icons: {
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                }
            });;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\VANNAK\Desktop\backend_school\resources\views/admin/events/create.blade.php ENDPATH**/ ?>