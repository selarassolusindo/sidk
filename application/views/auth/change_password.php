<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4><?php echo lang('change_password_heading');?></h4>
                <p><?php echo $message;?></p>
            </div>
            <div class="card-body">
                <!-- <form> -->
                <?php echo form_open("auth/change_password");?>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('change_password_old_password_label', 'old_password', array('class'=>'bmd-label-floating'));?>
                                <?php echo form_input($old_password,'',array('class'=>'form-control'));?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="new_password" class="bmd-label-floating"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                                <?php echo form_input($new_password,'',array('class'=>'form-control'));?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm', array('class'=>'bmd-label-floating'));?> <br />
                                <?php echo form_input($new_password_confirm,'',array('class'=>'form-control'));?>
                            </div>
                        </div>
                    </div>

                    <?php echo form_input($user_id);?>

                    <a href="<?php echo site_url(); ?>auth" class="btn btn-default pull-right">Cancel</a>
                    <?php echo form_submit('submit', lang('change_password_submit_btn'), array('class'=>"btn btn-primary pull-right"));?>

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
