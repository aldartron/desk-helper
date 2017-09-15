<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12" id="userPanel">
    <div id="issue" class="col-md-12">
        <div style="margin: 42px 33px">
            <div class="d-flex w-100 justify-content-between">
                <h4><?php echo $issue['short_info'] ?></h4>
                <h4 class="text-muted date"><?php echo $issue['hash'] ?></h4>
            </div>
            <hr>
            <small>Заявка подана: <?php echo date('d.m.Y H:i',strtotime($issue['publicated']))  ?></small> <br/>
            <small>Последнее обновление: <?php echo date('d.m.Y H:i',strtotime($issue['edited'])) ?></small> <br/>
            <small>Текущий статус: <span class="<?php

                if ($issue['statusID'] == 2) echo 'text-info';
                else if ($issue['statusID'] == 3) echo 'text-success';
                else if ($issue['statusID'] == 4) echo 'text-warning';
                else if ($issue['statusID'] == 5) echo 'text-danger'

                    ?>"> <?php echo $issue['status'] ?> </span></small> <br/>

            <?php if (!$user['is_admin']): ?>
                <small>Администратор:
                    <?php  foreach ($admins AS $admin) {
                        if ($admin['login'] == $issue['admin_id']) {
                            echo $admin['name'].' '.$admin['surename'];
                            break;
                        }
                    }?>
                </small>
            <?php else: ?>
                <small>Пользователь:
                    <?php echo $issue['userName'].' '.$issue['userSurename'] ?>
                </small>
            <?php endif ?>

            <hr>
            <div class="form-group" id="statusChanger">

                <?php foreach ($buttons AS $button): ?>
                <a href="<?php echo $button['href'] ?>" class="btn <?php echo $button['style'] ?>" title="<?php echo $button['info']?>">
                    <?php echo $button['title']?>
                </a>
                <?php endforeach;?>

            </div>

            <?php if (!empty($buttons)) echo '<hr>' ?>

            <p><?php echo $issue['issueInfo'] ?></p>
            <?php if (!empty($issue['issueInfo'])) echo '<hr>' ?>
            <?php if ($issue['image'] != NULL) {
                echo "<button class='btn btn-secondary' onclick='swap()'>Показать/скрыть изображение</button>";
                echo "<img style='display: none' id='screenshot' class='screenshot' src='" . base_url("/uploads/" . $issue['image']) . "'> <hr>";
            }?>

            <ul class="list-group" id="chatList">

                <?php foreach ($messages AS $message): ?>

                    <li class="list-group-item <?php echo $message['style']?>">
                        <div class="d-flex w-100 justify-content-between">
                            <p class="mb-1">
                                <strong>
                                    <?php if (!$message['is_system'])
                                        // Несистемное сообщение (нужен автор)
                                        if ($message['is_admin']) {
                                            // Автор - администратор
                                            if ($_SESSION['user']->is_admin)
                                                // И залогинен администратор
                                                echo 'Вы: ';
                                            else
                                                echo $message['admin'].": ";
                                        } else {
                                            // Автор - пользователь
                                            if ($_SESSION['user']->is_admin)
                                                echo $message['name'].": ";
                                            else
                                                echo 'Вы: ';
                                        }
                                    ?>
                                </strong>

                                    <?php
                                    if ($message['is_system']) echo "<em>";
                                    echo $message['text'];
                                    if ($message['is_system']) echo "</em>";
                                    ?>
                            </p>
                            <small><?php echo date('d.m.Y H:i',strtotime($message['publicated'])) ?></small>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>

            <?php echo form_open('issues/create_message/'.$issue['issueID'], array('id' => 'newMessage')); ?>
                <label for="newMessage">Новое сообщение</label>
                <textarea class="form-control" rows="7" name="newMessage" id="newMessage"></textarea>
                <br/>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>
</section>
</body>
<script>
    function swap() {
        spoiler = document.getElementById('screenshot');
        if (spoiler.style.display === 'none') {
            spoiler.style.display = ''
        } else {
            spoiler.style.display = 'none'
        }
    }
</script>
</html>