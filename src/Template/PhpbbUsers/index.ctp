<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Phpbb User'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="phpbbUsers index large-9 medium-8 columns content">
    <h3><?= __('Phpbb Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('user_type') ?></th>
                <th><?= $this->Paginator->sort('group_id') ?></th>
                <th><?= $this->Paginator->sort('user_perm_from') ?></th>
                <th><?= $this->Paginator->sort('user_ip') ?></th>
                <th><?= $this->Paginator->sort('user_regdate') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('username_clean') ?></th>
                <th><?= $this->Paginator->sort('user_password') ?></th>
                <th><?= $this->Paginator->sort('user_passchg') ?></th>
                <th><?= $this->Paginator->sort('user_email') ?></th>
                <th><?= $this->Paginator->sort('user_email_hash') ?></th>
                <th><?= $this->Paginator->sort('user_birthday') ?></th>
                <th><?= $this->Paginator->sort('user_lastvisit') ?></th>
                <th><?= $this->Paginator->sort('user_lastmark') ?></th>
                <th><?= $this->Paginator->sort('user_lastpost_time') ?></th>
                <th><?= $this->Paginator->sort('user_lastpage') ?></th>
                <th><?= $this->Paginator->sort('user_last_confirm_key') ?></th>
                <th><?= $this->Paginator->sort('user_last_search') ?></th>
                <th><?= $this->Paginator->sort('user_warnings') ?></th>
                <th><?= $this->Paginator->sort('user_last_warning') ?></th>
                <th><?= $this->Paginator->sort('user_login_attempts') ?></th>
                <th><?= $this->Paginator->sort('user_inactive_reason') ?></th>
                <th><?= $this->Paginator->sort('user_inactive_time') ?></th>
                <th><?= $this->Paginator->sort('user_posts') ?></th>
                <th><?= $this->Paginator->sort('user_lang') ?></th>
                <th><?= $this->Paginator->sort('user_timezone') ?></th>
                <th><?= $this->Paginator->sort('user_dateformat') ?></th>
                <th><?= $this->Paginator->sort('user_style') ?></th>
                <th><?= $this->Paginator->sort('user_rank') ?></th>
                <th><?= $this->Paginator->sort('user_colour') ?></th>
                <th><?= $this->Paginator->sort('user_new_privmsg') ?></th>
                <th><?= $this->Paginator->sort('user_unread_privmsg') ?></th>
                <th><?= $this->Paginator->sort('user_last_privmsg') ?></th>
                <th><?= $this->Paginator->sort('user_message_rules') ?></th>
                <th><?= $this->Paginator->sort('user_full_folder') ?></th>
                <th><?= $this->Paginator->sort('user_emailtime') ?></th>
                <th><?= $this->Paginator->sort('user_topic_show_days') ?></th>
                <th><?= $this->Paginator->sort('user_topic_sortby_type') ?></th>
                <th><?= $this->Paginator->sort('user_topic_sortby_dir') ?></th>
                <th><?= $this->Paginator->sort('user_post_show_days') ?></th>
                <th><?= $this->Paginator->sort('user_post_sortby_type') ?></th>
                <th><?= $this->Paginator->sort('user_post_sortby_dir') ?></th>
                <th><?= $this->Paginator->sort('user_notify') ?></th>
                <th><?= $this->Paginator->sort('user_notify_pm') ?></th>
                <th><?= $this->Paginator->sort('user_notify_type') ?></th>
                <th><?= $this->Paginator->sort('user_allow_pm') ?></th>
                <th><?= $this->Paginator->sort('user_allow_viewonline') ?></th>
                <th><?= $this->Paginator->sort('user_allow_viewemail') ?></th>
                <th><?= $this->Paginator->sort('user_allow_massemail') ?></th>
                <th><?= $this->Paginator->sort('user_options') ?></th>
                <th><?= $this->Paginator->sort('user_avatar') ?></th>
                <th><?= $this->Paginator->sort('user_avatar_type') ?></th>
                <th><?= $this->Paginator->sort('user_avatar_width') ?></th>
                <th><?= $this->Paginator->sort('user_avatar_height') ?></th>
                <th><?= $this->Paginator->sort('user_sig_bbcode_uid') ?></th>
                <th><?= $this->Paginator->sort('user_sig_bbcode_bitfield') ?></th>
                <th><?= $this->Paginator->sort('user_jabber') ?></th>
                <th><?= $this->Paginator->sort('user_actkey') ?></th>
                <th><?= $this->Paginator->sort('user_newpasswd') ?></th>
                <th><?= $this->Paginator->sort('user_form_salt') ?></th>
                <th><?= $this->Paginator->sort('user_new') ?></th>
                <th><?= $this->Paginator->sort('user_reminded') ?></th>
                <th><?= $this->Paginator->sort('user_reminded_time') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phpbbUsers as $phpbbUser): ?>
            <tr>
                <td><?= $this->Number->format($phpbbUser->user_id) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_type) ?></td>
                <td><?= $this->Number->format($phpbbUser->group_id) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_perm_from) ?></td>
                <td><?= h($phpbbUser->user_ip) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_regdate) ?></td>
                <td><?= h($phpbbUser->username) ?></td>
                <td><?= h($phpbbUser->username_clean) ?></td>
                <td><?= h($phpbbUser->user_password) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_passchg) ?></td>
                <td><?= h($phpbbUser->user_email) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_email_hash) ?></td>
                <td><?= h($phpbbUser->user_birthday) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_lastvisit) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_lastmark) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_lastpost_time) ?></td>
                <td><?= h($phpbbUser->user_lastpage) ?></td>
                <td><?= h($phpbbUser->user_last_confirm_key) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_last_search) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_warnings) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_last_warning) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_login_attempts) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_inactive_reason) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_inactive_time) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_posts) ?></td>
                <td><?= h($phpbbUser->user_lang) ?></td>
                <td><?= h($phpbbUser->user_timezone) ?></td>
                <td><?= h($phpbbUser->user_dateformat) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_style) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_rank) ?></td>
                <td><?= h($phpbbUser->user_colour) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_new_privmsg) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_unread_privmsg) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_last_privmsg) ?></td>
                <td><?= h($phpbbUser->user_message_rules) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_full_folder) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_emailtime) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_topic_show_days) ?></td>
                <td><?= h($phpbbUser->user_topic_sortby_type) ?></td>
                <td><?= h($phpbbUser->user_topic_sortby_dir) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_post_show_days) ?></td>
                <td><?= h($phpbbUser->user_post_sortby_type) ?></td>
                <td><?= h($phpbbUser->user_post_sortby_dir) ?></td>
                <td><?= h($phpbbUser->user_notify) ?></td>
                <td><?= h($phpbbUser->user_notify_pm) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_notify_type) ?></td>
                <td><?= h($phpbbUser->user_allow_pm) ?></td>
                <td><?= h($phpbbUser->user_allow_viewonline) ?></td>
                <td><?= h($phpbbUser->user_allow_viewemail) ?></td>
                <td><?= h($phpbbUser->user_allow_massemail) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_options) ?></td>
                <td><?= h($phpbbUser->user_avatar) ?></td>
                <td><?= h($phpbbUser->user_avatar_type) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_avatar_width) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_avatar_height) ?></td>
                <td><?= h($phpbbUser->user_sig_bbcode_uid) ?></td>
                <td><?= h($phpbbUser->user_sig_bbcode_bitfield) ?></td>
                <td><?= h($phpbbUser->user_jabber) ?></td>
                <td><?= h($phpbbUser->user_actkey) ?></td>
                <td><?= h($phpbbUser->user_newpasswd) ?></td>
                <td><?= h($phpbbUser->user_form_salt) ?></td>
                <td><?= h($phpbbUser->user_new) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_reminded) ?></td>
                <td><?= $this->Number->format($phpbbUser->user_reminded_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $phpbbUser->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $phpbbUser->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $phpbbUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $phpbbUser->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
