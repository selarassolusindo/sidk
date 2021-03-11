<div class="row">
    <div class="col-md">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4><?php echo lang('deactivate_heading');?></h4>
                <p><?php echo sprintf(lang('deactivate_subheading'), $user->{$identity}); ?></p>
            </div>
            <div class="card-body">
                <!-- <form> -->
                <?php echo form_open("auth/deactivate/".$user->id);?>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                                <input type="radio" name="confirm" value="yes" checked="checked" />
                                <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                                <input type="radio" name="confirm" value="no" />
                            </div>
                        </div>
                    </div>

                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_hidden(['id' => $user->id]); ?>

                    <a href="<?php echo site_url(); ?>auth" class="btn btn-default pull-right">Cancel</a>
                    <?php echo form_submit('submit', lang('deactivate_submit_btn'), array('class'=>"btn btn-primary pull-right"));?>

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
