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

    <div class="col-md-9"center>
        <div class="card center">
            <div class="card-body center">
                <div class="row">
                    <div class="col-md">
                        <h4>Профиль</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <form action='<?php echo $list['id']; ?>' method="post">
                            <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">Имя</label>
                                <div class="col-8">
                                    <input id="username" name="firstname" value="<?php echo $list['firstname']; ?>"
                                           class="form-control" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Фамилия</label>
                                <div class="col-8">
                                    <input id="name" name="surname" value="<?php echo $list['surname']; ?>"
                                           class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Пол</label>
                                <div class="col-8">
                                    <input id="lastname" name="gender" value="<?php echo $list['gender']; ?>"
                                           class="form-control" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Количество баллов</label>
                                <div class="col-8">
                                    <input id="text" name="points" value="<?php echo $list['points']; ?>"
                                           class="form-control" required="required" type="text">
                                </div>
                            </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-4 col-form-label">Группа*</label>
                                                            <div class="col-8">
                                                                <input id="email" name="groups"
                                                                       value="<?php echo $list['groups']; ?>"
                                                                       class="form-control" required="required"
                                                                       type="text">
                                                            </div>
                                                        </div>
                            <!--                            <div class="form-group row">-->
                            <!--                                <label for="website" class="col-4 col-form-label">Website</label>-->
                            <!--                                <div class="col-8">-->
                            <!--                                    <input id="website" name="website" =lass="form-control here" type="text">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group row">-->
                            <!--                                <label for="publicinfo" class="col-4 col-form-label">Public Info</label>-->
                            <!--                                <div class="col-8">-->
                            <!--                                    <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group row">-->
                            <!--                                <label for="newpass" class="col-4 col-form-label">New Password</label>-->
                            <!--                                <div class="col-8">-->
                            <!--                                    <input id="newpass" name="newpass" =rd" class="form-control here" type="text">-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Update My Profile
                                    </button>
                                </div>
                            <!--                            </div>-->
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .center {
        text-align:center;
    }

    .center form {
        display:inline-block;
    }
</style>
    </body>
</html>