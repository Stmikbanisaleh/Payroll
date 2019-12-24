<script type="text/javascript">
	try{ace.settings.loadState('sidebar')}catch(e){}
</script>

<div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
		<button class="btn btn-success">
			<i class="ace-icon fa fa-signal"></i>
		</button>

		<button class="btn btn-info">
			<i class="ace-icon fa fa-pencil"></i>
		</button>

		<button class="btn btn-warning">
			<i class="ace-icon fa fa-users"></i>
		</button>

		<button class="btn btn-danger">
			<i class="ace-icon fa fa-cogs"></i>
		</button>
	</div>

	<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
		<span class="btn btn-success"></span>

		<span class="btn btn-info"></span>

		<span class="btn btn-warning"></span>

		<span class="btn btn-danger"></span>
	</div>
</div><!-- /.sidebar-shortcuts -->

<ul class="nav nav-list">
	<li class="">
		<a href="<?= base_url(); ?>">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="active">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">
				Master Data
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="javascript:void(0);" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					People
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>

				<ul class="submenu">
					<li class="">
						<a href="top-menu.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Administrator
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="top-menu.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Employee
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="top-menu.html">
							<i class="menu-icon fa fa-caret-right"></i>
							Teacher
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>

			<li class="">
				<a href="typography.html">
					<i class="menu-icon fa fa-caret-right"></i>
					Typography
				</a>

				<b class="arrow"></b>
			</li>
			
		</ul>
	</li>

	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">
				Menu 2
			</span>
		</a>
	</li>

	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">
				Menu 3
			</span>
		</a>
	</li>

	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">
				Mwnu 4
			</span>
		</a>
	</li>

	<li class="">
		<a href="javascript:void(0);" class="dropdown-toggle">
			<i class="menu-icon fa fa-desktop"></i>
			<span class="menu-text">
				Menu 5
			</span>
		</a>
	</li>
</ul><!-- /.nav-list -->

<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
	<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>