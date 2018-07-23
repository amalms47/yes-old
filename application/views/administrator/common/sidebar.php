<aside class="main-sidebar">
<section class="sidebar">
<div class="user-panel">
<div class="pull-left image"><img src="<?=$photo;?>" class="img-circle" alt="User Image" style="width:35px;height:35px;"></div>
<div class="pull-left info"><p><?=$fullname;?></p></div>
</div>
<ul class="sidebar-menu">
<li class="treeview"><a data-toggle="tooltip" data-placement="right" title="Admin home" href="<?= base_url();?>admin-home" id="dashboardsidebar"><i class="fa fa-dashboard"></i> <span>Admin Dashboard</span></a></li>
    <li class="treeview" id="collegemenu"><a href="#"><i class="fa fa-institution"></i>
            <span>Colleges Section</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li><a data-toggle="tooltip" data-placement="right" title="Manage colleges" href="<?= base_url();?>colleges-grid" id="collegesubmenu1"><i class="fa fa-circle-o" ></i> Colleges grid</a></li>
            <li><a data-toggle="tooltip" data-placement="right" title="Inactive colleges" href="<?= base_url();?>inactive-colleges" id="collegesubmenu2"><i class="fa fa-circle-o"></i> Inactive colleges</a></li>
            <li><a data-toggle="tooltip" data-placement="right" title="All colleges" href="<?= base_url();?>all-colleges" id="collegesubmenu3"><i class="fa fa-circle-o"></i>All colleges</a></li>

        </ul>
    </li>
<!--<li><a href="<?= base_url();?>colleges"><i class="fa fa-institution"></i> <span>Colleges Grid</span></a></li>-->

    <li><a data-toggle="tooltip" data-placement="right" title="Student list" href="<?= base_url();?>student-list" id="studsidebar"><i class="fa fa-users"></i> <span>Students List</span></a></li>
<li><a data-toggle="tooltip" data-placement="right" title="Admin list" href="<?= base_url();?>sub-administrators" id="subadminsidebar"><i class="fa fa-user"></i> <span>Sub Administrator</span></a></li>
    <li><a data-toggle="tooltip" data-placement="right" title="Colleges category" href="<?= base_url();?>admin-college-category" id="collegecat"><i class="fa fa-book"></i> <span>College Category</span></a></li>

    <li><a data-toggle="tooltip" data-placement="right" title="Enquiry list" href="<?= base_url();?>admin-enquiry" id="enquirysidebar"><i class="fa fa-comments"></i> <span>Enquiry Details</span></a></li>

    <li><a data-toggle="tooltip" data-placement="right" title="Enquiry list" href="<?= base_url();?>reviews-list" id="reviewsidebar"><i class="fa fa-comments"></i> <span>Reviews section</span></a></li>
<li><a data-toggle="tooltip" data-placement="right" title="Profile management" href="<?= base_url();?>profile-setting" id="profilesidebar"><i class="fa fa-gears"></i> <span>Profile Managmenent</span></a></li>


    <li class="treeview" id="careercoursemenu"><a href="#"><i class="fa fa-institution"></i>
            <span>Career/Course Section</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li><a data-toggle="tooltip" data-placement="right" title="Courses contents" href="<?= base_url();?>courses-section" id="coursesub"><i class="fa fa-circle-o" ></i> Course content</a></li>
            <li><a data-toggle="tooltip" data-placement="right" title="Career contents" href="<?= base_url();?>career-section" id="careersub"><i class="fa fa-circle-o"></i> Career content</a></li>

        </ul>
    </li>


    <li class="treeview" id="coursemenu"><a href="#"><i class="fa fa-list-ol"></i>
            <span>Category/Course</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li><a data-toggle="tooltip" data-placement="right" title="category list" href="<?= base_url();?>admin-categories" id="categorysidebar"><i class="fa fa-tags"></i> <span>Available Category</span></a></li>
            <li><a data-toggle="tooltip" data-placement="right" title="courses list" href="<?= base_url();?>admin-courses" id="coursessidebar"><i class="fa fa-graduation-cap"></i> <span>Available Courses</span></a></li>

        </ul>
    </li>

    <li class="treeview" id="mailmenu"><a href="#"><i class="fa fa-envelope-o"></i>
            <span>Mailbox</span>
            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        </a>
        <ul class="treeview-menu">
            <li><a data-toggle="tooltip" data-placement="right" title="Create mail" href="<?= base_url();?>create-mail" id="mailsubmenu1"><i class="fa fa-circle-o" ></i> Create mail</a></li>
            <li><a data-toggle="tooltip" data-placement="right" title="Mailbox" href="<?= base_url();?>mailbox-list" id="mailsubmenu2"><i class="fa fa-circle-o"></i> Sendbox</a></li>

        </ul>
    </li>

</ul>
</section>
</aside>

<script>

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
