<!--- profile --->
<?php 
    require_once("connect_db.php");
    session_start();
    if (empty($_SESSION['id'])) {
        header('Location: index.php');
    }
?>
<style>
    .btn-dark1 {
        color: white;
        background-color: #84a647;
        border-color: #84a647;
    }
    .btn11 {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid transparent;
      padding: .375rem .75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: .25rem;
      transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>

<html class="html_index">
    <head>
        <title>Контінентал</title>
        <link rel="stylesheet" href="css.css" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">     
    </head>
    <body style=" background-color: #b1c840;">
        <div class="header">
            <img src="logo.png" style="height: 50%;">
            <div style="width: 20%;"></div>
            <div class="btn-group nav justify-content-end" role="group" aria-label="Basic example">
                <a href="profile.php"><button type="button" class="btn11 btn-dark1">Профіль</button></a>
                <div style="width: 5px;"></div>
                <?php 
                    if(!empty($_SESSION['type'])){
                        if($_SESSION['type']=='admin'){
                            ?>
                                <a href="transporting_main.php"><button type="button" class="btn11 btn-dark1">Перевезення</button></a>
                                <div style="width: 5px;"></div>
                                <a href="drivers_list.php"><button type="button" class="btn11 btn-dark1">Водії</button></a>
                                <div style="width: 5px;"></div>
                                <a href="cars_list.php"><button type="button" class="btn11 btn-dark1">Автомобілі</button></a>
                                <div style="width: 5px;"></div>
                                <a href="setings_type.php"><button type="button" class="btn11 btn-dark1">Налаштування</button></a>
                                <div style="width: 5px;"></div>
                                <a href="exit.php"><button type="button" class="btn11 btn-dark1">Вихід</button></a>
                            <?php
                        }
                        if($_SESSION['type']=='driver'){
                            ?>
                                <a href="d_transporting_all.php"><button type="button" class="btn11 btn-dark1">Перевезення</button></a>
                                <div style="width: 5px;"></div>
                                <a href="d_cars_list.php"><button type="button" class="btn11 btn-dark1">Автомобілі</button></a>
                                <div style="width: 5px;"></div>
                                <a href="exit.php"><button type="button" class="btn11 btn-dark1">Вихід</button></a>
                            <?php
                        }
                    }
                ?>
            </div>
            <div style="width: 8%;"></div>
        </div>
        <div style="height: 5%;"></div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-7">
                <h2><b>Особиста інформація</b></h2>
                <br>
                <?php
                    if($_SESSION['type']=='admin'){
                        $sql="SELECT * FROM administrators WHERE id='".$_SESSION['id']."'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        ?>
                        <h4><?php echo $result['name']; ?></h4>
                        <p>Логін: <?php echo $result['login']; ?></p>
                        <?php
                        if($result['login']=='admin'){
                            ?>
                            <br>
                            <div class="alert alert-danger" role="alert">
                                <strong>Важливо!</strong><br> Для продовження роботи змініть дані профілю на особисті
                            </div>
                            <?php
                        }
                        ?><br>
                        <p><a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Редагувати дані</a></p>
                        <div class="collapse col-sm-5 <?php if(isset($_POST['save'])){ echo 'show';} ?>" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="profile.php">
                                    Прізвище, ім'я: <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>" ><br>
                                    Логін: <input type="text" class="form-control" name="login" value="<?php echo $result['login']; ?>"><br>
                                    <?php if($result['login']!='admin'){?>
                                        <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save1"></div> <hr>
                                    <?php } ?>
                                    Пароль: <input type="password" class="form-control" name="pass_f"><br>
                                    Повторіть пароль: <input type="password" class="form-control" name="pass_s"><br>
                                    <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save"></div>
                                </form>
                            </div>
                        </div>
                        <?php
                        if(isset($_POST['save'])){
                            if($result['login']=='admin'){
                                if($_POST['pass_f']==$_POST['pass_s'] and !empty($_POST['pass_f']) and !empty($_POST['login']) and !empty($_POST['name'])){
                                    $sql="INSERT INTO administrators (name, login, password) VALUES ('".$_POST['name']."','".$_POST['login']."','".$_POST['pass_f']."')";
                                    $res=mysqli_query($connect,$sql);
                                    $sql="SELECT id FROM administrators WHERE login='".$_POST['login']."'";
                                    $res=mysqli_query($connect,$sql);
                                    $result=mysqli_fetch_array($res);
                                    $_SESSION['id']=$result['id'];
                                    header('Location: profile.php');
                                } else {
                                    echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                                }
                            } else {
                                if($_POST['pass_f']==$_POST['pass_s'] and !empty($_POST['pass_f'])){
                                    $sql="UPDATE administrators SET password='".$_POST['pass_f']."' WHERE id='".$_SESSION['id']."'";
                                    $res=mysqli_query($connect,$sql);
                                } else {
                                    echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                                }
                            }
                        }
                        if(isset($_POST['save1'])){
                            if(!empty($_POST['login']) and !empty($_POST['name'])){
                                $sql="UPDATE administrators SET name='".$_POST['name']."', login='".$_POST['login']."' WHERE id='".$_SESSION['id']."'";
                                $res=mysqli_query($connect,$sql);
                                header('Location: profile.php');
                            } else {
                                echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                            }
                        }
                    }
                    if($_SESSION['type']=='driver'){
                        $sql="SELECT * FROM drivers WHERE id='".$_SESSION['id']."'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        $sql111="SELECT transportation.id FROM transportation, drivers WHERE drivers.date_visit<transportation.date_cr_change AND drivers.id='".$_SESSION['id']."'";
                        $res111=mysqli_query($connect,$sql111);
                        $result111=mysqli_fetch_array($res111);
                        if(!empty($result111)){
                            ?>
                        <div class="alert alert-warning alert-dismissible fade show col-sm-5" role="alert">
                            <strong>Повідомлення!</strong><br> Внесено зміни у ваші перевезення!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Закрити">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php } ?>
                        <h4><?php echo $result['name']; ?></h4>
                        <p>Телефон: <?php echo $result['phone']; ?></p>
                        <p>Логін: <?php echo $result['login']; ?></p>
                        <p><a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Редагувати дані</a></p>
                        <div class="collapse col-sm-5 <?php if(isset($_POST['save'])){ echo 'show';} ?>" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="profile.php">
                                    Прізвище, ім'я: <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>" ><br>
                                    Логін: <input type="text" class="form-control" name="login" value="<?php echo $result['login']; ?>"><br>
                                    Телефон: <input type="text" class="form-control" name="phone" value="<?php echo $result['phone']; ?>"><br>
                                    <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save1"></div> <hr>
                                    Пароль: <input type="password" class="form-control" name="pass_f"><br>
                                    Повторіть пароль: <input type="password" class="form-control" name="pass_s"><br>
                                    <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save"></div>
                                </form>
                            </div>
                        </div>
                        <?php
                        if(isset($_POST['save'])){
                            if($_POST['pass_f']==$_POST['pass_s'] and !empty($_POST['pass_f'])){
                                $sql="UPDATE drivers SET password='".$_POST['pass_f']."' WHERE id='".$_SESSION['id']."'";
                                $res=mysqli_query($connect,$sql);
                            } else {
                                echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                            }
                        }
                        if(isset($_POST['save1'])){
                            if(!empty($_POST['login']) and !empty($_POST['name']) and !empty($_POST['phone'])){
                                $sql="UPDATE drivers SET name='".$_POST['name']."', login='".$_POST['login']."', phone='".$_POST['phone']."' WHERE id='".$_SESSION['id']."'";
                                $res=mysqli_query($connect,$sql);
                                header('Location: profile.php');
                            } else {
                                echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                            }
                        }
                        $sql="UPDATE drivers SET date_visit=CURRENT_DATE() WHERE id='".$result['id']."';";
                        $res=mysqli_query($connect,$sql);
                    }
                ?>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>