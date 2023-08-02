<?php 
 require_once("connect_db.php");
?>
<html class="html_index">
    <head>
        <title>Контінентал</title>
        <link rel="stylesheet" href="css.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body style=" background-color: #b1c840;">
        <div class="header">
            <img src="logo.png" class="ind_logo">
        </div>
        <div class="index_space"></div>
        <div class="row">
            <div class="main_ind col-sm-5">
                <div class="main_index">
                    <br>
                    <h1 class="h">Вхід</h1>
                    <br>
                    <div class="accordion" id="accordionExample">
                        <div class="card1">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="links" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Адміністратор</button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse <?php if(isset($_POST['admin'])){ echo 'show';} ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form method="POST" action="index.php">
                                        Логін: <input type="text" class="form-control" name="a_login"><br>
                                        Пароль: <input type="password" class="form-control" name="a_pass"><br>
                                        <div style="text-align:center;"><input type="submit" class="btn btn-light" value="Увійти" name="admin"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card1">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="links" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Водій</button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse  <?php if(isset($_POST['driver'])){ echo 'show';} ?>" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form method="POST" action="index.php">
                                        Логін: <input type="text" class="form-control" name="d_login"><br>
                                        Пароль: <input type="password" class="form-control" name="d_pass"><br>
                                        <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Увійти" name="driver"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>        
        <?php
            session_start();
            if(!empty($_SESSION['id'])){
                header('Location: profile.php');
            } else {
                if(isset($_POST['admin'])){
                    $sql="SELECT * FROM administrators WHERE login='".$_POST['a_login']."' AND password='".$_POST['a_pass']."'";
                    $res=mysqli_query($connect,$sql);
                    $result=mysqli_fetch_array($res);
                    if(empty($result)){
                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Невірний логін або пароль<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                    } else {
                        $_SESSION['type']='admin';
                        $_SESSION['id']=$result['id'];
                        header('Location: profile.php');
                    }
                }
                if(isset($_POST['driver'])){
                    $sql="SELECT * FROM drivers WHERE login='".$_POST['d_login']."' AND password='".$_POST['d_pass']."'";
                    $res=mysqli_query($connect,$sql);
                    $result=mysqli_fetch_array($res);
                    if(empty($result)){
                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Невірний логін або пароль<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                    } else {
                        $_SESSION['type']='driver';
                        $_SESSION['id']=$result['id'];
                        header('Location: profile.php');
                    }
                }
            }
        ?>          
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>