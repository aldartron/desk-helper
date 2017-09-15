<body>
<header>
    <nav class="navbar navbar-toggleable-md fixed-top navbar-light" id="">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="#">DeskHelper</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('userpanel') ?>">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('search') ?>">Найти заявку</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('newissue') ?>">Новая заявка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('contacts') ?>">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('help') ?>">Помощь</a>
                </li>
            </ul>

            <a href="<?php echo base_url('login/logout')?>" class="btn btn-warning my-2 my-lg-0" role="button">Выход</a>
        </div>
    </nav>
</header>