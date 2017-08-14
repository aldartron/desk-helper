<?php

class Buttons {

    public function get_buttons($issue)
    {
        $status = $issue['statusID'];
        $issueID = $issue['issueID'];
        $isAdmin = $_SESSION['user']->is_admin;
        $buttons = array();

        if ($status == 1) {

            if (!$isAdmin) {
                $buttons[0] = array(
                    'title' => 'Отменить заявку',
                    'info' => 'Отменить заявку и прекратить всякую деятельность по ней (возобновление заявки невозможно)',
                    'href' => site_url('statuses/change/' . $issueID . '/5'),
                    'style' => 'btn-outline-danger'
                );
            } else {
                $buttons[0] = array(
                    'title' => 'Прниять к выполнению',
                    'info' => 'Суть проблемы ясна, приступить к её решению',
                    'href' => site_url('statuses/change/' . $issueID . '/2'),
                    'style' => 'btn-outline-primary'
                );
            }

        } else if ($status == 2) {

            if (!$isAdmin) {
                $buttons[0] = array(
                    'title' => 'Отменить выполнение',
                    'info' => 'Приостановить выполнение работ по заявке',
                    'href' => site_url('statuses/change/' . $issueID . '/1'),
                    'style' => 'btn-outline-warning'
                );
            } else {
                $buttons[0] = array(
                    'title' => 'Выполнено',
                    'info' => 'Работа по заявке завершена, ждать подтверждения пользователя',
                    'href' => site_url('statuses/change/' . $issueID . '/4'),
                    'style' => 'btn-outline-success'
                );
                $buttons[1] = array(
                    'title' => 'Отменить выполнение',
                    'info' => 'Приостановить выполнение работ по заявке',
                    'href' => site_url('statuses/change/' . $issueID . '/1'),
                    'style' => 'btn-outline-warning'
                );
            }

        } else if ($status == 4) {

            if (!$isAdmin) {
                $buttons[0] = array(
                    'title' => 'Подтвердить выполнение',
                    'info' => 'Проблема, описанная в заявке, решена, дополнительные работы не нужны',
                    'href' => site_url('statuses/change/' . $issueID . '/3'),
                    'style' => 'btn-outline-success'
                );
                $buttons[1] = array(
                    'title' => 'Отклонить подтверждение',
                    'info' => 'Проблема, описанная в заявке, не решена, либо решена неполностью',
                    'href' => site_url('statuses/change/' . $issueID . '/2'),
                    'style' => 'btn-outline-warning'
                );
            } else {
                $buttons[0] = array(
                    'title' => 'Отменить подтверждение',
                    'info' => 'Необходимо возобновить работы по заявке',
                    'href' => site_url('statuses/change/' . $issueID . '/2'),
                    'style' => 'btn-outline-warning'
                );
            }

        }

        return $buttons;
    }
}