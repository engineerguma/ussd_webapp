<!-- page start-->
<div class="row">        
    <div class="col-lg-4">
        <section class="panel">
            <header class="panel-heading">
                Menu Information
            </header>
            <ul class="list-group">
                <li class="list-group-item">Menu Name:<span class="pull-right"><?php echo $menu['state_title']; ?></span></li>
                <li class="list-group-item">State Type: <span class="pull-right"><?php echo $menu['state_type']; ?></span></li>
                <li class="list-group-item">Input Field Name: <span class="pull-right"><?php echo $menu['input_field_name']; ?></span></li>
                <li class="list-group-item">External Function Call: <span class="pull-right"><?php echo $menu['fxn_call_flag']; ?></span></li>
                <li class="list-group-item">External Function Name: <span class="pull-right"><?php echo $menu['call_fxn_name']; ?></span></li>
                <li class="list-group-item">State Indicator: <span class="pull-right"><?php echo $menu['state_indicator']; ?></span></li>
            </ul>
        </section>
    </div>
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading tab-bg-dark-navy-blue tab-right ">
                <ul class="nav nav-tabs pull-left">
                    <li>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> Create Menu Text', 
    array('controller' => 'menutexts', 'action' => 'createtext', $menu['state_id']), 
    array('escape' => false)); ?> 
                    </li>
                    <li>
                            <?php echo $this->Html->link('<i class="fa fa-pencil"></i> Link Menus', 
    array('controller' => 'menuchoices', 'action' => 'linkmenu', $menu['state_id']), 
    array('escape' => false)); ?> 
                    </li>
                </ul>

            </header>
        </section>
        <section class="panel">
            <header class="panel-heading">
                Menu Text
            </header>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Text EN</th>
                        <th>Text KIN</th>
                        <th>Text FR</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mtexts as $mtext): ?>
                    <tr>
                        <td><?php echo $mtext['state_id']; ?></td>
                        <td><?php echo $mtext['text_en']; ?></td>
                        <td><?php echo $mtext['text_kin'];?></td>
                        <td><?php echo $mtext['text_fr']; ?></td>
                        <td>
                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', 
    array('controller' => 'menutexts', 'action' => 'edit', $mtext['record_id']), array('escape' => false)); ?>
                            &nbsp;
                        </td>
                    </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
<div class="row">        
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Menu Links
            </header>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User Choice/Input</th>
                        <th>Display Menu</th>
                        <th>New State</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mchoices as $mchoice): ?>
                    <tr>
                        <td><?php echo $mchoice['ussd_choice']; ?></td>
                        <td><?php echo $mchoice['ToState']['state_title'];?></td>
                        <td><?php echo $mchoice['ussd_new_state']; ?></td>
                        <td>
                                <?php echo $this->Html->link('<i class="fa fa-pencil"></i>', 
    array('controller' => 'menuchoices', 'action' => 'editmenulink', $mchoice['record_id']), array('escape' => false)); ?>
                            &nbsp;
                        </td>
                    </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
<!-- page end-->