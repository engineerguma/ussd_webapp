<!-- page start-->
<div class="row">
    <?php echo $this->Form->create($menu); ?>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Edit Menu Option
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo $this->Form->input('state_title', array('class'=>'form-control', 'readonly'=>'readonly')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('input_field_name', array('class'=>'form-control')); ?>
                </div>
                <div class="form-group">
                    <label for="state_type">State Type:</label>
                    <select class="form-control input-sm m-bot15 billgroup" name="state_type">
                        <option value="">---State Type---</option>
                        <option value="menuchoice" <?php if($menu['state_type'] == 'menuchoice') echo 'Selected'; ?>>Menu Choice</option>
                        <option value="input" <?php if($menu['state_type'] == 'input') echo 'Selected'; ?>>User Value Input</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="state_indicator">State Indicator:</label>
                    <select class="form-control input-sm m-bot15 billgroup" name="state_indicator">
                        <option value="">---State Indicator---</option>
                        <option value="FC" <?php if($menu['state_indicator'] == 'FC') echo 'Selected'; ?>>FC</option>
                        <option value="FB" <?php if($menu['state_indicator'] == 'FB') echo 'Selected'; ?>>FB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fxn_call_flag">Execute External Function:</label>
                    <select class="form-control input-sm m-bot15 billgroup" name="fxn_call_flag">
                        <option value="">---Execute External Function---</option>
                        <option value="0" <?php if($menu['fxn_call_flag'] == 0) echo 'Selected'; ?>>No</option>
                        <option value="1" <?php if($menu['fxn_call_flag'] == 1) echo 'Selected'; ?>>Yes</option>
                    </select>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('call_fxn_name', array('class'=>'form-control')); ?>
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