<!--- drivers list --->
<?php 
    require_once("connect_db.php");
    session_start();
    $_SESSION['id_d']='0';
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
    height: 18%;
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
                <h2>Водії</h2>
                <br>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row" style="height: 100%;">
            <div class="col-sm-1 " style=" background-color: #b1c840;" ></div>
            <div class="col-sm-2 " style=" background-color: #b1c840;">
                <div class="btn-group-vertical nav justify-content-end" role="group" aria-label="Basic example">
                    <a href="drivers_list.php"><button type="button" class="btn2 btn-dark2" autofocus>Список водіїв</button></a>
                    <div style="height: 15px;"></div>
                    <a href="driver_new.php"><button type="button" class="btn2 btn-dark2">Додати водія</button></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div style="height: 5%;"></div>   
                <?php
                    if(isset($_POST['all'])){
                        $sql="SELECT * FROM drivers WHERE id<>'1'";
                    } else if(isset($_POST['free'])){
                        $sql1="SELECT transportation.id_driver FROM transportation WHERE transportation.id_driver NOT IN (SELECT transportation.id_driver FROM transportation WHERE transportation.id_status='1')  GROUP BY transportation.id_driver UNION SELECT drivers.id FROM drivers WHERE drivers.id NOT IN (SELECT transportation.id_driver FROM transportation) AND drivers.id<>'1';";
                        $sql="SELECT * FROM drivers WHERE (";
                        $res1=mysqli_query($connect,$sql1);
                        if($result1=mysqli_fetch_array($res1)){
                            $sql=$sql." id='".$result1['id_driver']."' ";
                            while($result1=mysqli_fetch_array($res1)){
                                $sql=$sql."OR id='".$result1['id_driver']."' ";
                            }
                            $sql=$sql.") AND drivers.id<>'1';";
                        } else {
                            $sql="SELECT * FROM drivers WHERE id='0'";
                        }
                    } else {
                        $sql="SELECT * FROM drivers WHERE id<>'1'";
                    }
                    $res=mysqli_query($connect,$sql);
                    while($result=mysqli_fetch_array($res)){
                        ?>
                        <form method="POST" action="drivers_list.php">
                            <div class="input-group col-sm-8">
                                <input type="text" class="form-control" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4" readonly value="<?php echo $result['name']; ?>, <?php echo $result['phone']; ?>">
                                <div class="input-group-append" id="button-addon4">
                                    <button class="btn btn-outline-secondary" type="submit" value="<?php echo $result['id']; ?>" name="change">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-outline-secondary" type="submit" value="<?php echo $result['id']; ?>" name="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>                          
                                    </button>
                                </div>
                            </div>                 
                        </form>
                        <?php
                        if(isset($_POST['delete'])){
                            $sql="DELETE FROM drivers WHERE id='".$_POST['delete']."'";
                            $res=mysqli_query($connect,$sql);
                            ?>
                            <script>document.location.href="drivers_list.php"</script>
                            <?php
                        }
                        if(isset($_POST['change'])){
                            $_SESSION['id_d']=$_POST['change'];
                            ?>
                            <script>document.location.href="driver_new.php"</script>
                            <?php
                        }
                    }
                ?>
            </div>
            <div class="col-sm-2">
            <div class=" m" style=" background-color: #b1c840;">
            <div class="btn-group-vertical nav justify-content-end" role="group" aria-label="Basic example">
                    <form method="POST" action="drivers_list.php">
                        <button type="submit" class="btn3 btn3-dark3" autofocus name="all">Всі</button>
                        <div style="height: 15px;"></div>
                        <button type="submit" class="btn3 btn3-dark3" autofocus name="free">Вільні</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>