<?php
require_once("config.php");
require_once("functions/functions.php");
require_once("classes/dbConnection.php");

$message = "";
$error = "";

$action = getValue("action", "POST", "str", "");
if ($action != "") {
    // Lay POST Value
    $inputID = getValue("inputID", "POST", "int", 0);
    $inputEmail = getValue("inputEmail", "POST", "str", "");
    $inputPassword = getValue("inputPassword", "POST", "str", "");

    if ($inputID > 0 && $inputEmail != "" && $inputPassword != "") {
        // Insert SQL
        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();

        $sql = 'INSERT INTO users (id, name, password) 
                VALUES (' . $inputID . ', "' . $inputEmail . '", "' . $inputPassword . '")';

        if ($conn->query($sql) === true) {
            $message = "New record created successfully";
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        header("Location: login.php");
    } else {
        $error = "Thông tin nhập không đủ !";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 30px;
            max-width: 600px;
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }

        #login-err-msg {
            width: 540px;
            margin: 30px auto;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div id="login">
        <div class="container">
            
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <form id="frmThemMoi" action="" method="POST">
            <div class="form-group">
                <label for="inputIDC">ID</label>
                <input type="id" class="form-control" id="inputID" name="inputID" placeholder="ID" required>
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
            </div>
            <input type="hidden" name="action" value="submit" />
            <button id="btnThemMoi" type="submit" class="btn btn-primary")>Thêm mới</button>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!------ Include the above in your HEAD tag ---------->