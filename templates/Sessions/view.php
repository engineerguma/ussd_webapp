<!-- page start-->
<div class="row">        
    <div class="col-lg-4">
        <section class="panel">
            <header class="panel-heading">
                Session Information
            </header>
            <ul class="list-group">
                <li class="list-group-item">MSISDN:<span class="pull-right"><?php echo $session['telephone_number']; ?></span></li>
                <li class="list-group-item">Session ID: <span class="pull-right"><?php echo $session['session_id']; ?></span></li>
                <li class="list-group-item">Start Time: <span class="pull-right"><?php echo $session['session_date']; ?></span></li>
                <li class="list-group-item">Status: <span class="pull-right"><?php echo $session['session_status']; ?></span></li>
                <li class="list-group-item">Close Time: <span class="pull-right"><?php echo $session['session_close_date']; ?></span></li>
                <li class="list-group-item">Final State: <span class="pull-right"><?php echo $session['session_close_date']; ?></span></li>
            </ul>
        </section>
    </div>
    <div class="col-sm-8">
        <section class="panel">
            <header class="panel-heading">
                Session Inputs
            </header>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>State Name</th>
                        <th>Input Name</th>
                        <th>Input Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sinputs as $mtext): ?>
                    <tr>
                        <td><?php echo $mtext['state_id']; ?></td>
                        <td><?php echo $mtext['menu']['state_title']; ?></td>
                        <td><?php echo $mtext['input_name'];?></td>
                        <td><?php echo $mtext['input_value']; ?></td>
                    </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</div>
<!-- page end-->