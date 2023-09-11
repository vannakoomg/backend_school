

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Edit
        </div>
        <div class="card-body">
            <form method="POST" action=<?php echo e(route('admin.gallary.update', $gallary->id), false); ?> enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label class="requires" for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo e($gallary->name, false); ?>" />
                </div>
                <div class="form-group">
                    <label class="" for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="<?php echo e($gallary->description, false); ?>" />
                </div>
            </form>
            <button class="btn btn-success mt-4" type="submit" id="uploadfiles">
                <?php echo e(trans('global.save'), false); ?>

            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        var myDropzone = new Dropzone(".dropzone", {
            headers: {
                'X-CSRFToken': $('meta[name="token"]').attr('content')
            },
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            parallelUploads: 10000,
            maxFilesize: 100, //maximum file size 2MB
            maxFiles: 100,
            timeout: 50000,
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            dictDefaultMessage: '<div class="dropzone_bx"><button type="button">Browse a file</button></div>',
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

                        $.each(response, function(key, value) {
                            var mockFile = {
                                name: value.filename,
                                size: value.size,
                                id: value.id
                            };
                            myDropzone.options.addedfile.call(
                                myDropzone,
                                mockFile
                            );
                            myDropzone.options.thumbnail.call(
                                myDropzone,
                                mockFile,
                                "storage/products/" + value.name
                            );
                            $("[data-dz-thumbnail]").css("height", "120");
                            $("[data-dz-thumbnail]").css("width", "120");
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
        Dropzone.autoDiscover = false;
        myDropzone.on("success", function(file, response) {
            console.log(response);
        });
        $('#uploadfiles').click(function() {
            myDropzone.processQueue();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wrok_in_ics\school_v4\resources\views/admin/gallary/edit.blade.php ENDPATH**/ ?>