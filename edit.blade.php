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
        <h2 class="block-title">公告</h2>
        <div class="tile p-15">
            <form action="/admin/notice/{{$res->nid}}" method="post" class="mws-form" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="exampleInputContent1">公告内容</label>
                    <input type="text" class="form-control input-sm" id="exampleInputText2" placeholder="Content" name="content" value="{{$res->content}}">
                </div>
                {{csrf_field()}}
                {{method_field('PUT')}}
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