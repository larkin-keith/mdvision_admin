@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">操作面板</div>

                <div class="panel-body">
                    
                    <div class="pannel-title">
                        <form action="" method="post" id="myform">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <p>网站访问：<a href="http://www.mdvision.cn" target=_blank> www.mdvision.cn </a></p>
                                <h3>关于我们</h3>
                                <div class="form-group">
                                    <label for="title">关于我们标题</label>
                                    <input type="text" class="form-control" name="title" placeholder="标题" value="{!! $about ? $about->title : '' !!}">
                                    <span id="helpBlock" class="help-block">请填写标题。</span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="content">内容</label>
                                    <!-- 加载编辑器的容器 -->
                                    <textarea id="container" name="content" >
                                    {!! $about ? $about->content : '' !!}
                                    </textarea>
                                    <!-- <textarea class="form-control" id="content" name="content" rows="15" cols="80"></textarea> -->
                                    <span id="helpBlock" class="help-block">请填写关于我们的内容。</span>
                                </div>
                                <h3>联系我们</h3>
                                <div class="form-group">
                                    <label for="title">地址</label>
                                    <input type="text" class="form-control" name="address" placeholder="地址" value="{!! $contact ? $contact->address : '' !!}">
                                    <span id="helpBlock" class="help-block">请填写地址。</span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">电话</label>
                                    <input type="text" class="form-control" name="phone" placeholder="电话" value="{!! $contact ? $contact->phone : '' !!}">
                                    <span id="helpBlock" class="help-block">请填写电话。</span>
                                </div>

                                <div class="form-group">
                                    <label for="title">邮箱</label>
                                    <input type="text" class="form-control" name="email" placeholder="邮箱" value="{!! $contact ? $contact->email : '' !!}">
                                    <span id="helpBlock" class="help-block">请填写邮箱。</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default back" data-dismiss="modal" OnClick="window.history.go(-1)">返回</button> -->
                                <button type="submit" id="myButton" class="btn btn-primary ladda-button" data-loading-text="Loading..." autocomplete="off">保存</button>
                            </div>
                        </form>
                    </div>
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
    $("#myButton").click(function(){
        $(this).button('loading').delay(1000).queue(function() {
            // $(this).button('reset');
        });        
    });
    // 表单验证
    $("#myform").validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: '',
        rules: {
            title: "required",
            content: "required",
            address: "required",
            phone: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            title: "关于我们标题不能为空",
            content: "关于我们内容不能为空",
            address: "联系我们地址不能为空",
            phone: {
                required: "联系我们电话不能为空",
                number: "请输入数字"
            },
            email: {
                required: "联系我们Email不能为空",
                email: "请输入正确的Email地址"
            }
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
                success: function () {
                    var $btn = $("#myButton").button('loading');
                    // business logic...
                    $btn.button('reset')
                }
                // clearForm: true ,       // clear all form fields after successful submit 
                // resetForm: true ,       // reset the form after successful submit 
            };  
            $(form).ajaxSubmit(options); 
        }
     });
});
</script>
@endpush