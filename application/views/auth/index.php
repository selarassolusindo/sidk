<!-- <h1><?php echo lang('index_heading');?></h1>
<p><?php echo lang('index_subheading');?></p> -->

<!-- <div id="infoMessage"><?php echo $message;?></div> -->

<!-- <table cellpadding=0 cellspacing=10>
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
		</tr>
	<?php endforeach;?>
</table> -->

<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title "><?php echo lang('index_heading');?></h4>
            <p class="card-category"><?php echo lang('index_subheading');?></p>
            <p class="card-category"><?php echo $message;?></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th><?php echo lang('index_fname_th');?></th>
                		<th><?php echo lang('index_lname_th');?></th>
                		<th><?php echo lang('index_email_th');?></th>
                		<th><?php echo lang('index_groups_th');?></th>
                		<th><?php echo lang('index_status_th');?></th>
                		<th><?php echo lang('index_action_th');?></th>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user):?>
                		<tr>
                            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                			<td>
                				<?php foreach ($user->groups as $group):?>
                					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                <?php endforeach?>
                			</td>
                			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                			<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
                		</tr>
                    	<?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
