<div class="row py-5">
    <div class="container">
        
        <?php if($notes_items){ ?>

            <div class="row row-cols-1 row-cols-md-3 py-5 px-3">

                <?php foreach($notes_items as $row): ?>
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
                        <i class="fa-regular fa-folder-open fa-2xl d-block" style="font-size: 1000%;"></i>
                </div>
                <div style="max-width: 450px;">
                    <h1 class="mb-0 mt-3 font-weight-bold">No Notes yet</h1>
                    <small>Click the button below to create your first note.</small>
                </div>
            </div>
        <?php } ?> 
        
    </div>

    <!-- view -->
    <div class="row modal fade" id="popupModal">
        <div class="modal-dialog">
            <div class="col-12 modal-content">
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-1">
                                <form action="/note/trash" method="POST">
                                    <input type="text" id="IDnoteTrash" name="id" hidden>
                                    <button class="btn btn-danger btn-sm" type="submit"><i class="text-white fa fa-trash fa-lg m-0"></i></button>
                                </form>
                            </div>
                            <div class="col-1">
                                <form action="/note/archive" method="POST">
                                    <input type="text" id="IDnoteArchive" name="id" hidden>
                                    <button class="btn btn-warning btn-sm" type="submit"><i class="text-white fa fa-archive fa-lg m-0"></i></button>
                                </form>
                            </div>
                            <div class="col-9"></div>
                            <div class="col-1">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/note" method="POST">
                    <input type="text" id="IDnote" name="id" hidden>
                    <div class="row form-group">
                        <div class="col-12">
                            <textarea  name="title" placeholder="Your Title..." class="form-control my-3" rows="1" id="popupModalTitle"></textarea>
                        </div>
                        <div class="col-12">
                            <textarea name="contnet" placeholder="Your Notes..." class="form-control" rows="10" id="popupModalBody"></textarea>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

</div>

<!-- view of add button -->
<div class="row modal fade" id="popupModalAdd">
    <div class="modal-dialog">
        <div class="col-12 modal-content">
            <div class="row mt-2">
                <div class="col-11"></div>
                <div class="col-1">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            </div>
            
            <form action="/note/add" method="POST">
                <div class="row form-group">
                    <div class="col-12">
                        <textarea  name="title" placeholder="Your Title..." class="form-control my-3" rows="1"></textarea>
                    </div>
                    <div class="col-12">
                        <textarea name="contnet" placeholder="Your Notes..." class="form-control" rows="10"></textarea>
                    </div>
                    <div class="col-12 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add button -->
<a class="fab" data-toggle="modal" data-target="#popupModalAdd">
    <i class="fa fa-pen m-0"></i>
</a>

<!-- alert messages -->
<?php 
    if (messages_exits('add_errors')) {
        popupMessage('danger', get_Message('add_errors'));
        remove_Message('add_errors');   
    }

    if (messages_exits('update_errors')) {
        popupMessage('danger', get_Message('update_errors'));
        remove_Message('update_errors');   
    }

    if (messages_exits('search_errors')) {
        popupMessage('danger', get_Message('search_errors'));
        remove_Message('search_errors');   
    }

    if (messages_exits('login_message')) {
        popupMessage('success', get_Message('login_message'));
        remove_Message('login_message');   
    }

    if (messages_exits('signup_message')) {
        popupMessage('success', get_Message('signup_message'));
        remove_Message('signup_message');   
    }

?> 

