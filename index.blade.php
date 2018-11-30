@extends('layout.admins')

@section('title',$title)

@section('content')
    <div class="block-area" id="tableHover">
        <form action="/admin/notice" method='get'>
            <div class="block-title">
                <label>
                    公告:
                    <input type="text" class="form-control m-b-10" name='content' value="{{$request->content}}">
                </label>

                <button class='btn btn-info'>搜索</button>
            </div>
        </form>

        <div class="table-responsive overflow" tabindex="5003" style="overflow: hidden; outline: none;">
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">公告内容</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($res as $k=>$v)
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="checkbox" name="checkbox[]"></font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->nid}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->content}}</font></font></td>
						<td>
                            <a href="/admin/notice/{{$v->nid}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/notice/{{$v->nid}}" method='post' style='display:inline'>
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