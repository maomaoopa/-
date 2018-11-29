@extends('layout.admins')

@section('title',$title)

@section('content')
    <div class="block-area" id="basic">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2 class="block-title">友情链接</h2>
        <div class="tile p-15">
            <form action="/admin/fri" method="post" class="mws-form" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">链接标题</label>
                    <input type="text" class="form-control input-sm" id="exampleInputText1" placeholder="Enter title" name="ftitle">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputContent1">链接描述</label>
                    <input type="text" class="form-control input-sm" id="exampleInputText2" placeholder="Content" name="descript">
                </div>

                <div class="form-group">
                    <label for="exampleInputUrl1">链接地址</label>
                    <input type="url" class="form-control input-sm" id="exampleInputUrl1" placeholder="Url" name="url">
                </div>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <label for="exampleInputImg1">链接图片</label><br>
                    <input type="hidden" value="" name="tp">
                    <div class="fileupload-new thumbnail small form-control"></div>
                    <div class="fileupload-preview form-control fileupload-exists thumbnail small" style=""></div>
                    <span class="btn btn-file btn-alt btn-sm">
                        <span class="fileupload-new">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">选择图像</font>
                            </font>
                        </span>
                        <span class="fileupload-exists">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">更改</font>
                            </font>
                        </span>
                        <input type="file" name="tp">
                    </span>
                    <a href="#" class="btn-sm btn fileupload-exists" data-dismiss="fileupload"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">去掉</font></font></a>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-sm m-t-10">确定</button>
                <button type="submit" class="btn btn-sm m-t-10">取消</button>
            </form>
        </div>
    </div>
    
@stop

@section('js')
<script>
    $('.alert').delay(2000).fadeOut(2000);
</script>
@stop

<script src="/admins/js/jquery.min.js"></script> <!-- jQuery Library -->
<script src="/admins/js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<!-- Bootstrap -->
<script src="/admins/js/bootstrap.min.js"></script>
<script src="/admins/js/slider.min.js"></script> <!-- Input Slider -->
<script src="/admins/js/fileupload.min.js"></script> <!-- File Upload -->