<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/animate.css" />
        <link rel="stylesheet" href="font/stylesheet.css" />
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="js/admin.js"></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            body {
                font-family: "varela_roundregular";
                font-size: 20px;
            }
            #nav-menu {
            margin-right: 1rem; 
            }
            img{
                filter: invert(100%);
                width: 150px;
                height: 75px;
            }
            .center-form{
                background-image: url('img/paper.jpg');
                padding: 2em 2em;
                margin: auto;
                margin-top: 18rem;
                display: none;
            }

            #btnLogin:hover {
                box-shadow: 0px 4px 8px 0px black;
            }

            .alert{
                position: absolute;
                top: 75%;
                left: 50%;
                width: 35rem;
            }

            .alert h3{
                margin: 0 0 1rem;
                font-size: 1.4rem;
            }
        </style>
        <script>
            $(document).ready(function(){
                $(".center-form").css("display", "block");
                $(".center-form").addClass(" animated fadeInLeftBig"); 
            });
        </script>
        <title>Welcome</title>
    </head>
    <body>
        <div class="row justify-content-center align-middle">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="container centered text-center">
                    <form method="POST" class="text-center">
                    <!--Inputs for username and pasword -->
                        <div class="container center-form">
                            <p><h1>Welcome</h1></p>
                            <p><input type="text" class="form-control" placeholder="Enter Username" name="username" required /></p>
                            <p><input type="password" class="form-control" placeholder="Enter Password" name="password" required/></p>
                            <p><input type="submit" class="btn btn-dark btn-block" name="btnLogin" value="Login"></p>
                            <input type="hidden" name="controller" value="main" />
                            <input type="hidden" name="action" value="login" />
                        </div>
                        <?php 
                            require_once('route.php');
                        ?>
                    </form>  
                </div>
            </div>
        </div>
    </body>
</html>