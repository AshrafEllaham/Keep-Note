<div class="row py-5">
    <div class="container">
        
        <?php if($archive_items){ ?>
            <div class="row row-cols-1 row-cols-md-3 py-5 px-3">

                <?php foreach($archive_items as $row): ?>
                    <div class="menu-container col-sm-12 col-md-3 py-3">
                        <div class="menu card card_main card-link p-3 animated-border" style="border-radius: 20px;">
                            <a style="text-decoration: none;color: inherit;" 
                                data-toggle="modal"
                                data-target="#popupModal"
                                data-name="<?php echo $row['title']; ?>"
                                data-description="<?php echo $row['content']; ?>"
                                data-id="<?php echo $row['id']; ?>"
                                data-trash="<?php echo $row['trash']; ?>">
                                <div class="card-body text-primary backgroundEffect">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="card-title pb-2"><?php echo $row['title']; ?></h5>
                                        </div>
                                    </div>
                                    <p class="card-text text-secondary" style="display: -webkit-box;-webkit-box-orient: vertical;overflow: hidden;-webkit-line-clamp: 7;">
                                        <?php echo $row['content']; ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php }else{ ?>
            <div class="d-flex justify-content-center" style="opacity: 75%; min-height: 80vh;align-items: center;">
                <div style="max-width: 450px;">
                        <i class="fa fa-archive" style="font-size: 1000%;"></i>
                </div>
                <div style="max-width: 450px;">
                    <h1 class="mb-0 mt-3 font-weight-bold">No Notes yet</h1>
                </div>
            </div>
        <?php } ?> 
        
    </div>

    <!-- view -->
    <div class="row modal fade" id="popupModal">
        <div class="modal-dialog">
            <div class="col-12 modal-content">
                <div class="row mt-2">
                    <div class="col-11"></div>
                    <div class="col-1">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-12">
                        <textarea readonly name="title" placeholder="Your Title..." class="form-control my-3 bg-white" rows="1" id="popupModalTitle"></textarea>
                    </div>
                    <div class="col-12">
                        <textarea readonly name="contnet" placeholder="Your Notes..." class="form-control bg-white" rows="10" id="popupModalBody"></textarea>
                    </div>
                    <div class="col-12  mt-3">
                        <div class="row">
                            <div class="col-6">
                                <form action="/archive/trash" method="POST">
                                    <input type="text" id="IDnoteArchiveTrash" name="id" hidden>
                                    <button type="submit" class="btn btn-danger">
                                        Trash
                                    </button>
                                </form>
                            </div>
                            <div class="col-6 d-flex justify-content-end">
                                <form action="/archive/unarchive" method="POST">
                                    <input type="text" id="IDnoteUnarchive" name="id" hidden>
                                    <button type="submit" class="btn btn-warning">
                                        Unarchive
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>