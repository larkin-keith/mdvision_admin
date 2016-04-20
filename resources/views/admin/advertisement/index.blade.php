@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">广告位管理</div>
                        <div class="col-md-1 col-md-offset-7">
                            <a href="/advertisement/create" class="btn btn-primary btn-xs edit">+ 添加</a>
                        </div>
                    </div>
                  
                </div>
<!--                 <div class="dataTables_wrapper form-inline dt-bootstrap no-footer"> -->
                <!-- Table -->
                <div class="panel-body table-responsive">
                    <table class="table table-hover table-bordered" id="advertisement-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>标题</th>
                                <th>创建时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
$(function() {
    var _advertisement = $('#advertisement-table');

    var table = _advertisement.DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('advertisement.data') !!}',
        // dom:' <"search"fl><"top">rt<"bottom"ip><"clear">',
        order: [[0, 'desc']],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'operator', name: 'operator', render: function(data, type, full, meta) {
                var status = full.status == "enable" ? '禁用' : '启用';
                var color = full.status == "enable" ? 'green' : 'yellow';
                return '<a href="/advertisement/'+full.id+'" class="btn btn-primary btn-xs edit">编辑</a>\
                <a href="javascript:;" class="btn btn-xs '+ color +' isEnable" data-url="/advertisement/'+full.id+'" data-method="put" data-toggle="modal" data-target="#modal">'+ status +'</a>\
                <a href="javascript:;" data-placement="top" class="btn btn-danger btn-xs delete" data-trigger="focus" data-toggle="popover" >删除</a>';
            }, orderable: false, searchable: false }
        ]
    });

    // $('[data-toggle="popover"]').popover({
    //     title: "请选择操作",
    //     html: 'true',
    //     content: '<button type="button" class="btn btn-success btn-xs delete">确定</button>\
    //     <button type="button" class="btn btn-danger btn-xs">取消</button>'
    // });

    _advertisement.on( 'click', 'a.delete', function () {
        var id = table.row( $(this).closest('tr') ).data().id
        // console.log(id)
        var url = '/advertisement/' + id;
        $.ajax({
            url: url,
            type: 'DELETE',
            success: function() {
                table.ajax.reload( null, false );
            }
        })
    });

    _advertisement.on('click', 'a.isEnable', function () {
        var id = table.row( $(this).closest('tr') ).data().id
        // console.log(id)
        var url = '/advertisement/' + id + '/isEnable';
        $.ajax({
            url: url,
            type: 'put',
            success: function() {
                table.ajax.reload( null, false );
            }
        })
    });
});
</script>
@endpush
