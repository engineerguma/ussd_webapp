<!-- page start-->
<div class="row">
    <?php echo $this->Form->create(); ?>
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Session Search
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <?php echo $this->Form->input('telephone_number', array('class'=>'form-control', 'label'=>'Telephone Number')); ?>
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