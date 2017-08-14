<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12" id="userPanel">

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="<?php echo site_url('userpanel') ?>" class="nav-link<?php if ($status == NULL) echo ' active' ?>">
                Все
            </a>
        </li>

        <?php foreach ($statuses AS $s): ?>
            <li class="nav-item">
                <a href="<?php echo site_url('userpanel?status='.$s['id']) ?>" class="nav-link<?php if ($status == $s['id']) echo ' active' ?>" title="<?php echo $s['info']?>">
                    <?php echo $s['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>

    </ul>
    <div class="col-md-12" id="issueList">
        <div class="list-group">

            <?php foreach ($issues AS $issue): ?>

                <a href="issues/<?php echo $issue['issueID']?>" class="
                <?php
                if ($issue['statusID'] != null)
                if ($issue['statusID'] == 2) echo "list-group-item-info";
                else if ($issue['statusID'] == 3) echo "list-group-item-success";
                else if ($issue['statusID'] == 4) echo "list-group-item-warning";
                else if ($issue['statusID'] == 5) echo "list-group-item-danger";
                ?>
                list-group-item list-group-item-action flex-column align-items-start">

                    <div class="d-flex w-100 justify-content-between">
                        <div style="word-wrap: break-word; width: 50%;"><?php echo $issue['hash'].': '.$issue['short_info'] ?></div>
                        <small class="date text-right">
                            Опубликовано: <?php echo date('d.m.Y H:i',strtotime($issue['publicated'])) ?><br/>
                            Обновление: <?php echo date('d.m.Y H:i',strtotime($issue['edited'])) ?>
                        </small>
                    </div>
                    <small>
                        <?php if (!$_SESSION['user']->is_admin): ?>
                        Администратор: <?php
                            foreach ($admins AS $admin) {
                                if ($admin['login'] == $issue['admin_id']) {
                                    echo $admin['name'].' '.$admin['surename'];
                                    break;
                                }
                            }
                        ?> <?php else: ?>
                            Пользователь: <?php
                            foreach ($issues AS $is) {
                                if ($is['login'] == $issue['user_id']) {
                                    echo $is['userName'].' '.$is['userSurename']    ;
                                }
                            }
                            ?>
                        <?php endif ?>
                        <br/>
                        <span title="<?php echo $issue['status_info'] ?>">
                            Статус: <?php echo $issue['status'] ?>
                        </span>
                    </small>

                </a>

            <?php endforeach; ?>

            <div style="margin: 24px">
                <?php echo $paginator->create_links() ?>
            </div>

        </div>
    </div>

</div>
</section>