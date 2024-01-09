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
                <div class="form-group mb-4">
                    <label class="required" for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $gallary->name }}" />
                </div>
                <div class="form-group mb-4">
                    <label class="required " for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                        value="{{ $gallary->description }}" />
                </div>
                <div class="form-group mb-4">
                    <label class="required" for="event_date">Event Date </label>
                    <input id="event_date" name="event_date" type="text" class="form-control datetimepicker"
                        value={{ $gallary->event_date }}>
                </div>
            </form>
            <div class="form-group mb-4"><button class="btn btn-success mt-4" type="submit" id="update-btn">
                    {{ trans('global.save') }}
                </button></div>
        </div>
    </div>
@endsection
@section('scripts')
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
            dictDefaultMessage: '<dev class="btn btn-info mt-4 " >  Browse File  </dev>',
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
        myDropzone.on("success", function(file, response) {
            window.location.href = "{{ URL::to('admin/gallary') }}"
        });
        $('#update-btn').click(function(e) {
            if (myDropzone.files.length > 0) {
                myDropzone.processQueue();
            } else {
                $('#dropzone').submit();
            }
        });
    </script>
@endsection
