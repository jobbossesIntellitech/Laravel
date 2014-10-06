@if (Sentry::check())
	<ul class="nav">
		<li class="{{ Request::is('admin/pages*') ? 'active' : null }}"><a href="{{URL::route('admin.pages.index') }}"><i class="icon-book"></i> Pages</a></li>
		<li class="{{ Request::is('admin/articles*') ? 'active' : null }}"><a href="{{URL::route('admin.articles.index') }}"> <i class="icon-edit"></i> Articles</a> </li>
		<li class="{{ Request::is('admin/users*') ? 'active' : null }}"><a href="{{URL::route('admin.users.index') }}"><i class="icon-user"></i> Users</a></li>
		<li class="{{ Request::is('admin/slider*') ? 'active' : null }}"><a href="{{URL::route('admin.slider.index') }}"><i class="icon-user"></i> Sliders</a></li>
		<li class="{{ Request::is('admin/sports*') ? 'active' : null }}"><a href="{{URL::route('admin.sports.index') }}"><i class="icon-user"></i> Sports</a></li>
		<li class="{{ Request::is('admin/agegroups*') ? 'active' : null }}"><a href="{{URL::route('admin.agegroups.index') }}"><i class="icon-user"></i> AgeGroups</a></li>
		<li class="{{ Request::is('admin/skills*') ? 'active' : null }}"><a href="{{URL::route('admin.skills.index') }}"><i class="icon-user"></i> Skills</a></li>
		<li><a href="{{ URL::route('admin.logout') }}"><i class="icon-lock"></i> Logout</a></li>
	</ul>
@endif
