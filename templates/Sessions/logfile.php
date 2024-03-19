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
    <div class="col-lg-6">
        <section class="panel">
            <header class="panel-heading">
                Log File
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label>Log File Contents:</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->