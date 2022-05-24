<style>
    form{
        width: 100% !important;
    }
</style>
<!-- Content Area-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url(); ?>Admin/manage_banner">Manage Banner</a></li>
                        <li class="breadcrumb-item active">Add Banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card w-full">
                <div class="card-body w-100">
                    <div class="row">
                        <?php
                        $attr = array('id' => 'add_banner_form');
                        echo form_open_multipart('Admin/upload_banner', $attr);
                        ?>
                        <div class="col-sm-12 col-lg-12">
                            <div class="form-group">
                                <label for="">Choose Banner</label>
                                <input type="file" name="choose_banner" id="choose_banner" class="form-control">
                                <div class="error" id="choose_banner_error"></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary" id="upload_banner_button">Submit</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>