<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- https://github.com/codedokode/pasta/blob/master/student-list.md -->
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Students list</title>
</head>
<body>
<div class="container">
    <form action="#" method="post">
        <div class="form-group">
            <?php if (isset($errors) && is_array($errors) && array_key_exists('firstname', $errors)): ?>
            <ul>

                <li> - <?php echo $errors['firstname']; ?></li>
                <?php endif; ?>
            </ul>

            <label for="exampleFormControlInput1">Имя</label>
            <input class="form-control" id="exampleFormControlInput1" name="firstname" aria-describedby="emailHelp"
                   placeholder="Вася">
            <small id="emailHelp" class="form-text text-muted">Ваше имя.</small>
        </div>

        <div class="form-group">
            <?php if (isset($errors) && is_array($errors) && array_key_exists('surname', $errors)): ?>
                <ul>

                    <li> - <?php echo $errors['surname']; ?></li>
                </ul>
            <?php endif; ?>
            <label for="exampleFormControlInput1">Фамилия</label>
            <input class="form-control" id="exampleFormControlInput1" name="surname" aria-describedby="emailHelp"
                   placeholder="Иванов">
            <small id="emailHelp" class="form-text text-muted">Ваше фамилия.</small>
        </div>
        <label for="exampleFormControlInput1">Пол</label>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="М">
                <label class="form-check-label" for="inlineRadio3">М</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Ж">
                <label class="form-check-label" for="inlineRadio4">Ж</label>
            </div>
        </div>
        <label for="exampleFormControlInput1">Вы иногородний?</label>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fromis" id="inlineRadio1" value="Д">
                <label class="form-check-label" for="inlineRadio1">Да</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fromis" id="inlineRadio2" value="Н">
                <label class="form-check-label" for="inlineRadio2">Нет</label>
            </div>
        </div>
        <div class="form-group">
            <?php if (isset($errors) && is_array($errors) && array_key_exists('email', $errors)): ?>
                <ul>

                    <li> - <?php echo $errors['email']; ?></li>
                </ul>
            <?php endif; ?>
            <label for="exampleFormControlInput1">Email</label>
            <input class="form-control" type="email" id="exampleFormControlInput1" name="email"
                   aria-describedby="emailHelp" placeholder="0020">
            <small id="emailHelp" class="form-text text-muted">Ваш email</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Группа</label>
            <input class="form-control" id="exampleFormControlInput1" name="groups" aria-describedby="emailHelp"
                   placeholder="0020">
            <small id="emailHelp" class="form-text text-muted">Ваша группа</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Баллы</label>
            <input class="form-control" id="exampleFormControlInput1" name="points" aria-describedby="emailHelp"
                   placeholder="300">
            <small id="emailHelp" class="form-text text-muted">Количество ваших баллов</small>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" value='true'>Принять</button>
    </form>

</div>
<style media="screen">
    .form-inline {
        margin: 0;
    }
</style>


</body>
</html>
