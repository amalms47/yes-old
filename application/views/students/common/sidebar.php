<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url()?>assets/backend/images/<?=$photo?>" class="img-circle" alt="User Image" style="width:35px;height:35px;">
            </div>
            <div class="pull-left info">
                <p><?=$username;?></p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">

            <li class="treeview">
                <a href="<?=base_url()?>college-home">
                    <i class="fa fa-dashboard"></i> <span>Home/Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="<?=base_url();?>college-profile" ><i class="fa fa-eye"></i> View College Profile</a></li>
            </li>
            <li class="treeview">
            <li  id="courses"  class=""><a href="<?=base_url();?>college-courses"><i class="fa  fa-table"></i> College Courses</a></li>
            </li>
            <li class="treeview">
            <li  id="features"  class=""><a href="<?=base_url();?>college-featurelist"><i class="fa  fa-newspaper-o"></i> College Events/Features</a></li>

            </li>




            <li class="header">Profile Settings</li>
            <li><a href="<?=base_url();?>college-user-profile"><i class="fa fa-gear"></i> <span>Profile Management</span></a></li>
            <li><a href=""><i class="fa fa-sign-out"></i> <span>Visit site</span></a></li>
            <li><a href="<?=base_url()?>college-logout"><i class="fa fa-sign-out"></i> <span>Sign out</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
