<!-- Content Area-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Gallery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Manage Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4 text-right">
                    <a type="button" class="btn btn-primary" href="<?php echo base_url(); ?>Admin/add_images_in_gallery">
                        Add Banner
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="card w-full">
                    <div class="card-body">
                        <table class="table table-bordered table-striped w-100" id="banner_listing">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Action</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>