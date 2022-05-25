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
                    <!-- <a type="button" class="btn btn-primary" href="<?php //echo base_url(); 
                                                                        ?>Admin/add_images_in_gallery">
                        Add Images
                    </a> -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gallery-modal">
                        Add Banner
                    </button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="card w-full">
                    <div class="card-body">
                        <table class="table table-bordered table-striped w-100 gallery_listing" id="gallery_listing">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Action</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Upload By</th>
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


<!-- Modal -->
<div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog" aria-labelledby="gallery-modals" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gallery-modals">Add Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $attr = array('id' => 'add_gallery_form');
                echo form_open_multipart('Admin/add_gallery_form_data', $attr);
                ?>
                <div class="form-group">
                    <label for="">Choose Image</label>
                    <input type="file" name="choose_gallery_image" id="choose_gallery_image" class="form-control">
                    <div class="error" id="choose_gallery_image_error"></div>
                </div>

                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="image_title" id="image_title" class="form-control">
                    <div class="error" id="image_title_error"></div>
                </div>

                <button type="submit" class="btn btn-primary" id="upload_gallery_button">Submit</button>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-button">Close</button>
            </div>
        </div>
</div>
</div>