<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Gravatar::src( Auth::user()->email ) }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu Principal</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ setActiveByController('home') }}"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Home</span></a></li>
            <li class="{{ setActiveByController('users') }}"><a href="{{ url('users') }}"><i class='fa fa-users'></i> <span>Usuários</span></a></li>
            <li class="{{ setActiveByController('clients') }}"><a href="{{ url('clients') }}"><i class='fa fa-user'></i> <span>Clientes</span></a></li>
            <li class="{{ setActiveByController('projects') }}"><a href="{{ url('projects') }}"><i class='fa fa-archive'></i> <span>Projetos</span></a></li>
            <li class="{{ setActiveByController('tasks') }}"><a href="{{ url('tasks') }}"><i class='fa fa-tasks'></i> <span>Tarefas</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
