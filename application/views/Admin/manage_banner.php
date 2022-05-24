<!-- Content Area-->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Manage Banner</li>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#banner-modal">
                        Add Banner
                    </button>
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
                                    <th>Banner Image</th>
                                    <th>Status</th>
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
<div class="modal fade" id="banner-modal" tabindex="-1" role="dialog" aria-labelledby="banner-modals" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="banner-modals">Add Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $attr = array('id' => 'add_banner_form');
                echo form_open_multipart('Admin/upload_banner', $attr);
                ?>
                <div class="form-group">
                    <label for="">Choose Banner</label>
                    <input type="file" name="choose_banner" id="choose_banner" class="form-control">
                    <div class="error" id="choose_banner_error"></div>
                </div>
                <button type="submit" class="btn btn-primary" id="upload_banner_button">Submit</button>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-button">Close</button>
            </div>
        </div>
</div>
</div>