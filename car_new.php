<!--- drivers list --->
<?php 
    require_once("connect_db.php");
    session_start();
    if (empty($_SESSION['id'])) {
        header('Location: index.php');
    }
    if($_SESSION['id']=='1'){
        header('Location: profile.php');
    }
    if(isset($_GET['a'])){
        if($_GET['a']=='0'){
        $_SESSION['id_c']='0';
        }
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

    .btn-dark2 {
        color: #fff;
        background-color: #c5a31b;
    }

    .btn2 {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid #c5a31b;
        border-top-color: #c5a31b;
        border-right-color: #c5a31b;
        border-bottom-color: #c5a31b;
        border-left-color: #c5a31b;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .m {
        border-radius: .25rem;
        border: 1rem solid #b1c840;
        height: 32%;
    }

    .btn3-dark3 {
        color: white;
        border-color: white;
    }  

    .btn3 {
        display: inline-block;
         font-weight: 400;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
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
    <body>
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
        <div class="row">
            <div class="col-sm-3 " style=" background-color: #b1c840;"></div>
            <div class="col-sm-6">
                <div style="height: 70%;"></div>
                <?php if($_SESSION['id_c']=='0') { ?>
                    <h2>Додати новий автомобіль</h2> 
                <?php } else { ?>
                    <h2>Редагування даних</h2>
                <?php } ?>
                <br>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row" style="height: 100%;">
            <div class="col-sm-1 " style=" background-color: #b1c840;" ></div>
            <div class="col-sm-2 " style=" background-color: #b1c840;">
                <div class="btn-group-vertical nav justify-content-end" role="group" aria-label="Basic example">
                    <a href="cars_list.php"><button type="button" class="btn2 btn-dark2">Список автомобілів</button></a>
                    <div style="height: 15px;"></div>
                    <a href="car_new.php?a=0"><button type="button" class="btn2 btn-dark2" <?php if ($_SESSION['id_c']=='0'){ ?> autofocus <?php } ?>>Додати автомобіль</button></a>
                </div>
            </div>
            <div class="col-sm-3">
            <div style="height: 5%;"></div>
                <?php
                    if($_SESSION['id_c']!='0'){
                        $sql="SELECT * FROM cars WHERE id='".$_SESSION['id_c']."'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                    }
                ?>
                <form method="POST" action="car_new.php">
                    Марка: <input type="text" class="form-control" name="brand" <?php if($_SESSION['id_c']!='0'){ ?> value="<?php echo $result['brand']; ?>" <?php } ?>><br>
                    Номер: <input type="text" class="form-control" name="m_number" <?php if($_SESSION['id_c']!='0'){ ?> value="<?php echo $result['m_number']; ?>" <?php } ?>><br>
                    Максимальна вага: <input type="text" class="form-control" name="max_weight_cargo" <?php if($_SESSION['id_c']!='0'){ ?> value="<?php echo $result['max_weight_cargo']; ?>" <?php } ?>><br>
                    <?php if ($_SESSION['id_c']=='0'){ ?> 
                        <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save_new"></div>
                    <?php } else { ?>
                        <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save"></div>
                    <?php } ?>   
                </form>
                <?php
                    if(isset($_POST['save_new'])){
                        if(!empty($_POST['brand']) and !empty($_POST['m_number']) and !empty($_POST['max_weight_cargo'])){
                            $sql="INSERT INTO cars (brand, m_number, max_weight_cargo) VALUES ('".$_POST['brand']."','".$_POST['m_number']."','".$_POST['max_weight_cargo']."')";
                            $res=mysqli_query($connect,$sql);
                            ?>
                            <script>document.location.href="cars_list.php"</script>
                            <?php
                        } else {
                            echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                        }
                    }
                    if(isset($_POST['save'])){
                        if(!empty($_POST['brand']) and !empty($_POST['m_number']) and !empty($_POST['max_weight_cargo'])){
                            $sql="UPDATE cars SET brand='".$_POST['brand']."', m_number='".$_POST['m_number']."', max_weight_cargo='".$_POST['max_weight_cargo']."' WHERE id='".$_SESSION['id_c']."'";
                            $res=mysqli_query($connect,$sql);
                            ?>
                            <script>document.location.href="cars_list.php"</script>
                            <?php
                        } else {
                            echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                        }
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