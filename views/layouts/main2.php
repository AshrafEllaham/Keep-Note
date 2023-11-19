<?php
    is_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
      font-family: 'Poppins', sans-serif;
    }
    body{
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background: #f7f7f7;
      padding: 0 10px;
    }
    .wrapper{
      background: #fff;
      max-width: 450px;
      width: 100%;
      border-radius: 16px;
      box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                  0 32px 64px -48px rgba(0,0,0,0.5);
    }

    /* Login & Signup Form CSS Start */
    .form{
      padding: 25px 30px;
    }
    .form header{
      font-size: 25px;
      font-weight: 600;
      padding-bottom: 10px;
      border-bottom: 1px solid #e6e6e6;
    }
    .form form{
      margin: 20px 0;
    }
    .form form .error-text{
      color: #721c24;
      padding: 8px 10px;
      text-align: center;
      border-radius: 5px;
      background: #f8d7da;
      border: 1px solid #f5c6cb;
      margin-bottom: 10px;
      display: none;
    }
    .form form .name-details{
      display: flex;
    }
    .form .name-details .field:first-child{
      margin-right: 10px;
    }
    .form .name-details .field:last-child{
      margin-left: 10px;
    }
    .form form .field{
      display: flex;
      margin-bottom: 10px;
      flex-direction: column;
      position: relative;
    }
    .form form .field label{
      margin-bottom: 2px;
    }
    .form form .input input{
      height: 40px;
      width: 100%;
      font-size: 16px;
      padding: 0 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .form form .field input{
      outline: none;
    }
    .form form .image input{
      font-size: 17px;
    }
    .form form .button button{
      height: 45px;
      border: none;
      color: #fff;
      font-size: 17px;
      background: #333;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 13px;
    }
    .form form .field i{
      position: absolute;
      right: 15px;
      top: 70%;
      color: #ccc;
      cursor: pointer;
      transform: translateY(-50%);
    }
    .form form .field i.active::before{
      color: #333;
      content: "\f070";
    }
    .form .link{
      text-align: center;
      margin: 10px 0;
      font-size: 17px;
    }
    .form .link a{
      color: #333;
    }
    .form .link a:hover{
      text-decoration: underline;
    }


    /* Responive media query */
    @media screen and (max-width: 450px) {
      .form, .users{
        padding: 20px;
      }
      .form header{
        text-align: center;
      }
      .form form .name-details{
        flex-direction: column;
      }
      .form .name-details .field:first-child{
        margin-right: 0px;
      }
      .form .name-details .field:last-child{
        margin-left: 0px;
      }

      .users header img{
        height: 45px;
        width: 45px;
      }
      .users header .logout{
        padding: 6px 10px;
        font-size: 16px;
      }
      :is(.users, .users-list) .content .details{
        margin-left: 15px;
      }

      .users-list a{
        padding-right: 10px;
      }

      .chat-area header{
        padding: 15px 20px;
      }
      .chat-box{
        min-height: 400px;
        padding: 10px 15px 15px 20px;
      }
      .chat-box .chat p{
        font-size: 15px;
      }
      .chat-box .outogoing .details{
        max-width: 230px;
      }
      .chat-box .incoming .details{
        max-width: 265px;
      }
      .incoming .details img{
        height: 30px;
        width: 30px;
      }
      .chat-area form{
        padding: 20px;
      }
      .chat-area form input{
        height: 40px;
        width: calc(100% - 48px);
      }
      .chat-area form button{
        width: 45px;
      }
    }
  </style>
</head>
<body>
 
    {{contnet}}

  <script>
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