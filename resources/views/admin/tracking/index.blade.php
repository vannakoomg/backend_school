@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Tracking {{ trans('global.list') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('admin.tracking.index') }}">
                    <div class="row">
                        <div class="col-3">
                            <label class="" for="name">Name </label>
                            <input type="search" class="form-control mb-3" placeholder="Find name here" name="search"
                                id="search" value="{{ $search }}">
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="" for="from_date"> From date </label>
                                <input id="startdate" name="fromdate" type="text" class="form-control datetimepicker"
                                    value="{{ $fromdate }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="" for="to_date">To date </label>
                                <input id="id" name="todate" type="text" class="form-control datetimepicker"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger" type="submit">
                            search
                        </button>
                    </div>
                </form>
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">
                            </th>
                            <th>
                                Name
                            </th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($track as $key => $trackee)
                            <tr data-entry-id="{{ $trackee->id }}">
                                <td>
                                </td>

                                <td>
                                    {{ $trackee->name ?? '' }}
                                </td>
                                <td>
                                    {{ $trackee->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('lesson_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            @endcan
            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 50,
            });
            $('.datatable-Lesson:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
        // $('#search').on('keyup', function() {
        //     $value = $(this).val();
        //     $.ajax({
        //         type: 'get',
        //         url: "{{ route('admin.tracking.index') }}",
        //         data: {
        //             'name': $value
        //         },

        //     })
        // });
        // window.onload = function() {
        //     document.getElementById("search").focus();
        // };
        $(function() {
            $('.datetimepicker').datetimepicker({
                format: 'YYYY/MM/DD'
            });;
        });
    </script>
@endsection
