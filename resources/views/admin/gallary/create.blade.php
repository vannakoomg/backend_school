@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Create
        </div>
        <div class="card-body">
            <form method="POST" action={{ route('admin.gallary.store') }} enctype="multipart/form-data" class="dropzone"
                id="dropzone">
                @csrf
                <div class="form-group mb-4">
                    <label class="required" for="From Date">Title</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('name', '') }}" required>
                </div>
                <div class="form-group mb-4">
                    <label class="required" for="From Date">Description</label>
                    <input type="text" class="form-control" name="description" id="description" value=""
                        required />
                </div>
                <div class="form-group mb-4">
                    <label class="required" for="event_date">Event Date </label>
                    <input id="event_date" name="event_date" type="text" class="form-control datetimepicker"
                        value={{ date('Y-m-d') }}>
                </div>
            </form>
            <button class="btn btn-success mt-3  pl-4 pr-4" type="submit" id="uploadfiles">
                {{ trans('global.save') }}
            </button>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", {
            headers: {
                'X-CSRFToken': $('meta[name="token"]').attr('content')
            },
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100, // Number of files process at a time (default 2)
            maxFilesize: 4096, //maximum file size 2MB
            maxFiles: 100,
            timeout: 180000,
            resizeQuality: 0.5,
            addRemoveLinks: "true",
            acceptedFiles: ".jpeg,.jpg,.png,.pdf",
            dictDefaultMessage: '<dev class="btn btn-info mt-4 " >  Browse File  </dev>',
            dictResponseError: 'Error uploading file!',
            createImageThumbnails: true,
            dictRemoveFile: "Remove",
        });
        Dropzone.autoDiscover = false;
        myDropzone.on("success", function(file, response) {
            window.location.href = "{{ URL::to('admin/gallary') }}"
        });
        $('#uploadfiles').click(function() {

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
@endsection
