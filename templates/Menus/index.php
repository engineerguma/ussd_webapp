<!-- page start-->
<section class="panel">
    <header class="panel-heading">
        Menu List
    </header>
    <div class="panel-body">
        <div class="adv-table">
            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                <thead>
                    <tr>
                    <tr>
                        <th>#</th>
                        <th>State Title</th>
                        <th>Type</th>
                        <th>Input Field</th>
                        <th>Flow</th>
                        <th>RFC</th>
                        <th>RF</th>
                        <th>Actions</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $key => $value): ?>
                        <tr class="gradeX">
                    <input type='hidden' id='list' value="<?php print_r($value); ?>">
                    <td><?php echo $value["state_id"]; ?></td>
                    <td><?php echo $value["state_title"]; ?></td>
                    <td><?php echo $value["state_type"]; ?></td>
                    <td><?php echo $value['input_field_name']; ?></td>
                    <td><?php echo $value['state_indicator']; ?></td>
                    <td><?php if($value['fxn_call_flag'] == 1){ echo 'Yes'; }else { echo 'No'; } ?></td>
                    <td><?php echo $value['call_fxn_name']; ?></td>
                    <td>
                        <?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>', 
    array('controller' => 'menus', 'action' => 'editmenu', $value['state_id']), 
    array('escape' => false)); ?>
                        <?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="fa fa-eye"></i></button>', 
    array('controller' => 'menus', 'action' => 'managemenu', $value['state_id']), 
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



