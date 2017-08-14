<body>

    <div id="login_panel" class="col-lg-4 col-md-6 col-sm-8 container">

        <h2>Войдите под своей учетной записью</h2>
        <hr>

        <?php
            echo form_open('login');
        ?>

        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" name="login" class="form-control" placeholder="Логин" aria-describedby="sizing-addon2">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" class="form-control" placeholder="Пароль" aria-describedby="sizing-addon2">
        </div>
        <button id="btn-login" type="submit" class="btn btn-outline-primary btn-lg">Вход</button>
        <?php if ($error == 'input'): ?>
            <div class="alert alert-warning" role="alert">
                <strong>Ошибка ввода.</strong> Логин и пароль должны быть от 8 до 20 символов длиной.
            </div>
        <?php endif; ?>
        <?php if ($error == 'login'): ?>
            <div class="alert alert-danger" role="alert">
                <strong>Неправильный логин и/или пароль.</strong> Такой комбинации логин-пароль не существует.
            </div>
        <?php endif; ?>


        </form>
    </div>
