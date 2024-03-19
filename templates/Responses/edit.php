<!-- page start-->
<div class="row">
    <?php echo $this->Form->create($response); ?>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Edit Response Text
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo $this->Form->input('code', array('class'=>'form-control', 'readonly'=>'readonly')); ?>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control input-sm m-bot15 billgroup" name="status">
                        <option value="">---Status---</option>
                        <option value="successful"  <?php if($response['status'] == 'successful') echo 'Selected'; ?>>Successful</option>
                        <option value="failed"  <?php if($response['status'] == 'failed') echo 'Selected'; ?>>Failed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="state_indicator">State Indicator:</label>
                    <select class="form-control input-sm m-bot15 billgroup" name="state_indicator">
                        <option value="">---State Indicator---</option>
                        <option value="FC" <?php if($response['state_indicator'] == 'FC') echo 'Selected'; ?>>FC</option>
                        <option value="FB" <?php if($response['state_indicator'] == 'FB') echo 'Selected'; ?>>FB</option>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('text_en', array('class'=>'form-control', 'type'=>'textarea', 'label'=>'English Text:')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('text_kin', array('class'=>'form-control', 'type'=>'textarea', 'label'=>'Kinyarwanda Text:')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('text_fr', array('class'=>'form-control', 'type'=>'textarea', 'label'=>'French Text:')); ?>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <?php echo $this->Form->button(__('Submit'), array('class' => 'btn btn-info')); ?>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>
<!-- page end-->
