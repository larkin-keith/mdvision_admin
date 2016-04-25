@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">操作面板 （待完善）</div>

                <div class="panel-body">
                    
                    <div class="pannel-title">
                        <form action="" method="post" id="myform">
                            <div class="modal-body">
                                <p>网站访问：<a href="http://www.mdvision.cn" target=_blank> www.mdvision.cn </a></p>
                                <h3>关于我们</h3>
                                <div class="form-group">
                                    <label for="title">关于我们标题</label>
                                    <input type="text" class="form-control" name="title" placeholder="标题" value="">
                                    <span id="helpBlock" class="help-block">请填写标题。</span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="content">内容</label>
                                    <!-- 加载编辑器的容器 -->
                                    <textarea id="container" name="content" >
                                    </textarea>
                                    <!-- <textarea class="form-control" id="content" name="content" rows="15" cols="80"></textarea> -->
                                    <span id="helpBlock" class="help-block">请填写关于我们的内容。</span>
                                </div>
                                <h3>联系我们</h3>
                                <div class="form-group">
                                    <label for="title">地址</label>
                                    <input type="text" class="form-control" name="address" placeholder="地址" value="">
                                    <span id="helpBlock" class="help-block">请填写地址。</span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">电话</label>
                                    <input type="text" class="form-control" name="phone" placeholder="电话" value="">
                                    <span id="helpBlock" class="help-block">请填写电话。</span>
                                </div>

                                <div class="form-group">
                                    <label for="title">邮箱</label>
                                    <input type="text" class="form-control" name="email" placeholder="邮箱" value="">
                                    <span id="helpBlock" class="help-block">请填写邮箱。</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default back" data-dismiss="modal" OnClick="window.history.go(-1)">返回</button> -->
                                <button type="" class="btn btn-primary">保存</button>
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
});
</script>
@endpush