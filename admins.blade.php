<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>@yield('title')</title>
            
        <!-- CSS -->
        <link href="/admins/css/bootstrap.min.css" rel="stylesheet">
        <link href="/admins/css/animate.min.css" rel="stylesheet">
        <link href="/admins/css/font-awesome.min.css" rel="stylesheet">
        <link href="/admins/css/form.css" rel="stylesheet">
        <link href="/admins/css/calendar.css" rel="stylesheet">
        <link href="/admins/css/style.css" rel="stylesheet">
        <link href="/admins/css/icons.css" rel="stylesheet">
        <link href="/admins/css/generics.css" rel="stylesheet"> 
    </head>
    <body id="skin-blur-violate">




        <header id="header" class="media">
            <a href="" id="menu-toggle"></a> 
            <a class="logo pull-left" href="#">七班商城</a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    <div class="pull-left tm-icon">
                        <a data-drawer="messages" class="drawer-toggle" href="">
                            <i class="sa-top-message"></i>
                            <i class="n-count animated">5</i>
                            <span>Messages</span>
                        </a>
                    </div>
                    <div class="pull-left tm-icon">
                        <a data-drawer="notifications" class="drawer-toggle" href="">
                            <i class="sa-top-updates"></i>
                            <i class="n-count animated">9</i>
                            <span>Updates</span>
                        </a>
                    </div>

                    

                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    @php

                        $users = DB::table('users')->where('uid',session('uid'))->first();

                    @endphp
                    @if(session('uid'))
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="" data-toggle="dropdown">
                            <img class="profile-pic animated" src="{{$users->profile}}" alt="">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            <li><a href="/admin/profile">修改头像</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="/admin/passchange">修改密码</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                            <li><a href="/admin/logout">退出</a> <i class="icon left">&#61903;</i><i class="icon right">&#61815;</i></li>
                        </ul>
                        <h4 class="m-0">Hello, {{$users->username}}</h4>
                    </div>
                    @endif
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                   
                    
                    <!-- Projects -->
                
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li class="active">
                        <a class="sa-side-home" href="/admin">
                            <span class="menu-item">首页</span>
                        </a>
                    </li>
                    <li>
                        <ul class="sa-side-form">
                            <li class="menu-item">
                                <a href="/admin/user/create">添加用户</a>
                                <a href="/admin/user">用户列表</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <ul class="sa-side-archive">
                            <li class="menu-item">
                                <a href="/admin/role/create">添加角色</a>
                                <a href="/admin/role">浏览角色</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                       <ul class="sa-side-archive">
                            <li class="menu-item">
                                <a href="/admin/permission/create">添加角色权限</a>
                                <a href="/admin/permission">浏览角色权限</a>
                            </li>
                        </ul> 
                    </li>
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">轮播图</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/chart/create">添加轮播图</a></li>
                            <li><a href="/admin/chart">轮播图管理</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a class="sa-side-form" href="">
                            <span class="menu-item">公告</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/notice/create">公告添加</a></li>
                            <li><a href="/admin/notice">公告管理</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="sa-side-ui" href="">
                            <span class="menu-item">广告</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/ad/create">广告添加</a></li>
                            <li><a href="/admin/ad">广告管理</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="sa-side-widget" href="">
                            <span class="menu-item">友情链接</span>
                        </a>
                        <ul class="list-unstyled menu-item">
                            <li><a href="/admin/fri/create">友情链接添加</a></li>
                            <li><a href="/admin/fri">友情链接管理</a></li>
                        </ul>
                    </li>
                </ul>

            </aside>
        
            <!-- Content -->
            <section id="content" class="container">
                <div class="container">

                @if(session('success'))
                   <div class="alert alert-success" style="margin-top:30px">
                        <i class="icon" style='list-style:none;font-size:24px'>{{session('success')}}</i>
                    </div>
                @endif

                @if(session('error'))
                   <div class="alert alert-danger alert-icon" style="margin-top:30px">
                        <i class="icon" style='list-style:none;font-size:24px'>{{session('error')}}</i>
                    </div>
                @endif


                @section('content')


                @show


                <!-- Messages Drawer -->
                <!-- <div id="messages" class="tile drawer animated">
                    <div class="listview narrow">
                        <div class="media">
                            <a href="">Send a New Message</a>
                            <span class="drawer-close">&times;</span>
                            
                        </div>
                        <div class="overflow" style="height: 254px">
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - 2 Hours ago</small><br>
                                    <a class="t-overflow" href="">Mauris consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - 5 Hours ago</small><br>
                                    <a class="t-overflow" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Harris worgon - On 15/12/2013</small><br>
                                    <a class="t-overflow" href="">Maecenas venenatis enim condimentum ultrices fringilla. Nulla eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar, ornare turpis id</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Mitch Bradberry - On 14/12/2013</small><br>
                                    <a class="t-overflow" href="">Phasellus interdum felis enim, eu bibendum ipsum tristique vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - On 15/12/2013</small><br>
                                    <a class="t-overflow" href="">Ipsum wintoo consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - On 16/12/2013</small><br>
                                    <a class="t-overflow" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Harris worgon - On 17/12/2013</small><br>
                                    <a class="t-overflow" href="">Maecenas venenatis enim condimentum ultrices fringilla. Nulla eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar, ornare turpis id</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Mitch Bradberry - On 18/12/2013</small><br>
                                    <a class="t-overflow" href="">Phasellus interdum felis enim, eu bibendum ipsum tristique vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/5.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Wendy Mitchell - On 19/12/2013</small><br>
                                    <a class="t-overflow" href="">Integer a eros dapibus, vehicula quam accumsan, tincidunt purus</a>
                                </div>
                            </div>
                        </div>
                        <div class="media text-center whiter l-100">
                            <a href=""><small>VIEW ALL</small></a>
                        </div>
                    </div>
                </div> -->
                
                <!-- Notification Drawer -->
                <!-- <div id="notifications" class="tile drawer animated">


                    <div class="listview narrow">
                        <div class="media">
                            <a href="">Notification Settings</a>
                            <span class="drawer-close">&times;</span>
                        </div>
                        <div class="overflow" style="height: 254px">
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - 2 Hours ago</small><br>
                                    <a class="t-overflow" href="">Mauris consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - 5 Hours ago</small><br>
                                    <a class="t-overflow" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/3.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Harris worgon - On 15/12/2013</small><br>
                                    <a class="t-overflow" href="">Maecenas venenatis enim condimentum ultrices fringilla. Nulla eget libero rhoncus, bibendum diam eleifend, vulputate mi. Fusce non nibh pulvinar, ornare turpis id</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/4.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Mitch Bradberry - On 14/12/2013</small><br>
                                    <a class="t-overflow" href="">Phasellus interdum felis enim, eu bibendum ipsum tristique vitae. Phasellus feugiat massa orci, sed viverra felis aliquet quis. Curabitur vel blandit odio. Vestibulum sagittis quis sem sit amet tristique.</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/1.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">Nadin Jackson - On 15/12/2013</small><br>
                                    <a class="t-overflow" href="">Ipsum wintoo consectetur urna nec tempor adipiscing. Proin sit amet nisi ligula. Sed eu adipiscing lectus</a>
                                </div>
                            </div>
                            <div class="media">
                                <div class="pull-left">
                                    <img width="40" src="/admins/img/profile-pics/2.jpg" alt="">
                                </div>
                                <div class="media-body">
                                    <small class="text-muted">David Villa - On 16/12/2013</small><br>
                                    <a class="t-overflow" href="">Suspendisse in purus ut nibh placerat Cras pulvinar euismod nunc quis gravida. Suspendisse pharetra</a>
                                </div>
                            </div>
                        </div>
                        <div class="media text-center whiter l-100">
                            <a href=""><small>VIEW ALL</small></a>
                        </div>
                    </div>
                </div> -->
                
                <!-- Breadcrumb -->
               
                
                                
                <!-- Shortcuts -->
              
                
                <hr class="whiter" />
                
                <!-- Quick Stats -->
               

                </div>

                <hr class="whiter" />
                
                <!-- Main Widgets -->
               
             
                
                <!-- Chat -->
            </section>

            <!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="/admins/img/browsers/chrome.png" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="/admins/img/browsers/firefox.png" alt="">
                                <div>Mozilla Firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="/admins/img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="/admins/img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="/admins/img/browsers/ie.png" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="/admins/js/jquery.min.js"></script> <!-- jQuery Library -->
        <script src="/admins/js/jquery-ui.min.js"></script> <!-- jQuery UI -->
        <script src="/admins/js/jquery.easing.1.3.js"></script> <!-- jQuery Easing - Requirred for Lightbox + Pie Charts-->

        <!-- Bootstrap -->
        <script src="/admins/js/bootstrap.min.js"></script>

        <!-- Charts -->
        <script src="/admins/js/charts/jquery.flot.js"></script> <!-- Flot Main -->
        <script src="/admins/js/charts/jquery.flot.time.js"></script> <!-- Flot sub -->
        <script src="/admins/js/charts/jquery.flot.animator.min.js"></script> <!-- Flot sub -->
        <script src="/admins/js/charts/jquery.flot.resize.min.js"></script> <!-- Flot sub - for repaint when resizing the screen -->

        <script src="/admins/js/sparkline.min.js"></script> <!-- Sparkline - Tiny charts -->
        <script src="/admins/js/easypiechart.js"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="/admins/js/charts.js"></script> <!-- All the above chart related functions -->

        <!-- Map -->
        <script src="/admins/js/maps/jvectormap.min.js"></script> <!-- jVectorMap main library -->
        <script src="/admins/js/maps/usa.js"></script> <!-- USA Map for jVectorMap -->

        <!--  Form Related -->
        <script src="/admins/js/icheck.js"></script> <!-- Custom Checkbox + Radio -->

        <!-- UX -->
        <script src="/admins/js/scroll.min.js"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="/admins/js/calendar.min.js"></script> <!-- Calendar -->
        <script src="/admins/js/feeds.min.js"></script> <!-- News Feeds -->
        <script src="/admins/js/fileupload.min.js"></script> <!-- File Upload -->
        

        <!-- All JS functions -->
        <script src="/admins/js/functions.js"></script>
        
        @section('js')


        @show

    </body>
</html>
