<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../bower_components/boostrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../bower_components/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styleAdmin.css" />
</head>
<body>
    <div class="loginAdmin">
        <div class="header">
            <h1>Login Admin</h1>
        </div>
        <div class="body">
                <form id="myForm"  name="myForm" method="post" action="" onsubmit="return loginAdmin(event)">
            
                
                        <div class="wrap-input100" >
                                <input class="input100" type="text" id="username" name="username" placeholder="username" value="" required>
                                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                            </div>
                            <div class="wrap-input100" >
                                <input class="input100" type="password" id="password" name="kataSandi" placeholder="Kata Sandi" value="" required>
                                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>
                            
                        <input type="submit" value="MASUK" class="submit"  /><br/>
                        
                </form>
        </div>
    </div>
</body>
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/boostrap/dist/js/bootstrap.min.js"></script>
<script src="../js/style.js"></script>
<script src="../js/CRUDadmin.js"></script>
</html>
