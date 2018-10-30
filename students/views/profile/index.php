<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- https://github.com/codedokode/pasta/blob/master/student-list.md -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Students list</title>
</head>
<body>
<div class="container">

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Профиль</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post">
                            <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Имя</label>
                                <div class="col-8">
                                    <input id="username" name="username" value="<?php echo $list['firstname']; ?>"  readonly class="form-control-plaintext" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Фамилия</label>
                                <div class="col-8">
                                    <input id="name" name="name" value="<?php echo $list['surname']; ?>"  readonly class="form-control-plaintext" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Пол</label>
                                <div class="col-8">
                                    <input id="lastname" name="lastname" value="<?php echo $list['gender']; ?>" readonly class="form-control-plaintext" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Баллы</label>
                                <div class="col-8">
                                    <input id="text" name="text" value="<?php echo $list['points']; ?>"  readonly class="form-control-plaintext" required="required" type="text">
                                </div>
                            </div>
                            <?php if(Profile::goEdit($list['id'])==true): echo'<button type="submit" class="btn btn-primary" name="submit" value="true" >Редактировать профиль</button>'; endif; ?>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
