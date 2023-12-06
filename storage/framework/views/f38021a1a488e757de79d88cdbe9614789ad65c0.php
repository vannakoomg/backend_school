

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Edit
        </div>
        <div class="card-body">
            <form method="POST" action=<?php echo e(route('admin.gallary.update', $gallary->id), false); ?> enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                <?php echo csrf_field(); ?>
                <div class="form-group mb-4">
                    <label class="required" for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo e($gallary->name, false); ?>" />
                </div>
                <div class="form-group mb-4">
                    <label class="required " for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="<?php echo e($gallary->description, false); ?>" />
                </div>
                <div class="form-group mb-4">
                    <label class="required" for="event_date">Event Date </label>
                    <input id="event_date" name="event_date" type="text" class="form-control datetimepicker"
                        value=<?php echo e($gallary->event_date, false); ?>>
                </div>
            </form>
            <div class="form-group mb-4"><button class="btn btn-success mt-4" type="submit" id="update-btn">
                    <?php echo e(trans('global.save'), false); ?>

                </button></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: 100, // Number of files process at a time (default 2)
            maxFilesize: 100, //maximum file size 2MB
            maxFiles: 100,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            dictDefaultMessage: '<button class="btn btn-info mt-4 " >  Browse File  </button>',
            dictResponseError: 'Error uploading file!',
            parallelChunkUploads: true,
            createImageThumbnails: true,
            dictRemoveFile: "Remove",
            init: function() { // start of getting existing imahes
                myDropzone = this;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: '<?php echo e(route('admin.gallary.init'), false); ?>',
                    type: "GET",
                    data: {
                        id: <?php echo e($gallary->id, false); ?>,
                        _token: $('meta[name="csrf-token"]').attr("content")
                    },
                    dataType: "json",
                    success: function(response) { // get result
                        console.log(response);
                        $.each(response, function(key, value) {
                            var mockFile = {
                                name: "http://school.ics.edu.kh/storage/image/" +
                                    value.filename,
                                size: value.size,
                                id: value.id
                            };
                            myDropzone.options.addedfile.call(
                                myDropzone,
                                mockFile,
                                // name: $file,
                            );
                            myDropzone.options.thumbnail.call(
                                myDropzone,
                                mockFile,
                                "http://school.ics.edu.kh/storage/image/" +
                                value.filename,
                            );
                            $("[thumbnail]").css("height", "240");
                            $("[data-dz-thumbnail]").css("width", "240");
                            $("[data-dz-thumbnail]").css("object-fit", "cover");
                        });

                    }
                });
            },
            removedfile: function(file) {
                var name = file.filename;
                console.log(file.id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: '<?php echo e(route('admin.gallary.destroy'), false); ?>',
                    type: 'POST',
                    data: "id=" + file.id + '&_token=' + "<?php echo e(csrf_token(), false); ?>",
                    dataType: 'html',
                    success: function(data) {
                        console.log("successfully removed!!");
                    },
                    error: function(e) {
                        console.log("Error removed!!");
                    }
                });
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
        });
        myDropzone.on("success", function(file, response) {
            window.location.href = "<?php echo e(URL::to('admin/gallary'), false); ?>"
        });
        $('#update-btn').click(function(e) {
            if (myDropzone.files.length > 0) {
                myDropzone.processQueue();
            } else {
                $('#dropzone').submit();
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\school_v4\resources\views/admin/gallary/edit.blade.php ENDPATH**/ ?>