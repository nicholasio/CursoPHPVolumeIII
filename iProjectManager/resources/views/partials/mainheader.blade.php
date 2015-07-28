<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>i</b>PM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>iProject</b>Manager </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">{{ $user_tasks->count() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Você tem {{ $user_tasks->count() }} tarefa(s) </li>

                        @foreach( $user_tasks as $task)
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="{{ route( 'tasks.show', $task->id ) }}">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                {{ $task->title }}
                                                <small class="pull-right">{{ $task->formated_deadline }}</small>
                                            </h3>
                                            <!-- Change the css width attribute to simulate progress -->
                                            @if ( $task->status == App\Task::PENDING)
                                                <span class="label label-warning">Pendente</span>
                                            @else
                                                <span class="label label-success">Finalizada</span>
                                            @endif
                                        </a>
                                    </li><!-- end task item -->
                                </ul>
                            </li>
                        @endforeach
                        <li class="footer">
                            <a href="{{ url('/tasks') }}">Ver Todas as tarefas</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ Gravatar::src( Auth::user()->email ) }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ Gravatar::src( Auth::user()->email, '90' ) }}" class="img-circle" alt="User Image" />
                            <p>
                                <small>Membro desde {{ Auth::user()->created_at->format('d/m/Y à\s H:i:s') }}</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ action('UsersController@edit', Auth::user()->id ) }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sair do Sistema</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
