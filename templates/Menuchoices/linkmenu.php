<!-- page start-->
<div class="row">
    <?php echo $this->Form->create(); ?>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Create Menu Link
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo $this->Form->input('ussd_name', array('class'=>'form-control', 'label'=>'Menu Name')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('ussd_choice', array('class'=>'form-control', 'label'=>'User Input/Choice')); ?>
                </div>
                
                <div class="form-group">
                    <label for="ussd_new_state">Go To Option:</label>
                    <select class="form-control input-sm m-bot15 billgroup" name="ussd_new_state">
                        <option value="">---Go To Option---</option>
                        <?php foreach($menus as $key=>$value): ?>
                        <option value="<?php echo $value['state_id']; ?>"><?php echo $value['state_title']; ?></option>
                        <?php endforeach; ?>
                    </select>
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