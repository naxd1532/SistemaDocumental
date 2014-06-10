<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Mis Perfiles </title>
        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo URL; ?>public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo URL; ?>public/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <script src="<?php echo URL; ?>public/js/jquery-1.11.0.min.js"></script>
    </head>
   <body class="bg-gray">
       
       <?php if(!Session::exist()){ ?>

        <div class="form-box" id="login-box" style="border: solid #ffe">
            <div class="header">Iniciar Sesi&oacute;n</div>
            <form name="signIn" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Usuario ID" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Recordarme
                    </div>
                </div>
                <div class="footer">                                                               
                    <input id="signInBtn" name="signInBtn" type="submit" class="btn bg-olive btn-block" value="Ingresar" required/>  
                </div>
            </form>
            <hr>
            <div class="margin text-center">
                <span>UNIVERSIDAD NACIONAL DE TRUJILLO</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
            <hr>
            
        </div>
        <br><br><br><br><br>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

        <script>
            $(function(){
                $('#signInBtn').click(function(e){
                    e.preventDefault();
                    signIn();
                });
                
            });
            
            
            function signIn(){
                var username = $('form[name=signIn] input[name=username]')[0].value;
                var password = $('form[name=signIn] input[name=password]')[0].value;

                $.ajax({
                    type: "POST",
                    url: "<?php echo URL;?>User/signIn",
                    data: {username:username,password:password}
                }).done(function(result){
                    //alert(response)
                    if(result==1){
                        alert("EXITO");
                        location.reload();
                    }else{
                        alert("Usuario o Password incorrectos");
                    }
                });
            }
        </script>
        
        <?php }else{ ?>
        
            <div class="form-box" id="login-box" style="border: solid #ffe">
                <?php echo Session::getValue('U_NAME'); ?>
                <button id="closeSession">Cerrar sesión</button>
            </div>
        
        <script>
            $(function(){
                $('#closeSession').click(function(){
                    document.location = "<?php echo URL; ?>User/destroySession";
                });
            });
        </script>
        <?php }?>
    </body>
    
</html>