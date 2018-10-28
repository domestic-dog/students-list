<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <!-- https://github.com/codedokode/pasta/blob/master/student-list.md -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Students list</title>
  </head>
  <body>
  <?php echo $_SESSION['test'] ;?>
  <div class="container">
      <div class="d-flex p-2 bg-dark text-light"><h3 class="text-center">Таблица абитуриентов <?php echo'<a>                   Привет'   .$_COOKIE['surname']. '</a>' ;?> </h3>
<div class="ml-auto p-0  bg-dark text-light ">
 <?php if($_COOKIE['surname'] == false):echo '<h5 class="text-center"><a class="sad" href="/register/">register</a></h5>'; endif; ?>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    </div>
      <table class="table table-hover table-sm">
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Пол</th>
      <th scope="col">Номер группы</th>
      <th scope="col">Баллов</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($list as $product): ?>
    <tr class="active">
      <td><a href="#" class="list-group-item-action"><?php echo $product['firstname'];?></a></td>
      <td><a href="#" class="list-group-item-action"><?php echo $product['surname'];?></a></td>
      <td><a href="#" class="list-group-item-action"><?php echo $product['gender'];?></a></td>
      <td><a href="#" class="list-group-item-action"><?php echo $product['groups'];?></a></td>
      <td><a href="#" class="list-group-item-action"><?php echo $product['points'];?></a></td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
    </div>
    <style media="screen">
.form-inline {
  margin: 0;
}
    </style>
  </body>
</html>
