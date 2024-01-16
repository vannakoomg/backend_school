

<?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(asset('css/xzoom.css'), false); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('css/magnific-popup.css'), false); ?>" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('school_class_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route('admin.canteen.create'), false); ?>">
                    <?php echo e(trans('global.add'), false); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <form method="get" action="<?php echo e(route('admin.canteen.index'), false); ?>" id="form1">
                <span>
                    <?php echo e(trans('global.list'), false); ?> of MEUN
                </span>
                
            </form>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-sm table-bordered table-striped table-hover datatable datatable-SchoolClass">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>

                            <th>
                                Data
                            </th>
                            <th>
                                <?php echo e(trans('Posted by'), false); ?>

                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> </td>
                                <td><?php echo e($menu->menu_date, false); ?></td>
                                <td>
                                    <?php echo e($menu->user_name, false); ?>

                                </td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.canteen.edit', $menu->id), false); ?>">
                                        <?php echo e(trans('global.edit'), false); ?>

                                    </a>
                                    <form action="<?php echo e(route('admin.canteen.destroyMenu', $menu->id), false); ?>" method="POST"
                                        onsubmit="return confirm('<?php echo e(trans('global.areYouSure'), false); ?>');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="<?php echo e(trans('global.delete'), false); ?>">
                                    </form>

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
    <script src="<?php echo e(asset('js/xzoom.min.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/magnific-popup.js'), false); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.hammer.min.js'), false); ?>"></script>


    <script>
        $(function() {

            $('input[type="checkbox"]').on("change", function() {
                $('#form1').submit();
            });

            $('.xzoom-gallery').bind('click', function(event) {
                var div = $(this).parents('.xzoom-thumbs');

                images = new Array();

                var img_length = div.find('img').length;
                for (i = 0; i < img_length; i++)
                    images[i] = {
                        src: div.find('img').eq(i).attr("src")
                    };
                $.magnificPopup.open({
                    items: images,
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
                event.preventDefault();
            });

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


            $.extend(true, $.fn.dataTable.defaults, {
                // order: [[ 1, 'desc' ]],
                pageLength: 30,
            });
            $('.datatable-SchoolClass:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\VANNAK\Desktop\backend_school\resources\views/admin/canteen/index.blade.php ENDPATH**/ ?>