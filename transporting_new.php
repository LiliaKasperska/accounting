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
        $_SESSION['id_t']='0';
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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />             
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
        <div class="col-sm-3" style=" background-color: #b1c840;"></div>
            <div class="col-sm-6">
            <div style="height: 70%;"></div>
                <?php if($_SESSION['id_t']=='0') { ?>
                    <h2>Додати нове перевезення</h2> 
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
                <a href="transporting_main.php"><button type="button" class="btn2 btn-dark2" >Список перевезень</button></a>
                    <div style="height: 15px;"></div>
                    <a href="transporting_active.php"><button type="button" class="btn2 btn-dark2">Активні перевезення</button></a>
                    <div style="height: 15px;"></div>
                    <a href="transporting_new.php?a=0"><button type="button" class="btn2 btn-dark2" <?php if ($_SESSION['id_t']=='0'){ ?> autofocus <?php } ?>>Додати перевезення</button></a>
                    <div style="height: 15px;"></div>
                    <a href="transporting_archive.php"><button type="button" class="btn2 btn-dark2">Архів</button></a>
                </div>
            </div>
            <div class="col-sm-3">
            <div style="height: 5%;"></div>
                <?php
                    if($_SESSION['id_t']!='0'){
                        $sql="SELECT * FROM transportation WHERE id='".$_SESSION['id_t']."'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                    }
                ?>
                <form method="POST" action="transporting_new.php">
                    Назва: <input type="text" class="form-control" name="name" <?php if($_SESSION['id_t']!='0'){ ?> value="<?php echo $result['name']; ?>" <?php } ?>><br>
                    Відстань: <input type="number" class="form-control" name="km" <?php if($_SESSION['id_t']!='0'){ ?> value="<?php echo $result['km']; ?>" <?php } ?>><br>
                    Вага: <input type="number" class="form-control" name="weight" <?php if($_SESSION['id_t']!='0'){ ?> value="<?php echo $result['weight']; ?>" <?php } ?>><br>
                    Дата старту: <input type="date" class="form-control" name="date_start" <?php if($_SESSION['id_t']!='0'){ ?> value="<?php echo $result['date_start']; ?>" <?php } ?>><br>
                    Кінцева дата: <input type="date" class="form-control" name="date_finish" <?php if($_SESSION['id_t']!='0'){ ?> value="<?php echo $result['date_finish']; ?>" <?php } ?>><br>
                    Коментар: <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" ><?php if($_SESSION['id_t']!='0'){ echo $result['comment']; } ?></textarea><br>
                    Статус: 
                    <select class="form-control" id="exampleFormControlSelect1" name="id_status">
                        <?php $sql1="SELECT * FROM status";
                        $res1=mysqli_query($connect,$sql1);
                        while($result1=mysqli_fetch_array($res1)){
                            echo "<option value='".$result1['id']."'";
                            if(!empty($result['id_status'])){
                                if($result1['id']==$result['id_status']){
                                    echo ' selected ';
                                }
                            }
                            echo ">".$result1['name']."</option>";
                        } ?>
                    </select><br>
                    Машина: 
                    <select class="form-control" id="exampleFormControlSelect1" name="id_cars">
                        <?php $sql2="SELECT * FROM cars";
                        $res2=mysqli_query($connect,$sql2);
                        while($result2=mysqli_fetch_array($res2)){
                            echo "<option value='".$result2['id']."'";
                            if(!empty($result['id_status'])){
                                if($result2['id']==$result['id_cars']){
                                    echo ' selected ';
                                }
                            }
                            echo ">".$result2['m_number']."</option>";
                        } ?>
                    </select><br>
                    Тип вантажу: 
                    <select class="form-control" id="exampleFormControlSelect1" name="id_type_cargo">
                        <?php $sql3="SELECT * FROM cargo";
                        $res3=mysqli_query($connect,$sql3);
                        while($result3=mysqli_fetch_array($res3)){
                            echo "<option value='".$result3['id']."'";
                            if(!empty($result['id_status'])){
                                if($result3['id']==$result['id_type_cargo']){
                                    echo ' selected ';
                                }
                            }
                            echo ">".$result3['name']."</option>";
                        } ?>
                    </select><br>
                    Водій: 
                    <select class="form-control" id="exampleFormControlSelect1" name="id_driver">
                        <?php $sql4="SELECT * FROM drivers";
                        $res4=mysqli_query($connect,$sql4);
                        while($result4=mysqli_fetch_array($res4)){
                            echo "<option value='".$result4['id']."'";
                            if(!empty($result['id_status'])){
                                if($result4['id']==$result['id_driver']){
                                    echo ' selected ';
                                }
                            }
                            echo ">".$result4['name']."</option>";
                        } ?>
                    </select><br>
                    Тариф: 
                    <select class="form-control" id="exampleFormControlSelect1" name="id_price_for_one">
                        <?php $sql5="SELECT * FROM price_for_one";
                        $res5=mysqli_query($connect,$sql5);
                        while($result5=mysqli_fetch_array($res5)){
                            echo "<option value='".$result5['id']."'";
                            if(!empty($result['id_status'])){
                                if($result5['id']==$result['id_price_for_one']){
                                    echo ' selected ';
                                }
                            }
                            echo ">".$result5['name']."</option>";
                        } ?>
                        </select><br>
                        Пукнт призначення: 
                        <select class="form-control" id="exampleFormControlSelect1" name="id_destination">
                        <?php $sql6="SELECT * FROM destination";
                        $res6=mysqli_query($connect,$sql6);
                        while($result6=mysqli_fetch_array($res6)){
                            echo "<option value='".$result6['id']."'";
                            if(!empty($result['id_destination'])){
                                if($result6['id']==$result['id_destination']){
                                    echo ' selected ';
                                }
                            }
                            echo ">".$result6['name']."</option>";
                        } ?>
                    </select><br>
                    Вартість: <input readonly type="text" class="form-control" name="m_number" <?php if($_SESSION['id_t']!='0'){ ?> value="<?php echo $result['cost']; ?>" <?php } ?>><br>
                    <?php if ($_SESSION['id_t']=='0'){ ?> 
                        <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save_new"></div>
                    <?php } else { ?>
                        <div style="text-align:center;"><input type="submit" class="btn btn-secondary" value="Зберегти зміни" name="save"></div>
                    <?php } ?>
                </form>
                <?php
                    if(isset($_POST['save_new'])){
                        $sql="SELECT * FROM price_for_one WHERE id='".$_POST['id_price_for_one']."'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        $cost=(int)$result['price']*(int)$_POST['km'];
                        if(!empty($_POST['name']) and !empty($_POST['km']) and !empty($_POST['weight']) and !empty($_POST['date_start']) and !empty($_POST['date_finish']) and !empty($_POST['comment'])){
                            $sql="INSERT INTO transportation (name, km, weight, date_start, date_finish, date_cr_change, comment, id_status, id_cars, id_type_cargo, id_driver, id_price_for_one, id_destination, cost) VALUES ('".$_POST['name']."','".$_POST['km']."','".$_POST['weight']."', '".$_POST['date_start']."', '".$_POST['date_finish']."', CURRENT_DATE(), '".$_POST['comment']."','".$_POST['id_status']."', '".$_POST['id_cars']."','".$_POST['id_type_cargo']."','".$_POST['id_driver']."', '".$_POST['id_price_for_one']."', '".$_POST['id_destination']."','".$cost."')";
                            $res=mysqli_query($connect,$sql);
                            $sql="SELECT * FROM transportation ORDER BY id DESC LIMIT 1;";
                            $res=mysqli_query($connect,$sql);
                            $result=mysqli_fetch_array($res);
                            $_SESSION['id_t']=$result['id'];
                            ?>
                            <script>document.location.href="transporting_new.php"</script>
                            <?php
                        } else {
                            echo "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Помилка!<br></strong> Заповніть усі поля<button type='button' class='close' data-dismiss='alert' aria-label='Закрити'><span aria-hidden='true'>&times;</span></button></div>";
                        }
                    }
                    if(isset($_POST['save'])) {
                        $sql="SELECT * FROM price_for_one WHERE id='".$_POST['id_price_for_one']."'";
                        $res=mysqli_query($connect,$sql);
                        $result=mysqli_fetch_array($res);
                        $cost=(int)$result['price']*(int)$_POST['km'];
                        if(!empty($_POST['name']) and !empty($_POST['km']) and !empty($_POST['weight']) and !empty($_POST['date_start']) and !empty($_POST['comment'])){
                            $sql="UPDATE transportation SET name='".$_POST['name']."', km='".$_POST['km']."', weight='".$_POST['weight']."', date_start='".$_POST['date_start']."', date_finish='".$_POST['date_finish']."', date_cr_change=CURRENT_DATE(), comment='".$_POST['comment']."', id_status='".$_POST['id_status']."', id_cars='".$_POST['id_cars']."', id_type_cargo='".$_POST['id_type_cargo']."', id_driver='".$_POST['id_driver']."', id_price_for_one='".$_POST['id_price_for_one']."', id_destination='".$_POST['id_destination']."', cost='".$cost."' WHERE id='".$_SESSION['id_t']."'";
                            $res=mysqli_query($connect,$sql);
                            ?>
                            <script>document.location.href="transporting_new.php"</script>
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