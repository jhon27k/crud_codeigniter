<?php 
    if($this->session->userdata('logged_in')){
		$login=$this->session->userdata('logged_in');
		if ($this->session->userdata('logged_in')['uType'] != 'superadmin')
		{
			$role = $this->session->userdata('logged_in')['role_id'];
			$user_caps = get_capabilities($role);
		}
    }?>

 <!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>

				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Menu de Navegação">
                            <?php foreach (user_menu() as $menu): ?>
                                <?php if ($this->session->userdata('logged_in')['uType'] === 'superadmin'): ?>
                                    <li>
                                        <a href="<?php echo base_url().$menu['url'] ?>">
                                            <i class="<?php echo $menu['icon'] ?>"></i><?php echo $menu['name'] ?>
                                        </a>
                                        <?php if ($menu['submenu']): ?>
                                            <ul>
                                                <?php foreach (json_decode($menu['submenu_items']) as $sub_menu): ?>
                                                    <li>
                                                        <a href="<?php echo base_url().$sub_menu->url ?>"><?php echo $sub_menu->name ?></a>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        <?php endif ?>
                                    </li>
                                <?php else :?>
                                    <?php if(array_intersect($user_caps, $menu['capabilities']) or in_array("basic_cap", $menu['capabilities'] )): ?>
                                        <li>
                                            <a href="<?php echo base_url().$menu['url'] ?>">
                                                <i class="<?php echo $menu['icon'] ?>"></i><?php echo $menu['name'] ?>
                                            </a>
                                            <?php if ($menu['submenu']): ?>
                                                <ul>
                                                    <?php foreach (json_decode($menu['submenu_items']) as $sub_menu): ?>
                                                        <?php if (in_array($sub_menu->cap, $user_caps) || in_array($sub_menu->subcap, $user_caps)): ?>
                                                            <li>
                                                                <a href="<?php echo base_url().$sub_menu->url ?>"><?php echo $sub_menu->name ?></a>
                                                            </li>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </ul>
                                            <?php endif ?>
                                        </li>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endforeach ?>
                            <li><a href="<?php echo base_url().'logout' ?>"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul>
                        


						<!-- <ul data-submenu-title="Organize and Manage">
							<li><a href="<?php echo base_url('ManageClinic'); ?>"><i class="icon-material-outline-business-center"></i>Gerenciar clínica </a>
								<ul>
									<li><a href="dashboard-manage-jobs.html">Manage Jobs <span class="nav-tag">3</span></a></li>
									<li><a href="dashboard-manage-candidates.html">Manage Candidates</a></li>
									<li><a href="dashboard-post-a-job.html">Post a Job</a></li>
								</ul>
							</li>
							<li><a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>
								<ul>
									<li><a href="dashboard-manage-tasks.html">Manage Tasks <span class="nav-tag">2</span></a></li>
									<li><a href="dashboard-manage-bidders.html">Manage Bidders</a></li>
									<li><a href="dashboard-my-active-bids.html">My Active Bids <span class="nav-tag">4</span></a></li>
									<li><a href="dashboard-post-a-task.html">Post a Task</a></li>
								</ul>
							</li>
						</ul> -->

						<!-- <ul data-submenu-title="Account">
							<li><a href="dashboard-settings.html"><i class="icon-material-outline-settings"></i> Settings</a></li>
							<li><a href="<?php echo base_url().'logout' ?>"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
						</ul> -->

					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->