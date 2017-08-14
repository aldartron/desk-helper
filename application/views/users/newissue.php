<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12" id="userPanel">

    <?php echo form_open_multipart('issues/create_issue', array('id' => 'newIssue')); ?>

        <div class="header">
            <h3>Новая заявка</h3>
            <hr>
        </div>
        <div class="form-group">
            <label for="description">Краткое описание</label>
            <input type="text" class="form-control" name="description" maxlength="120" id="description"/>
            <small class="form-text text-muted">Кратко опишите суть проблемы (обязательно для заполнения)</small>
        </div>
        <div class="form-group">
            <label for="info">Подробная информация</label>
            <textarea class="form-control" rows="5" name="info" id="info"></textarea>
            <small class="form-text text-muted">Если нужно, расскажите о проблеме подробнее</small>
        </div>
        <div class="form-group">
            <label for="adminSelect">Выберите администратора</label>
            <select class="form-control" id="adminSelect" name="adminSelect">

                <?php foreach ($admins AS $admin): ?>
                    <option value="<?php echo $admin['login'] ?>">
                        <?php echo $admin['name'].' '.$admin['surename'].' ('.$admin['info'].')' ?>
                    </option>
                <?php endforeach; ?>

            </select>
            <small id="fileHelp" class="form-text text-muted">Выбранный администратор будет работать над заявкой</small>
        </div>
        <div class="form-group">
            <label for="screenshot">Изображение</label>
            <input type="file" class="form-control-file" name="screenshot" id="screenshot" aria-describedby="fileHelp" value="upload">
            <small id="fileHelp" class="form-text text-muted">Снимок экрана (необязательно)</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <a href="<?php site_url('userpanel') ?>" role="button" class="btn btn-outline-warning">Отмена</a>
        </div>
    </form>

</div>
</section>
</body>