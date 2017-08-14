<section class="main row">

    <div class="col-lg-3 col-md-4 col-sm-12 info" id="sideInfo">
        <h3><?php echo $user['name'].' '.$user['surename'] ?></h3>
        <?php if ($user['is_admin']) echo "<small class='text-muted'>Администратор</small>"?>
        <hr/>
        <em><?php echo $user['organization'] ?></em> <br/>
        <em><small class="text-muted"><?php echo $user['address']?></small></em>
        <hr/>

        <a href="<?php echo site_url('userpanel')?>" class="btn btn-<?php if (!preg_match('/userpanel[\/]?\d*/', uri_string())) echo 'outline-'?>primary btn-block">Главная панель</a>
        <a href="<?php echo site_url('search')?>" class="btn btn-<?php if (uri_string() != 'search') echo 'outline-'?>primary btn-block">Поиск</a>

        <?php if (!$user['is_admin']): ?>

         <a href="<?php echo site_url('newissue')?>" class="btn btn-<?php if (uri_string() != 'newissue') echo 'outline-'?>success btn-block">Новая заявка</a>
        <hr/>
        <h5>Администраторы:</h5>
        <hr/>
        <?php foreach ($admins AS $admin): ?>
        <p>
            <?php echo $admin['name']." ".$admin['surename']?> <br/>
            <small> <?php echo $admin['phone'] ?></small> <br/>
            <small> <?php echo $admin['email'] ?> </small>
        </p>
        <?php endforeach; ?>

        <?php endif;?>
        <hr/>
    </div>