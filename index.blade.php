@extends('layout.admins')

@section('title',$title)

@section('content')
    <div class="block-area" id="tableHover">
        <h2 class="block-title">
        	<font style="vertical-align: inherit;">
        		<font style="vertical-align: inherit;">友情链接表</font>
        	</font>
            
        </h2>
        <form action="/admin/fir" method='get'>
            <input class="input-sm col-md-4 pull-right message-search" type="text" name='ftitle' value='{{$request->ftitle}}'>

            <input type="submit" name="" class='btn btn-info' value="搜索">
       
            <div class="clearfix"></div>
        </form>
        <div class="table-responsive overflow" tabindex="5003" style="overflow: hidden; outline: none;">
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">链接标题</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">链接内容</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">链接地址</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">链接图片</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($res as $k=>$v)
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="checkbox" name="checkbox[]"></font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->fid}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->ftitle}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->descript}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->url}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font><img style="width:100px;height:100px" src="{{$v->tp}}"></td>
                        <td>
                            <a href="/admin/fri/{{$v->fid}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/fri/{{$v->fid}}" method='post' style='display:inline'>
                                {{csrf_field()}}
                                {{method_field("DELETE")}}
                                <button class='btn btn-danger'>删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="media text-center">
                <ul class="pagination">                                 
                    {{$res->render()}}
                </ul>
            </div>
        </div>
    </div>
    
@stop

@section('js')
<script>
    $('.alert').delay(2000).fadeOut(2000);
</script>
@stop
