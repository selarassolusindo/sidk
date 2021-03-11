<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4><?php echo lang('edit_user_heading');?></h4>
                <p><?php echo lang('edit_user_subheading');?></p>
                <p><?php echo $message;?></p>
            </div>
            <div class="card-body">
                <!-- <form> -->
                <?php echo form_open(uri_string());?>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('edit_user_fname_label', 'first_name', array('class'=>'bmd-label-floating'));?>
                                <?php echo form_input($first_name,'',array('class'=>'form-control'));?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('edit_user_lname_label', 'last_name', array('class'=>'bmd-label-floating'));?>
                                <?php echo form_input($last_name,'',array('class'=>'form-control'));?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('edit_user_password_label', 'password', array('class'=>'bmd-label-floating'));?>
                                <?php echo form_input($password,'',array('class'=>'form-control'));?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('edit_user_password_confirm_label', 'password_confirm', array('class'=>'bmd-label-floating'));?>
                                <?php echo form_input($password_confirm,'',array('class'=>'form-control'));?>
                            </div>
                        </div>
                    </div>

                    <?php if ($this->ion_auth->is_admin()): ?>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('edit_user_groups_heading','',array('class'=>'bmd-label-floating'));?>
                                <?php foreach ($groups as $group):?>
                                <!-- <label class="checkbox"> -->
                                <!-- <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>> -->
                                <?php //echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                <!-- </label> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                        <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                    </label>
                                </div>
                                <?php endforeach?>
                            </div>
                        </div>
                    </div>

                    <?php endif ?>

                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>

                    <a href="<?php echo site_url(); ?>auth" class="btn btn-default pull-right">Cancel</a>
                    <?php echo form_submit('submit', lang('edit_user_submit_btn'), array('class'=>"btn btn-primary pull-right"));?>

                    <!-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> -->
                    <div class="clearfix"></div>
                <!-- </form> -->
                <?php echo form_close();?>
            </div>
        </div>
    </div>

    <!-- card profile -->
    <!-- <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <a href="javascript:;">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                </a>
            </div>
            <div class="card-body">
                <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                <h4 class="card-title">Alec Thompson</h4>
                <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                </p>
                <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
            </div>
        </div>
    </div> -->
</div>
