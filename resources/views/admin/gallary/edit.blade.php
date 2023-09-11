@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit
        </div>
        <div class="card-body">
            <form method="POST" action={{ route('admin.gallary.update', $gallary->id) }} enctype="multipart/form-data"
                class="dropzone" id="dropzone">
                @csrf
                <div class="form-group">
                    <label class="requires" for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $gallary->name }}" />
                </div>
                <div class="form-group">
                    <label class="" for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $gallary->description }}" />
                </div>
            </form>
            <button class="btn btn-success mt-4" type="submit" id="uploadfiles">
                {{ trans('global.save') }}
            </button>
        </div>
    </div>
@endsection
@section('scripts')
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
                    url: '{{ route('admin.gallary.init') }}',
                    type: "GET",
                    data: {
                        id: {{ $gallary->id }},
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
                    url: '{{ route('admin.gallary.destroy') }}',
                    type: 'POST',
                    data: "id=" + file.id + '&_token=' + "{{ csrf_token() }}",
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
@endsection
