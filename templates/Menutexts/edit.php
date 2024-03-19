<!-- page start-->
<div class="row">
    <?php echo $this->Form->create($menutext); ?>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Edit Menu Text
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $menutext['menu']['state_title']; ?>" readonly="readonly">
                </div>
                <div class="form-group">
                    <?php echo $this->Form->textarea('text_en', array('class'=>'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->textarea('text_kin', array('class'=>'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->textarea('text_fr', array('class'=>'form-control')); ?>
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
