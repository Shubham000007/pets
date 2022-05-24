<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="javscript:void(0)" class="brand-link">
        <!-- <img src="<?php //echo base_url(); 
                        ?>assets/images/logo/logo.png" alt="Logo" class="brand-image elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">Dogs & Mogs</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/admin/images/user/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:void(0)" class="d-block"><?php echo $this->session->userdata('name'); ?></a>
            </div>
        </div>

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/admin/images/icons-images/logout.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo base_url(); ?>Admin/logout" class="d-block">Logout</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- <li class="nav-item">
                    <a href="<?php //echo base_url(); 
                                ?>Admin/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Admin/manage_banner" class="nav-link">
                        <i class="far fa-image nav-icon"></i>
                        <p>Manage Banner</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Admin/manage_gallery" class="nav-link">
                        <i class="far fa-images nav-icon"></i>
                        <p>Manage Gallery</p>
                    </a>
                </li>


                <!-- <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

            </ul>
        </nav>
    </div>
</aside>