@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-4">文章管理</div>
                    </div>
                  
                </div>
<!--                 <div class="dataTables_wrapper form-inline dt-bootstrap no-footer"> -->
                <!-- Table -->
                <div class="panel-body table-responsive">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">编辑</h4>
                        </div>
                        <form action="{!! route('articles.update', Request()->route('id')) !!}" method="put" id="myform">
                            <div class="modal-body">
                                
                                <div class="form-group">
                                    <label for="title">标题</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" value="{!! $articles->title !!}">
                                    <span id="helpBlock" class="help-block">请填写标题，方便列表查询。</span>
                                </div>

                                <div class="form-group">
                                    <label for="review">文章主要图片</label>
                                    <div>
                                        <image src="{{ $articles->main_image ? $articles->main_image : 'holder.js/175x125?text=点击上传图片 \n 350x250' }}" width=175 height=125 id="mainImage"/>
                                        <input type="hidden" name="main_image" value="{{ $articles->main_image }}">
                                        <span id="helpBlock" class="help-block">请上传350x250尺寸的图片。(可选)</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="infomation">简要</label>
                                    <textarea class="form-control" rows="3" name="infomation" id="infomation" placeholder="Review...">{!! $articles->infomation !!}</textarea>

                                    <span id="helpBlock" class="help-block">请填写文章简要。</span>
                                </div>
                                <div class="form-group">
                                    <label for="content">内容</label>
                                    <textarea id="container" name="content">
                                    {!! $articles->content !!}
                                    </textarea>
                                    <span id="helpBlock" class="help-block">请填写文章内容。</span>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default back" data-dismiss="modal" OnClick="window.history.go(-1)">返回</button>
                                <button type="submit" class="btn btn-primary">保存</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- 编辑器源码文件 -->
<script src="{{ asset('js/ueditor.config.js') }}"></script>
<script src="{{ asset('js/ueditor.all.min.js') }}"></script>

<script>
$(function() {
    // 初始化编辑器
    var ue = UE.getEditor('container');

    var validator = $("#myform").submit(function(){
        ue.sync();
    }).validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: '',
        rules: {
            title: "required",
            infomation: "required",
            content: "required",
        },
        messages: {
            title: "标题不能为空",
            infomation: "简介不能为空",
            content: "内容不能为空",
        },
        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error');
            label.remove();
        },
        submitHandler: function(form) {
            var options = { 
                type: $(form).attr('method'),
                success: function(){
                    $('#articles-table').DataTable().ajax.reload( null, false );
                    window.history.go(-1);
                }, 
 
                clearForm: true ,       // clear all form fields after successful submit 
                resetForm: true ,       // reset the form after successful submit 
            };  
            $(form).ajaxSubmit(options); 
        }
     });

    // 图片上传
    var uploader = new plupload.Uploader({
        browse_button: 'mainImage', // this can be an id of a DOM element or the DOM element itself
        url: '/api/image/upload',
        filters: {
            max_file_size: '10mb',
            mime_type: [{ title: "Image files", extensions: "jpg,png,jpeg" }]
        }
    });

    uploader.bind('FilesAdded', function(up, files) {
        uploader.start();
    });

    uploader.bind('FileUploaded', function(up, files, object) {
        imageUpResponse(object.response);
    });

    var imageUpResponse = function (data) {
        data = jQuery.parseJSON(data);
        // console.log(data);
        $("#mainImage").attr('src', data.path);
        $("input[name=main_image]").val(data.path);
    }

    uploader.init();
});
</script>
@endpush