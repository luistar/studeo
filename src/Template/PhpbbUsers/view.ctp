<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phpbb User'), ['action' => 'edit', $phpbbUser->user_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phpbb User'), ['action' => 'delete', $phpbbUser->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $phpbbUser->user_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Phpbb Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phpbb User'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phpbbUsers view large-9 medium-8 columns content">
    <h3><?= h($phpbbUser->user_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User Ip') ?></th>
            <td><?= h($phpbbUser->user_ip) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($phpbbUser->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Username Clean') ?></th>
            <td><?= h($phpbbUser->username_clean) ?></td>
        </tr>
        <tr>
            <th><?= __('User Password') ?></th>
            <td><?= h($phpbbUser->user_password) ?></td>
        </tr>
        <tr>
            <th><?= __('User Email') ?></th>
            <td><?= h($phpbbUser->user_email) ?></td>
        </tr>
        <tr>
            <th><?= __('User Birthday') ?></th>
            <td><?= h($phpbbUser->user_birthday) ?></td>
        </tr>
        <tr>
            <th><?= __('User Lastpage') ?></th>
            <td><?= h($phpbbUser->user_lastpage) ?></td>
        </tr>
        <tr>
            <th><?= __('User Last Confirm Key') ?></th>
            <td><?= h($phpbbUser->user_last_confirm_key) ?></td>
        </tr>
        <tr>
            <th><?= __('User Lang') ?></th>
            <td><?= h($phpbbUser->user_lang) ?></td>
        </tr>
        <tr>
            <th><?= __('User Timezone') ?></th>
            <td><?= h($phpbbUser->user_timezone) ?></td>
        </tr>
        <tr>
            <th><?= __('User Dateformat') ?></th>
            <td><?= h($phpbbUser->user_dateformat) ?></td>
        </tr>
        <tr>
            <th><?= __('User Colour') ?></th>
            <td><?= h($phpbbUser->user_colour) ?></td>
        </tr>
        <tr>
            <th><?= __('User Topic Sortby Type') ?></th>
            <td><?= h($phpbbUser->user_topic_sortby_type) ?></td>
        </tr>
        <tr>
            <th><?= __('User Topic Sortby Dir') ?></th>
            <td><?= h($phpbbUser->user_topic_sortby_dir) ?></td>
        </tr>
        <tr>
            <th><?= __('User Post Sortby Type') ?></th>
            <td><?= h($phpbbUser->user_post_sortby_type) ?></td>
        </tr>
        <tr>
            <th><?= __('User Post Sortby Dir') ?></th>
            <td><?= h($phpbbUser->user_post_sortby_dir) ?></td>
        </tr>
        <tr>
            <th><?= __('User Avatar') ?></th>
            <td><?= h($phpbbUser->user_avatar) ?></td>
        </tr>
        <tr>
            <th><?= __('User Avatar Type') ?></th>
            <td><?= h($phpbbUser->user_avatar_type) ?></td>
        </tr>
        <tr>
            <th><?= __('User Sig Bbcode Uid') ?></th>
            <td><?= h($phpbbUser->user_sig_bbcode_uid) ?></td>
        </tr>
        <tr>
            <th><?= __('User Sig Bbcode Bitfield') ?></th>
            <td><?= h($phpbbUser->user_sig_bbcode_bitfield) ?></td>
        </tr>
        <tr>
            <th><?= __('User Jabber') ?></th>
            <td><?= h($phpbbUser->user_jabber) ?></td>
        </tr>
        <tr>
            <th><?= __('User Actkey') ?></th>
            <td><?= h($phpbbUser->user_actkey) ?></td>
        </tr>
        <tr>
            <th><?= __('User Newpasswd') ?></th>
            <td><?= h($phpbbUser->user_newpasswd) ?></td>
        </tr>
        <tr>
            <th><?= __('User Form Salt') ?></th>
            <td><?= h($phpbbUser->user_form_salt) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Type') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Group Id') ?></th>
            <td><?= $this->Number->format($phpbbUser->group_id) ?></td>
        </tr>
        <tr>
            <th><?= __('User Perm From') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_perm_from) ?></td>
        </tr>
        <tr>
            <th><?= __('User Regdate') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_regdate) ?></td>
        </tr>
        <tr>
            <th><?= __('User Passchg') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_passchg) ?></td>
        </tr>
        <tr>
            <th><?= __('User Email Hash') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_email_hash) ?></td>
        </tr>
        <tr>
            <th><?= __('User Lastvisit') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_lastvisit) ?></td>
        </tr>
        <tr>
            <th><?= __('User Lastmark') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_lastmark) ?></td>
        </tr>
        <tr>
            <th><?= __('User Lastpost Time') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_lastpost_time) ?></td>
        </tr>
        <tr>
            <th><?= __('User Last Search') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_last_search) ?></td>
        </tr>
        <tr>
            <th><?= __('User Warnings') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_warnings) ?></td>
        </tr>
        <tr>
            <th><?= __('User Last Warning') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_last_warning) ?></td>
        </tr>
        <tr>
            <th><?= __('User Login Attempts') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_login_attempts) ?></td>
        </tr>
        <tr>
            <th><?= __('User Inactive Reason') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_inactive_reason) ?></td>
        </tr>
        <tr>
            <th><?= __('User Inactive Time') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_inactive_time) ?></td>
        </tr>
        <tr>
            <th><?= __('User Posts') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_posts) ?></td>
        </tr>
        <tr>
            <th><?= __('User Style') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_style) ?></td>
        </tr>
        <tr>
            <th><?= __('User Rank') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_rank) ?></td>
        </tr>
        <tr>
            <th><?= __('User New Privmsg') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_new_privmsg) ?></td>
        </tr>
        <tr>
            <th><?= __('User Unread Privmsg') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_unread_privmsg) ?></td>
        </tr>
        <tr>
            <th><?= __('User Last Privmsg') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_last_privmsg) ?></td>
        </tr>
        <tr>
            <th><?= __('User Full Folder') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_full_folder) ?></td>
        </tr>
        <tr>
            <th><?= __('User Emailtime') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_emailtime) ?></td>
        </tr>
        <tr>
            <th><?= __('User Topic Show Days') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_topic_show_days) ?></td>
        </tr>
        <tr>
            <th><?= __('User Post Show Days') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_post_show_days) ?></td>
        </tr>
        <tr>
            <th><?= __('User Notify Type') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_notify_type) ?></td>
        </tr>
        <tr>
            <th><?= __('User Options') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_options) ?></td>
        </tr>
        <tr>
            <th><?= __('User Avatar Width') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_avatar_width) ?></td>
        </tr>
        <tr>
            <th><?= __('User Avatar Height') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_avatar_height) ?></td>
        </tr>
        <tr>
            <th><?= __('User Reminded') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_reminded) ?></td>
        </tr>
        <tr>
            <th><?= __('User Reminded Time') ?></th>
            <td><?= $this->Number->format($phpbbUser->user_reminded_time) ?></td>
        </tr>
        <tr>
            <th><?= __('User Message Rules') ?></th>
            <td><?= $phpbbUser->user_message_rules ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('User Notify') ?></th>
            <td><?= $phpbbUser->user_notify ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('User Notify Pm') ?></th>
            <td><?= $phpbbUser->user_notify_pm ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('User Allow Pm') ?></th>
            <td><?= $phpbbUser->user_allow_pm ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('User Allow Viewonline') ?></th>
            <td><?= $phpbbUser->user_allow_viewonline ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('User Allow Viewemail') ?></th>
            <td><?= $phpbbUser->user_allow_viewemail ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('User Allow Massemail') ?></th>
            <td><?= $phpbbUser->user_allow_massemail ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('User New') ?></th>
            <td><?= $phpbbUser->user_new ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('User Permissions') ?></h4>
        <?= $this->Text->autoParagraph(h($phpbbUser->user_permissions)); ?>
    </div>
    <div class="row">
        <h4><?= __('User Sig') ?></h4>
        <?= $this->Text->autoParagraph(h($phpbbUser->user_sig)); ?>
    </div>
</div>
