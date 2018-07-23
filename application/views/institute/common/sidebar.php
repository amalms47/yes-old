<!-- =======================side bar menu design section======================== -->

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url()?>assets/backend/images/collegelogo/<?=$logo?>" class="img-circle" alt="User Image" style="width:35px;height:35px;">
            </div>
            <div class="pull-left info">
                <p><?=$username?></p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li><a href="<?=base_url()?>institution-home" id="homesidebar" data-toggle="tooltip" data-placement="right" title="Admin dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?=base_url();?>yescolleges-services" id="servsidebar" data-toggle="tooltip" data-placement="right" title="Common services"><i class="fa fa-bolt"></i> <span>Yescolleges Services</span></a></li>
            <li><a href="<?=base_url();?>institution-profile" id="profilesidebar" data-toggle="tooltip" data-placement="right" title="Profile management"><i class="fa fa-institution"></i><span> Institution Profile</span></a></li>
            <li><a href="<?=base_url();?>institution-courses" id="coursesidebar" data-toggle="tooltip" data-placement="right" title="Manage courses"><i class="fa  fa-table"></i><span> Courses Grid List</span></a></li>
            <li><a href="<?=base_url();?>institution-userprofile" id="usersidebar" data-toggle="tooltip" data-placement="right" title="User settings"><i class="fa fa-gears"></i> <span> User  Profile Management</span></a></li>
            <li><a href="<?=base_url();?>institution-features" id="featuresidebar" data-toggle="tooltip" data-placement="right" title="College events or features"><i class="fa fa-calendar"></i> <span> Events/Features</span></a></li>
            <li><a href="<?=base_url();?>college-reviews-page" id="reviewbar"  data-toggle="tooltip" data-placement="right" title="User reviews"><i class="fa fa-star"> </i> <span> Reviews Section</span></a></li>
            <li><a href="<?=base_url();?>student-enquiry" id="studsidebar" data-toggle="tooltip" data-placement="right" title="Student enquiry list"><i class="fa fa-comments" ></i> <span> Student Enquiry</span></a></li>

            <li class="treeview" id="mailmenu"><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i>
                    <span>Mailbox</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url();?>create-college-mail" id="mailsidebar1" data-toggle="tooltip" data-placement="right" title="Create mail"><i class="fa fa-circle-o" ></i> Create mail</a></li>
                    <li><a href="<?= base_url();?>institution-mailbox" id="mailsidebar" data-toggle="tooltip" data-placement="right" title="Mail inbox"><i class="fa fa-circle-o" ></i> Inbox</a></li>

                </ul>
            </li>
            <li><a href="<?=base_url();?>institution-info" id="infosidebar"  data-toggle="tooltip" data-placement="right" title="Upload images"><i class="fa fa-map-signs"></i> <span>Images/Brochure/Map</span></a></li>

            <li><a href="<?=base_url();?>institution-visitors" id="visitorssidebar"  data-toggle="tooltip" data-placement="right" title="Visitors list"><i class="fa fa-users" ></i> <span>College Visitors</span></a></li>

            <li><a href="<?=base_url();?>institution-faq" id="faqsidebar"  data-toggle="tooltip" data-placement="right" title="FAQ information"><i class="fa fa-question-circle-o"></i> <span>FAQ and Information</span></a></li>


            <li><a href="<?=base_url()?>instituion-logout"  data-toggle="tooltip" data-placement="right" title="Logout"><i class="fa fa-sign-out"></i> <span>Log out</span></a></li>
        </ul>
    </section>
</aside>
<!-- =======================side bar menu design section======================== -->
