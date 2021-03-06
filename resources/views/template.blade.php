<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://www.presenceco.com/templates/theme1313/favicon.ico">

    <title>Presence Project Server</title>

    <!-- Bootstrap core CSS -->
    {!! Html::style('css/bootstrap.min.css') !!}

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {!! Html::style('css/ie10-viewport-bug-workaround.css') !!}

    <!-- Select tag -->
    {!! Html::style('css/select2.min.css') !!}

    <!-- Cloud tag css -->
    {!! Html::style('css/jqcloud.css') !!}

    <!-- Custom styles for this template -->
    {!! Html::style('css/starter-template.css') !!}

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!! Html::script('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js') !!}
    {!! Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}


    <![endif]-->

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Presence Project Server</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>{!! HTML::link('projects', 'Projects Summary') !!}</li>
                        <li>{!! HTML::link('offerings', 'Offerings Summary') !!}</li>
                        <li role="separator" class="divider"></li>
                        @can('view_menu_actions')
                        <li class="dropdown-header">Actions</li>
                        @can('create_project')
                        <li>{!! HTML::link('projects/create', 'New Project') !!}</li>
                        @endcan
                        @can('create_offering')
                        <li>{!! HTML::link('offerings/create', 'New Offering') !!}</li>
                        @endcan
                        @endcan
                    </ul>
                </li>
                <li><a href="#contact">Reports</a></li>
                @can('catalog')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalog <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @can('regions')
                        <li>{!! HTML::link('regions', 'Regions') !!}</li>
                        @endcan
                        @can('partners')
                        <li>{!! HTML::link('partners', 'Partners') !!}</li>
                        @endcan
                        @can('poms')
                        <li>{!! HTML::link('pms', 'Project Managers') !!}</li>
                        @endcan
                        @can('customers')
                        <li>{!! HTML::link('customers', 'Customers') !!}</li>
                        @endcan
                        @can('acds')
                        <li>{!! HTML::link('acds', 'ACDs') !!}</li>
                        @endcan
                        @can('resources')
                        <li>{!! HTML::link('resources', 'Resources') !!}</li>
                        @endcan
                        @can('modules')
                        <li>{!! HTML::link('modules', 'Modules') !!}</li>
                        @endcan
                        @can('admin')
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Site Permissions</li>
                            @can('users')
                            <li>{!! HTML::link('users', 'Users') !!}</li>
                            @endcan
                            @can('permissions')
                            <li>{!! HTML::link('roles', 'Roles') !!}</li>
                            @endcan
                            <li>{!! HTML::link('permissions', 'Permissions') !!}</li>
                        @endcan
                    </ul>
                </li>
                @endcan
            </ul>
            <form class="navbar-form navbar-right">
                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if($signedIn)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome {{ $login->name }} {{ $login->last }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="clearfix" href="#">
                                    <img alt="User" src="//gravatar.com/avatar/027014b69be65dc2d04f85efeff2f6cd.png?d=mm&amp;s=64" />
                                    <div class="detail">
                                        <br>
                                        <strong>{{ $login->name }} {{ $login->last }}</strong>

                                        <p class="grey">{{ $login->email }}</p>
                                    </div>
                                </a></li>
                            <li role="separator" class="divider"></li>
                            <li><a class="clearfix" href="#"><span><strong>Rol:</strong> {{ $login->role->label }}</span></a></li>
                            <li><a class="clearfix" href="#"><span><strong>Region:</strong> {{ $login->region->region }}</span></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a data-toggle="modal" href="#myModal"><span class="glyphicon glyphicon glyphicon-wrench " style="margin-right: 10px" aria-hidden="true"></span> Settings</a></li>

                            <li><a href="/logout"><span class="glyphicon glyphicon glyphicon-off" style="margin-right: 10px" aria-hidden="true"></span> Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

                {!! Form::open(array('url' => 'search', 'id' => 'search', 'class' => 'navbar-form navbar-right')) !!}
                {!! Form::text('search', null,
                                       array('class'=>'form-control',
                                            'placeholder'=>'Search...')) !!}
                {!! Form::close() !!}

        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">User Settings</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        <br>
                        <img alt="{{ $login->name }} {{ $login->last }}" src="//gravatar.com/avatar/027014b69be65dc2d04f85efeff2f6cd.png?d=mm&amp;s=64" />
                    </div>
                    <div class="col-md-4">
                        <br>
                        <strong>{{ $login->name }} {{ $login->last }}</strong>
                        <text>{{ $login->email }}</text>
                        <br>
                        <strong>Rol:</strong> {{ $login->role->label }}<br>
                        <strong>Region:</strong> {{ $login->region->region }}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(array('url' => 'notifications', 'id' => 'notifications')) !!}
                        <table class="table table-bordered h6 text-center">
                            <caption>Email Notifications</caption>
                            <thead>
                                <tr class="active">
                                    <th>Type</th>
                                    <th>User</th>
                                    <th>Region</th>
                                    <th>WW</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php $user_notification = array() ?>

                            @foreach($login->notifications as $notification)

                                <?php $user_notification[]=$notification->id ?>

                            @endforeach



                            <tr>
                                    <th>New Project</th>
                                    <td>{{ Form::radio('project_new', '1', ($user_notification[0] == '1')) }}</td>
                                    <td>{{ Form::radio('project_new', '2', ($user_notification[0] == '2')) }}</td>
                                    <td>{{ Form::radio('project_new', '3',($user_notification[0] == '3')) }}</td>
                                </tr>
                                <tr>
                                    <th>Update Project</th>
                                    <td>{{ Form::radio('project_update', '4', ($user_notification[1] == '4')) }}</td>
                                    <td>{{ Form::radio('project_update', '5', ($user_notification[1] == '5')) }}</td>
                                    <td>{{ Form::radio('project_update', '6', ($user_notification[1] == '6')) }}</td>
                                </tr>
                                <tr>
                                    <th>New Offering</th>
                                    <td>{{ Form::radio('offering_new', '7', ($user_notification[2] == '7')) }}</td>
                                    <td>{{ Form::radio('offering_new', '8', ($user_notification[2] == '8')) }}</td>
                                    <td>{{ Form::radio('offering_new', '9', ($user_notification[2] == '9')) }}</td>
                                </tr>
                                <tr>
                                    <th>Update offering</th>
                                    <td>{{ Form::radio('offering_update', '10', ($user_notification[3] == '10')) }}</td>
                                    <td>{{ Form::radio('offering_update', '11', ($user_notification[3] == '11')) }}</td>
                                    <td>{{ Form::radio('offering_update', '12', ($user_notification[3] == '12')) }}</td>
                                </tr>
                                <tr>
                                    <th>New Comments</th>
                                    <td>{{ Form::radio('comments', '13', ($user_notification[4] == '13')) }}</td>
                                    <td>{{ Form::radio('comments', '14', ($user_notification[4] == '14')) }}</td>
                                    <td>{{ Form::radio('comments', '15', ($user_notification[4] == '15')) }}</td>
                                </tr>
                                <tr>
                                    <th>New integration</th>
                                    <td>{{ Form::radio('integration', '16', ($user_notification[5] == '16')) }}</td>
                                    <td>{{ Form::radio('integration', '17', ($user_notification[5] == '17')) }}</td>
                                    <td>{{ Form::radio('integration', '18', ($user_notification[5] == '18')) }}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::submit('Save Changes', ['class' => 'btn btn-primary', 'value' => 'notifications']) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
<div class="container">

    @include('partials.flash')

    <h2>@yield('page')</h2>

    <hr>

    @yield('content')

</div><!-- /.container -->




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
{!! Html::script('js/select2.min.js') !!}
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
{!! Html::script('js/bootstrap.js') !!}
{!! Html::script('js/jqcloud.min.js') !!}
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{!! Html::script('js/ie10-viewport-bug-workaround.js') !!}
<!-- Custom scripts -->
{!! Html::script('js/custom.js') !!}

@yield('footer')
</body>
</html>