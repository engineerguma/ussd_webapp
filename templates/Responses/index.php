<!-- page start-->
<section class="panel">
    <header class="panel-heading">
        Response Messages
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                    <tr>
                        <th>Code</th>
                        <th>State Indicator</th>
                        <th>Status</th>
                        <th>Text EN</th>
                        <th>Text KIN</th>
                        <th>Text FR</th>
                        <th>Actions</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($responses as $key => $value): ?>
                        <tr class="gradeX">
                    <input type='hidden' id='list' value="<?php print_r($value); ?>">
                    <td><?php echo $value["code"]; ?></td>
                    <td><?php echo $value["state_indicator"]; ?></td>
                    <td><?php echo $value["status"]; ?></td>
                    <td><?php echo $value['text_en']; ?></td>
                    <td><?php echo $value['text_kin']; ?></td>
                    <td><?php echo $value['text_fr']; ?></td>
                    <td>
                        <?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>', 
    array('controller' => 'responses', 'action' => 'edit', $value['record_id']), 
    array('escape' => false)); ?>
                        <?php 
                            if($value['session_execution_log_file'] !=''){
                                echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="fa fa-file"></i></button>', 
    array('controller' => 'sessions', 'action' => 'logfile', $value['record_id']), 
    array('escape' => false));
                            }
                        ?>
                    </td>
                    </tr>
                <?php endforeach; ?> 
                </tbody>
            </table>
            <div>
                <ul class="pagination pagination-sm pull-right">
                    <?php //echo $this->Paginator->numbers(); ?>
                </ul>
            </div>
            <div class="span6">
                <div id="hidden-table-info_info" class="dataTables_info">Showing page <?php //echo $this->Paginator->counter(); ?></div>
            </div>
        </div>
    </div>
</section>
<!-- page end-->



