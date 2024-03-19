<!-- page start-->
<div class="row">
    <?php echo $this->Form->create(); ?>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Create Menu Text
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Menu:</label>
                    <input type="text" class="form-control" value="<?php echo $menu['state_title']; ?>" readonly="readonly">
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('text_en', array('class'=>'form-control', 'label'=>'English Text', 'type'=>'textarea')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('text_kin', array('class'=>'form-control', 'label'=>'Kinyarwanda Text', 'type'=>'textarea')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('text_fr', array('class'=>'form-control', 'label'=>'French Text', 'type'=>'textarea')); ?>
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
