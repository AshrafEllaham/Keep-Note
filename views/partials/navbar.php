<style>
    .myprofile:hover{
        outline: 4px solid #777;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:  rgb(61, 61, 61);">
    <a class="navbar-brand navbar-logo" href="/">
        <i class="fas fa-sticky-note" style="color: #f5d505; font-size: xx-large;"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/"><i class="fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/archive"><i class="fa fa-archive"></i>Archive</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/trash"><i class="fas fa-trash"></i>Trash</a>
            </li>
        </ul>
        <form method="get" action="/home/search" class="form-inline my-2 my-lg-0">
            <div class="input-group border rounded-pill">
                <input type="search" placeholder="What're you searching for?" aria-describedby="button-addon3" class="form-control text-white bg-transparent border-0" name="search_title" autocomplete="off">
                <div class="input-group-append border-0">
                    <button id="button-addon3" type="submit" class="btn btn-link text-white"><i class="fa fa-search"></i></button>
                </div>
          </div>
        </form>
        <ul class="navbar-nav ml-3 ">
            <li class="myprofile nav-item dropdown  px-2 rounded-circle" style="background-color: #004D40; border: 2px solid #777;">
                <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        $userData = getUserData();
                        echo "<b class='text-white'> {$userData['fname'][0]}</b>";
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/profile"><i class="fas fa-user mr-2 text-info"></i> Profile</a>
                    <a class="dropdown-item" href="/login/logout"><i class="fas fa-sign-out mr-2 text-danger" ></i> Sign Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>