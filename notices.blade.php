@extends('layout.homes')


@section('title',$title)

@section('content')
<!-- 首页导航栏 -->
	<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
				
			</div>
			<ul class="nva-list">
				<a href="/"><li class="active">首页</li></a>
				<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
				<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
				<a href="class_room.html"><li>七班学堂</li></a>
				<a href="enterprise_id.html"><li>企业账号</li></a>
				<a href="udai_contract.html"><li>诚信合约</li></a>
				<a href="item_remove.html"><li>实时下架</li></a>
			</ul>
			
		</div>
	</div>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="content inner">
		<section class="panel__div panel-message__div clearfix">
			<div class="filter-value">
				<div class="filter-title">公告通知</div>
			</div>
			<div class="pull-left">
				<div class="msg-list">
					
					@foreach($rs as $v)
					<a class="ep" href="JavaScript:void(0)" name="{{$v->nid}}">{{$v->ntitle}}</a>
					@endforeach
					
				</div>
				
			</div>
			<div class="message-box pull-right">
				<div class="head-div clearfix posr">
					<div class="title"><!-- {{$v->ntitle}} --></div>
					<div class="time pull-right"><!-- {{date("Y-m-d H:i:s",$v->addtime)}} --></div>
				</div>
				<div class="html-code">
					<!-- <p>{!!$v->content!!}</p> -->
				</div>
			</div>
			
		</section>
	</div>
	<script>
		$('.ep').click(function(){
			var id = $(this).attr('name');
			// alert(id);
			$.get('/notice/ajax',{nid:id},function(data){
				// console.log(data[0].content);
				$('.title').html(data[0].ntitle);
				$('.html-code').html(data[0].content);
			})
		})
	</script>
@stop

