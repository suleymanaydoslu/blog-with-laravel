<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ route('panel.dashboard') }}">Blog Managament</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
          class="fa fa-user"></i> {{ Auth::user()->full_name  }} <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="{{route('panel.profile')}}"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>
        </li>
        <li class="divider"></li>
        <li>
          <a href="{{ route('panel.logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li class="active">
        <a href="{{ route('panel.dashboard') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
      </li>
      <li>
        <a href="{{ route('panel.posts.index') }}"><i class="fa fa-fw fa-paper-plane"></i> Posts</a>
      </li>
      <li>
        <a href="{{ route('panel.categories.index') }}"><i class="fa fa-fw fa-list"></i> Categories</a>
      </li>
      <li>
        <a href="{{ route('panel.comments.index') }}"><i class="fa fa-fw fa-comments"></i> Comments</a>
      </li>
      <li>
        <a href="{{ route('panel.newsletters.index') }}"><i class="fa fa-fw fa-envelope"></i> Newsletters</a>
      </li>
      <li>
        <a href="{{ route('panel.users.index') }}"><i class="fa fa-fw fa-users"></i> Users</a>
      </li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
