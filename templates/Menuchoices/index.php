<!-- page start-->
<section class="panel">
    <header class="panel-heading">
        Menu Choices
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                    <tr>
                        <th>In State ID</th>
                        <th>In State Name</th>
                        <th>User Choice/Input</th>
                        <th>To State ID</th>
                        <th>To State Name</th>
                        <th>Actions</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menuchoices as $key => $value): ?>
                        <tr class="gradeX">
                    <input type='hidden' id='list' value="<?php print_r($value); ?>">
                    <td><?php echo $value['ussd_state']; ?></td>
                    <td><?php echo $value['InState']["state_title"]; ?></td>
                    <td><?php echo $value["ussd_choice"]; ?></td>
                    <td><?php echo $value['ussd_new_state']; ?></td>
                    <td><?php echo $value['ToState']['state_title']; ?></td>
                    <td>
                        <?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>', 
    array('controller' => 'menuchoices', 'action' => 'editmenulink', $value['record_id']), 
    array('escape' => false)); ?>
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



