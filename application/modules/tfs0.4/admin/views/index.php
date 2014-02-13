
<div class="row-fluid sortable">
	<div class="box span4">
		<div class="box-header well">
			<h2><i class="icon-th"></i> CPU Status</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
</head>
<body>
		<div id="content-status"></div>
		<center>
		<img src="<?php echo site_url().TPLLAYOUTDIR; ?>alters/admin/img/loading.gif" id="loading" alt="loading" style="display:none;" />
		</center>			
		</div>
	</div><!--/span-->
	
			
	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-user"></i> Member Activity</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div class="box-content">
				<ul class="dashboard-list">
					<li>
						<a href="#">
							<img class="dashboard-avatar" alt="Usman" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( "usman@halalit.net" ) ) ); ?>.png?s=50"></a>
							<strong>Name:</strong> <a href="#">Usman
						</a><br>
						<strong>Since:</strong> 17/05/2012<br>
						<strong>Status:</strong> <span class="label label-success">Approved</span>                                  
					</li>
					<li>
						<a href="#">
							<img class="dashboard-avatar" alt="Sheikh Heera" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( "heerasheikh@ymail.com" ) ) ); ?>.png?s=50"></a>
							<strong>Name:</strong> <a href="#">Sheikh Heera
						</a><br>
						<strong>Since:</strong> 17/05/2012<br>
						<strong>Status:</strong> <span class="label label-warning">Pending</span>                                 
					</li>
					<li>
						<a href="#">
							<img class="dashboard-avatar" alt="Abdullah" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( "abdullah123456@abc.com" ) ) ); ?>.png?s=50"></a>
							<strong>Name:</strong> <a href="#">Abdullah
						</a><br>
						<strong>Since:</strong> 25/05/2012<br>
						<strong>Status:</strong> <span class="label label-important">Banned</span>                                  
					</li>
					<li>
						<a href="#">
							<img class="dashboard-avatar" alt="Saruar Ahmed" src="http://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( "saruarall@gmail.com" ) ) ); ?>.png?s=50"></a>
							<strong>Name:</strong> <a href="#">Saruar Ahmed
						</a><br>
						<strong>Since:</strong> 17/05/2012<br>
						<strong>Status:</strong> <span class="label label-info">Updates</span>                                  
					</li>
				</ul>
			</div>
		</div>
	</div><!--/span-->
			
	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-list-alt"></i> Realtime Traffic</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<div id="realtimechart" style="height:190px;"></div>
				<p class="clearfix">You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
				<p>Time between updates: <input id="updateInterval" type="text" value="" style="text-align: right; width:5em"> milliseconds</p>
		</div>
	</div><!--/span-->
</div><!--/row-->

<div class="row-fluid sortable">
	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-list"></i> Buttons</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content buttons">
			<p class="btn-group">
				  <button class="btn">Left</button>
				  <button class="btn">Middle</button>
				  <button class="btn">Right</button>
			</p>
			<p>
				<button class="btn btn-small"><i class="icon-star"></i> Icon button</button>
				<button class="btn btn-small btn-primary">Small button</button>
				<button class="btn btn-small btn-danger">Small button</button>
			</p>
			<p>
				<button class="btn btn-small btn-warning">Small button</button>
				<button class="btn btn-small btn-success">Small button</button>
				<button class="btn btn-small btn-info">Small button</button>
			</p>
			<p>
				<button class="btn btn-small btn-inverse">Small button</button>
				<button class="btn btn-large btn-primary btn-round">Round button</button>
				<button class="btn btn-large btn-round"><i class="icon-ok"></i></button>
				<button class="btn btn-primary"><i class="icon-edit icon-white"></i></button>
			</p>
			<p>
				<button class="btn btn-mini">Mini button</button>
				<button class="btn btn-mini btn-primary">Mini button</button>
				<button class="btn btn-mini btn-danger">Mini button</button>
				<button class="btn btn-mini btn-warning">Mini button</button>
			</p>
			<p>
				<button class="btn btn-mini btn-info">Mini button</button>
				<button class="btn btn-mini btn-success">Mini button</button>
				<button class="btn btn-mini btn-inverse">Mini button</button>
			</p>
		</div>
	</div><!--/span-->
		
	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-list"></i> Buttons</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content  buttons">
			<p>
				<button class="btn btn-large">Large button</button>
				<button class="btn btn-large btn-primary">Large button</button>
			</p>
			<p>
				<button class="btn btn-large btn-danger">Large button</button>
				<button class="btn btn-large btn-warning">Large button</button>
			</p>
			<p>
				<button class="btn btn-large btn-success">Large button</button>
				<button class="btn btn-large btn-info">Large button</button>
			</p>
			<p>
				<button class="btn btn-large btn-inverse">Large button</button>
			</p>
			<div class="btn-group">
				<button class="btn btn-large">Large Dropdown</button>
				<button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="#"><i class="icon-star"></i> Action</a></li>
					<li><a href="#"><i class="icon-tag"></i> Another action</a></li>
					<li><a href="#"><i class="icon-download-alt"></i> Something else here</a></li>
					<li class="divider"></li>
					<li><a href="#"><i class="icon-tint"></i> Separated link</a></li>
				</ul>
			</div>
			
		</div>
	</div><!--/span-->
		
	<div class="box span4">
		<div class="box-header well" data-original-title>
			<h2><i class="icon-list"></i> Weekly Stat</h2>
			<div class="box-icon">
				<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
				<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
			</div>
		</div>
		<div class="box-content">
			<ul class="dashboard-list">
				<li>
					<a href="#">
						<i class="icon-arrow-up"></i>                               
						<span class="green">92</span>
						New Comments                                    
					</a>
				</li>
			  <li>
				<a href="#">
				  <i class="icon-arrow-down"></i>
				  <span class="red">15</span>
				  New Registrations
				</a>
			  </li>
			  <li>
				<a href="#">
				  <i class="icon-minus"></i>
				  <span class="blue">36</span>
				  New Articles                                    
				</a>
			  </li>
			  <li>
				<a href="#">
				  <i class="icon-comment"></i>
				  <span class="yellow">45</span>
				  User reviews                                    
				</a>
			  </li>
			  <li>
				<a href="#">
				  <i class="icon-arrow-up"></i>                               
				  <span class="green">112</span>
				  New Comments                                    
				</a>
			  </li>
			  <li>
				<a href="#">
				  <i class="icon-arrow-down"></i>
				  <span class="red">31</span>
				  New Registrations
				</a>
			  </li>
			  <li>
				<a href="#">
				  <i class="icon-minus"></i>
				  <span class="blue">93</span>
				  New Articles                                    
				</a>
			  </li>
			  <li>
				<a href="#">
				  <i class="icon-comment"></i>
				  <span class="yellow">254</span>
				  User reviews                                    
				</a>
			  </li>
			</ul>
		</div>
	</div><!--/span-->
</div><!--/row-->