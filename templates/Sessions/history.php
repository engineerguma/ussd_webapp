<section class="panel">
    <header class="panel-heading">
        MSISDN Session History
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                    <tr>
                        <th>Session Time</th>
                        <th>MSISDN</th>
                        <th>Session ID</th>
                        <th>Status</th>
                        <th>Time Closed</th>
                        <th>Actions</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessions as $key => $value): ?>
                        <tr class="gradeX">
                    <input type='hidden' id='list' value="<?php print_r($value); ?>">
                    <td><?php echo $value["session_date"]; ?></td>
                    <td><?php echo $value["telephone_number"]; ?></td>
                    <td><?php echo $value['session_id']; ?></td>
                    <td><?php echo $value['session_status']; ?></td>
                    <td><?php echo $value['session_close_date']; ?></td>
                    <td>
                        <?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>', 
    array('controller' => 'sessions', 'action' => 'view', $value['record_id']), 
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
                    <?php echo $this->Paginator->numbers(); ?>
                </ul>
            </div>
            <div class="span6">
                <div id="hidden-table-info_info" class="dataTables_info">Showing page <?php echo $this->Paginator->counter(); ?></div>
            </div>
        </div>
    </div>
</section>