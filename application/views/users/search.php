<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12" id="userPanel">

    <?php echo form_open('search', array('id' => 'search')); ?>

        <div class="row search-panel">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="str" placeholder="Найти...">
                    <span class="input-group-btn">
                        <button class="btn btn-outline-primary" type="submit">Поиск</button>
                    </span>
                </div>
            </div>

            <?php if (!$_SESSION['user']->is_admin): ?>
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon">Администратор</span>
                    <select class="form-control" name="admin" id="exampleSelect1">
                        <option <?php if ($input['admin'] == '') echo 'selected="selected" '?> value="">Любой</option>
                        <?php foreach ($admins AS $admin): ?>
                            <option <?php if ($input['admin'] == $admin['login']) echo 'selected="selected" '?> value="<?php echo $admin['login'] ?>">
                                <?php echo $admin['name'].' '.$admin['surename'].' ('.$admin['info'].')' ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <?php endif ?>

            <?php if ($_SESSION['user']->is_admin): ?>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">Пользователь</span>
                        <select class="form-control" name="admin" id="exampleSelect1">
                            <option <?php if ($input['user'] == '') echo 'selected="selected" '?> value="">Любой</option>
                            <?php foreach ($users AS $usr): ?>
                                <option <?php if ($input['user'] == $use['login']) echo 'selected="selected" '?> value="<?php echo $usr['login'] ?>">
                                    <?php echo $usr['name'].' '.$usr['surename'].' ('.$usr['userInfo'].')'?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif ?>

            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-addon">Сортировать</span>
                    <select class="form-control" name="sort" id="sort">
                        <option <?php if ($input['sort'] == 'edited') echo 'selected="selected" '?> value="edited">
                            Дата обновления</option>
                        <option <?php if ($input['sort'] == 'publicated') echo 'selected="selected" '?>value="publicated">
                            Дата публикации</option>
                        <option <?php if ($input['sort'] == 'short_info') echo 'selected="selected" '?>value="short_info">
                            Описание</option>
                    </select>
<!--                    <span class="input-group-btn">-->
<!--                        <a href="--><?php //echo site_url('search/swap_order')?><!--" role="button" class="btn btn-secondary" type="button">↕</a>-->
<!--                    </span>-->
                </div>
            </div>

        </div>
        <hr>
        <div class="row search-panel">

            <div class="input-group col-md-12 row justify-content-center">

                <?php foreach ($statuses AS $status): ?>
                    <div class="stat">
                        <label class="form-check-label small">
                            <input class="form-check-input"
                                   name="<?php echo $status['id']?>"
                                   value="<?php echo $status['id']?>"
                                   type="checkbox"
                                   <?php if (in_array($status['id'], $input['statuses'])) echo 'checked'?>
                            >
                            <?php echo $status['name']?>
                        </label>
                    </div>
                <?php endforeach;?>

            </div>
        </div>
    </form>

    <table class="table table-hover table-striped small" id="searchList">

        <thead class="thead-default">
        <tr>
            <th>Код</th>
            <th>Описание</th>
            <th>
                <?php echo $_SESSION['user']->is_admin ? 'Пользователь' : 'Администратор' ?>
            </th>
            <th>Опубликовано</th>
            <th>Обновлено</th>
            <th>Статус</th>
            <th>Сообщений</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($issues AS $issue): ?>
                <tr onclick="window.open('/issues/<?php echo $issue['issueID']?>', '_blank');">
                    <td><?php echo $issue['hash'] ?></td>
                    <td><?php echo $issue['short_info'] ?></td>
                    <td><?php
                        foreach ($admins AS $admin) {
                            if ($admin['login'] == $issue['admin_id']) {
                                echo $admin['name'].' '.$admin['surename'];
                                break;
                            }
                        }
                        ?>
                    </td>
                    <td><?php echo date('d.m.Y H:i', strtotime($issue['publicated'])) ?></td>
                    <td><?php echo date('d.m.Y H:i', strtotime($issue['edited'])) ?></td>
                    <td><?php echo $issue['status'] ?></td>
                    <td>12</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</section>