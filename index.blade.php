@extends('layout.admins')

@section('title',$title)

@section('content')
    <div class="block-area" id="tableHover">
        <h2 class="block-title">
        	<font style="vertical-align: inherit;">
        		<font style="vertical-align: inherit;">广告管理表</font>
        	</font>
        </h2>
        <div class="media-body">
                        
            <form action="/admin/ad" method='get'>
            <input class="input-sm col-md-4 pull-right message-search" type="text" name='aname' value='{{$request->aname}}'>

            <input type="submit" name="" class='btn btn-info' value="搜索">
       
            <div class="clearfix"></div>
            </form>
            
        </div>
        <div class="table-responsive overflow" tabindex="5003" style="overflow: hidden; outline: none;">
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告名称</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告内容</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">广告图片</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加时间</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">操作</font></font></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($res as $k=>$v)
                    <tr>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="checkbox" name="checkbox[]"></font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->aid}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->aname}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->content}}</font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><img style="width:150px;height:150px" src="{{$v->apic}}"></font></font></td>
                        <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
						<td>
                            <a href="/admin/ad/{{$v->aid}}/edit" class='btn btn-info'>修改</a>
                            <form action="/admin/ad/{{$v->aid}}" method='post' style='display:inline'>
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