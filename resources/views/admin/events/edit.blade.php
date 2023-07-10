@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="" for="from_date"> Start Date </label>
                            <input id="startdate" name="startdate" type="text" class="form-control datetimepicker"
                                value="{{ $event->start }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="" for="to_date">End Date </label>
                            <input id="id" name="end_date" type="text" class="form-control datetimepicker"
                                value="{{ $endddd }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="required" for="time">Time</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                name="time" id="name" value="{{ $event->time }}" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label class="" for="template_id">Action</label>
                            <select name='action' class="custom-select select2">
                                @foreach ($eventsType as $key => $Type)
                                    <option value="{{ $key }}" {{ $key + 1 == $event->action ? 'selected' : '' }}>
                                        {{ $Type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="required" for="From Date">title</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="title"
                        id="title" value="{{ $event->title }}" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>

                </div>
            </form>
            <a href="{{ route('admin.events.destroy', $event->id) }}">
                <button class="btn btn-danger" type="submit">
                    Delete this event
                </button>
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD'
            });;
        });
    </script>
@endsection
