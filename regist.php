

<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Пример на bootstrap 4: Макет jumbotron с навигационной панели и базовая система разметки.">

    <title>Вход/регистрация</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="/docs/4.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>


 <!-- <div class="container" >
    

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex ">
          <a class="p-2 text-muted" href="stolovka.html">Главная</a>
          <a class="p-2 text-muted" href="sup.html">Меню</a>
          <a class="p-2 text-muted" href="">Контакты</a>
         
        </nav>
      </div>
    </div> -->
   
<?php
	//$request 
	$data = $_POST;
	if( isset($data['signup']))
	{
		$errors = array();
		if (trim($data['login'])==''){
			$errors[] = '  Введите Логин!';
		}
		if (trim($data['password'])==''){
			$errors[] = '  Введите Пароль!';
		}
	
	if( empty($errors))
	{
		$userlogin = $data['login'];
		$passw = $data['password'];
		$pass_sec = hash_hmac("sha256", $passw, 'enotiki');
		$userpass = password_hash($pass_sec, PASSWORD_DEFAULT);
		
		$mysql = mysqli_connect('127.0.0.1', 'root','', 'baza1');
		if ($mysql == false){
		echo 'Не удалось подключиться к бд<br>';
		echo mysqli_connect_error();
		exit();

   

		}
		
		
		$result = mysqli_query($mysql, "INSERT INTO users (login, pass) VALUES('$userlogin','$userpass')");
		mysqli_close($mysql);
		header('Location: /personal.html');
		
	}

	else{
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
}
?>



<main role="main">

 <section class="jumbotron text-center" >
        <div class="container" >
          <img src="img/poloska.png" height="50" width="1000">
          <h1 class="jumbotron-heading">Столовая Танюша</h1>
          <p class="lead text-muted">Пообедай вкусно и дешево</p>
          <img src="img/poloska.png" height="50" width="1000">
        </div>
      </section>

	<div class = "row">
	<div class="col-md-5 ">
            <div class="card">
              <div class="card-body text-dark">
                <form action ="/regist.php" method = "POST">
                  <div class="form-group">
					<p> Если вы новый пользователь</p>
                    <label for="login">Логин</label>
                    <input type="login" class="form-control" id="login" name="login" placeholder="Введите логин" value = "<?php echo @$data['login']; ?>">
                </div>
				<div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль">
                  </div>
                  <button type="submit" class="btn btn-success btn-block btn-lg mb-2" name = "signup">Зарегистрироваться</button>
                </form>
              </div>
            </div>
          </div>
		  <div class="col-md-5 ">
            <div class="card">
              <div class="card-body text-dark">
                <form action ="/auth.php" method = "POST">
                  <div class="form-group">
					<p> Старый друг </p>
                    <label for="login">Логин</label>
                    <input type="login" class="form-control" id="login" name="login1" placeholder="Введите логин" value = "<?php echo @$data['login']; ?>">
                </div>
				<div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password1" placeholder="Введите пароль" value = "<?php echo @$_POST['password1']; ?>">
                  </div>
                  <button type="submit" class="btn btn-success btn-block btn-lg mb-2" name = "auth">Авторизоваться</button>
                </form>
              </div>
            </div>
          </div>	
	</div>
  
</main>

 <footer class="page-footer font-small blue-grey lighten-5">
      <div style="background-color: #F5F5F5;">
        <div class="container text-center text-md-left mt-5 py-3">
          <div class="row mt-3 dark-grey-text">
           

           
            <div class="">
              <h6 class="text-uppercase weight-bold">Ссылки</h6>
              <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
              <p> <a class="dark-grey-text" href="">Книга предложений</a> </p>
              <p> <a class="dark-grey-text" href="">Отзывы</a> </p>
              <p> <a class="dark-grey-text" href="">Проверка чистоты</a> </p>
             
            </div>

          
            </div>
          </div>
        </div>

        <div class="footer-copyright text-center text-black-50 py-3">© 2019-2020. Все права защищены</div>
      </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3.1/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>