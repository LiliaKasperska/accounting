<!--- drivers list --->
<?php 
    require_once("connect_db.php");
    session_start();
    if (empty($_SESSION['id'])) {
        header('Location: index.php');
    }
    $status=[];
    $sql="SELECT * FROM status";
    $res=mysqli_query($connect,$sql);
    while($result=mysqli_fetch_array($res)){
        $status[$result['id']]=$result['name'];
    }
    $cargo=[];
    $sql="SELECT * FROM cargo";
    $res=mysqli_query($connect,$sql);
    while($result=mysqli_fetch_array($res)){
        $cargo[$result['id']]=$result['name'];
    }
    $cars=[];
    $sql="SELECT * FROM cars";
    $res=mysqli_query($connect,$sql);
    while($result=mysqli_fetch_array($res)){
        $cars[$result['id']]=$result['m_number'];
    }
    $drivers=[];
    $sql="SELECT * FROM drivers";
    $res=mysqli_query($connect,$sql);
    while($result=mysqli_fetch_array($res)){
        $drivers[$result['id']]=$result['name'];
    }
    $price_for_one=[];
    $sql="SELECT * FROM price_for_one";
    $res=mysqli_query($connect,$sql);
    while($result=mysqli_fetch_array($res)){
        $price_for_one[$result['id']]=$result['name'];
    }
    $destination=[];
    $sql="SELECT * FROM destination";
    $res=mysqli_query($connect,$sql);
    while($result=mysqli_fetch_array($res)){
        $destination[$result['id']]=$result['name'];
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
                <h2>Перевезення</h2>
                <br>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row" style="height: 100%;">
            <div class="col-sm-1 " style=" background-color: #b1c840;" ></div>
            <div class="col-sm-2 " style=" background-color: #b1c840;">
                <div class="btn-group-vertical nav justify-content-end" role="group" aria-label="Basic example">
                <a href="d_transporting_all.php"><button type="button" class="btn2 btn-dark2" >Список перевезень</button></a>
                    <div style="height: 15px;"></div>
                    <a href="d_transporting_my.php"><button type="button" class="btn2 btn-dark2" >Мої перевезення</button></a>
                    <div style="height: 15px;"></div>
                    <a href="d_transporting_archive.php"><button type="button" class="btn2 btn-dark2" autofocus>Архів</button></a>
                </div>
            </div>
            <div class="col-sm-6">   
            <div style="height: 5%;"></div>            
                <?php
                    $sql="SELECT * FROM transportation WHERE id_status='3' AND id_driver='".$_SESSION['id']."'";
                    $res=mysqli_query($connect,$sql);
                    while($result=mysqli_fetch_array($res)){
                        ?>
                        <form method="POST" action="transporting_archive.php">
                            <div class="input-group col-sm-11">
                                <input type="text" class="form-control" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4" readonly value="<?php echo $result['name'].", ".$result['date_start']; ?>">
                                <div class="input-group-append" id="button-addon4">
                                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModalCenter<?php echo $result['id']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                    </button>
                                    <div class="modal fade" id="exampleModalCenter<?php echo $result['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLongTitle"><b><?php echo $result['name']; ?></b></h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <i>Дата:</i> <?php echo $result['date_start']." - ".$result['date_finish']; ?><br>
                                                <i>Відстань:</i> <?php echo $result['km']; ?> км<br>
                                                <i>Вага:</i> <?php echo $result['weight']; ?> тонн<br>
                                                <i>Тип вантажу:</i> <?php foreach($cargo as $id => $name){if($result['id_type_cargo']==$id){echo $name;}} ?> <br>
                                                <i>Коментар:</i> <?php echo $result['comment']; ?><br>
                                                <i>Статус:</i>  <?php foreach($status as $id => $name){if($result['id_status']==$id){echo $name;}} ?> <br>
                                                <i>Автомобіль:</i>  <?php foreach($cars as $id => $name){if($result['id_cars']==$id){echo $name;}} ?> <br>
                                                <i>Водій:</i>  <?php foreach($drivers as $id => $name){if($result['id_driver']==$id){echo $name;}} ?> <br>
                                                <i>Тариф:</i>  <?php foreach($price_for_one as $id => $name){if($result['id_price_for_one']==$id){echo $name;}} ?> <br>
                                                <i>Пункт призначення:</i>  <?php foreach($destination as $id => $name){if($result['id_destination']==$id){echo $name;}} ?> <br>
                                                <i>Загальна вартість:</i> <?php echo $result['cost']; ?> грн.
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                 
                        </form>
                        <?php
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