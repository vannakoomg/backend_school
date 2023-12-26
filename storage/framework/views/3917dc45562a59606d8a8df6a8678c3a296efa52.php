
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Create
        </div>
        <div class="card-body">
            <form method="POST" action=<?php echo e(route('admin.canteen.store'), false); ?> enctype="multipart/form-data" class="dropzone"
                id="dropzone">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="" for="event_date">Event Date </label>
                    <input id="menu_date" name="menu_date" type="text" class="form-control datetimepicker"
                        value=<?php echo e(date('Y-m-d'), false); ?>>
                </div>
                <input type="hidden" name="save_send" value="send">
                <label class="" for="event_date">Photo meun </label>
                <div class="form-group"></div>

            </form>
            <button class="btn btn-success mt-3  pl-4 pr-4" type="submit" id="uploadfiles">
                <?php echo e(trans('global.save'), false); ?>

            </button>
            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            headers: {
                'X-CSRFToken': $('meta[name="token"]').attr('content')
            },
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100, // Number of files process at a time (default 2)
            maxFilesize: 4096, // maximum file size 2MB
            maxFiles: 100,
            timeout: 180000,
            resizeQuality: 0.5,
            addRemoveLinks: "true",
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            dictDefaultMessage: '<button class="btn btn-info mt-4 " >  Browse File  </button>',
            dictResponseError: 'Error uploading file!',
            createImageThumbnails: true,
            dictRemoveFile: "Remove",
        });
        Dropzone.autoDiscover = false;
        myDropzone.on("success", function(file, response) {
            window.location.href = "<?php echo e(URL::to('admin/canteen'), false); ?>"
        });
        myDropzone.on('error', function(file, response) {
            // console.log(response.errors.file); // Log validation errors

        });
        $('#uploadfiles').click(function() {
            $('input[name="save_send"]').val("");
            if (myDropzone.files.length > 0) {
                myDropzone.processQueue();
            } else {
                $('#dropzone').submit();
            }
        });
        $(".btn_send").click(function() {
            $('input[name="save_send"]').val("send");
            if (myDropzone.files.length > 0) {
                myDropzone.processQueue();
            } else {
                $('#dropzone').submit();
            }
        });
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD'
            });;
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\school_v4\resources\views/admin/canteen/create.blade.php ENDPATH**/ ?>