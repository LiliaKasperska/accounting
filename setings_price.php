<!--- setings admin --->
<?php 
    require_once("connect_db.php");
    session_start();
    if (empty($_SESSION['id'])) {
        header('Location: index.php');
    }
    if($_SESSION['id']=='1'){
        header('Location: profile.php');
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
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out; }
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
        <div class="col-sm-3" style=" background-color: #b1c840;"></div>
            <div class="col-sm-6">
            <div style="height: 70%;"></div>
                <h2>Ціни за 1 км</h2>
                <br>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row" style="height: 100%;">
            <div class="col-sm-1 " style=" background-color: #b1c840;" ></div>
            <div class="col-sm-2 " style=" background-color: #b1c840;">
                <div class="btn-group-vertical nav justify-content-end" role="group" aria-label="Basic example">
                    <a href="setings_type.php"><button type="button" class="btn2 btn-dark2">Категорії вантажів</button></a>
                    <div style="height: 15px;"></div>
                    <a href="setings_price.php"><button type="button" class="btn2 btn-dark2" autofocus>Ціни за 1 км</button></a>
                    <div style="height: 15px;"></div>
                    <a href="setings_destination.php"><button type="button" class="btn2 btn-dark2">Пункти призначення</button></a>
                </div>
            </div>
            <div class="col-sm-6">
            <div style="height: 5%;"></div>
                <?php
                    $sql="SELECT * FROM price_for_one";
                    $res=mysqli_query($connect,$sql);
                    while($result=mysqli_fetch_array($res)){
                        ?>
                        <form method="POST" action="setings_price.php">
                            <div class="input-group mb-3 col-sm-9">
                                <input type="text" class="form-control" value="<?php echo $result['name']; ?>" aria-describedby="button-addon2" name="text">
                                <input type="text" class="form-control col-sm-2" value="<?php echo $result['price']; ?>" aria-describedby="button-addon2" name="price">
                                <div class="input-group-append">
                                    <input type="submit" class="btn btn-outline-secondary" name="<?php echo $result['id']; ?>" value="Зберегти зміни">
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST[$result['id']])){
                            if(!empty($_POST['text']) and !empty($_POST['price'])){
                                $sql="UPDATE price_for_one SET name='".$_POST['text']."', price='".$_POST['price']."' WHERE id='".$result['id']."'";
                                $res=mysqli_query($connect,$sql);
                                ?>
                                <script>document.location.href="setings_price.php"</script>
                                <?php
                            } else {
                                $sql="DELETE FROM price_for_one WHERE id='".$result['id']."'";
                                $res=mysqli_query($connect,$sql);
                                ?>
                                <script>document.location.href="setings_price.php"</script>
                                <?php
                            }
                        }
                    }
                ?>
                <form method="POST" action="setings_price.php">
                    <div class="input-group mb-3 col-sm-9">
                        <input type="text" class="form-control" placeholder="Введіть нову назву" aria-describedby="button-addon2" name="txt">
                        <input type="text" class="form-control col-sm-2" placeholder="Ціна" aria-describedby="button-addon2" name="price1">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-outline-secondary" value="Зберегти" name="save">
                        </div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['save'])){
                        if(!empty($_POST['txt']) and !empty($_POST['price1'])){
                            $sql="INSERT INTO price_for_one (name, price) VALUES ('".$_POST['txt']."', '".$_POST['price1']."')";
                            $res=mysqli_query($connect,$sql);
                            ?>
                            <script>document.location.href="setings_price.php"</script>
                             <?php
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