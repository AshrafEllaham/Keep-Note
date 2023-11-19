<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Note</title>
      
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        body{
            background: #f7f7f7;
        }
        .card {
          box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
          background: #fff;
          transition: all 0.5s ease;
          user-select: none;
          z-index: 10;
          overflow: hidden
        }
        .card_main:hover {
          color: #fff;
          transform: scale(1.025);
          box-shadow: rgba(0, 0, 0, 0.24) 0px 5px 10px;
          border-color: #1b9ce3;
        }

        .form-control:focus {
            box-shadow: none;
        }
        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }
        i {
            margin-right: 10px;
        }
        .navbar-logo{
            padding: 15px;
        }
        .fab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            /* background-color: #007bff; */
            background-color: #f5d505;
            color: #fff;
            text-align: center;
            font-size: 24px;
            line-height: 56px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .fab:hover {
            /* background-color: #0056b3; */
            background-color: #e0c407;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.1);
        }
        
    </style>

</head>
<body>
      <?php include base_path() . 'views/partials/navbar.php'; ?>

    <div class="row" style=" margin:0">
        <div class="col-12">
            {{contnet}}
        </div>
    </div>
      
    <script>
        $(document).ready(function() {
        $('#popupModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var name = button.data('name');
            var description = button.data('description');
            var id = button.data('id');
            var modal = $(this);
            modal.find('#popupModalTitle').text(name);
            modal.find('#popupModalBody').text(description);
            modal.find('#IDnote').val(id);
            modal.find('#IDnoteTrash').val(id);
            modal.find('#IDnoteArchive').val(id);

            modal.find('#IDnoteArchiveTrash').val(id);
            modal.find('#IDnoteUnarchive').val(id);

            modal.find('#IDnoteDelete').val(id);
            modal.find('#IDnoteRestore').val(id);
        });
        });

        // add button
        $(document).ready(function() {
            $('#popupModalAdd').on('show.bs.modal');
        });

        // active tab
        $(document).ready(function() {
            // Get the current URL path and assign 'active' class to the corresponding navbar item
            var currentPath = window.location.pathname;
            $('.navbar-nav > li > a[href="' + currentPath + '"]').addClass('active');
        });

        // message
        $(document).ready(function() {
            // Show the popup automatically
            $('#message').modal('show');
        });

        // show password
        const passwordFields = document.querySelectorAll("input[type='password']"),
        toggleIcons = document.querySelectorAll(".field i");

        toggleIcons.forEach((toggleIcon, index) => {
            toggleIcon.onclick = () => {
                const passwordField = passwordFields[index];
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleIcon.classList.add("active");
                } else {
                    passwordField.type = "password";
                    toggleIcon.classList.remove("active");
                }
            };
        });
    </script>

  </body>
</html>
