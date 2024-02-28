@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.events.index') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="from_date"> Start Date </label>
                            <input id="startdate" name="startdate" type="text"
                                class="form-control datetimepicker {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name', '') }}" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="to_date">End Date </label>
                            <input id="end_date" name="end_date" type="text"
                                class="form-control datetimepicker {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name', '') }}" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="" for="template_id">Event Type</label>
                            <select name='event_type_id' class="custom-select select2 ">
                                @foreach ($eventsType as $index => $Type)
                                    <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="required" for="From Date">Title</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ old('name', '') }}" required>
                </div>
                <div class="form-group">
                    <label for="time">Description</label>
                    <input class="form-control " type="text" name="time" id="name" value="">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        const startDateInput = document.getElementById('startdate');
        const endDateInput = document.getElementById('end_date');
        startDateInput.addEventListener('blur', function() {
            const startDateValue = startDateInput.value;
            endDateInput.value = startDateValue;
        });
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD'
            });;
        });
    </script>
@endsection
