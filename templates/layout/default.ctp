<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="shortcut icon" href="http://thevectorlab.net/flatlab/img/favicon.png">

        <title>SAVINGS GROUPS USSD || RWANDA</title>

        <!-- Bootstrap core CSS -->
        <?php
        echo $this->Html->css('public/css/bootstrap.min');
        echo $this->Html->css('public/css/bootstrap-reset');
        
        echo $this->Html->css('public/assets/font-awesome/css/font-awesome');
        echo $this->Html->css('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart');
        echo $this->Html->css('public/css/owl.carousel');
        
        echo $this->Html->css('public/css/style');
        echo $this->Html->css('public/css/style-responsive');
        
        echo $this->Html->css('public/assets/advanced-datatable/media/css/demo_page');
        echo $this->Html->css('public/assets/advanced-datatable/media/css/demo_table');
        echo $this->Html->css('public/assets/data-tables/DT_bootstrap');
        
        echo $this->Html->script('public/js/jquery');
		//print_r($_SERVER["HTTP_REFERER"]);die();
        ?>
    </head>

    <body>

        <section id="container" >
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <!--logo start-->
                <a href="dashboard" class="logo">Mamba<span>USSD</span></a>
                <!--logo end-->
                <div class="top-nav ">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <li>
                            <input type="text" class="form-control search" placeholder="Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username"><?php
                                    echo 'Hi '.$user['full_name'];
                                    ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li><a href="<?php echo BASE_URL;?>/users/profileedit/<?php echo $user['user_id']; ?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                <li><a href="<?php echo BASE_URL;?>/users/logout"><i class="fa fa-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="dashboard">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
            <?php foreach ($display_menus as $key => $value): ?>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="<?php echo $value['CSS']; ?>"></i>
                                <span><?php echo $value['Title']; ?></span>
                            </a>
                            <ul class="sub">
                        <?php foreach ($value['Submenus'] as $key=>$menu): 
                                echo $this->Html->link('<i class=""></i>'.$menu['Submenus']['menu_title'], 
    array('controller' => $menu['Submenus']['load_page']), 
    array('escape' => false));  endforeach; ?>
                            </ul>
                        </li>
<?php endforeach; ?>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <?php echo $this->Flash->render(); ?>
<?php echo $this->fetch('content'); ?>
                </section>
            </section>
            <!--main content end-->



            <!--script for this page-->
            <?php 
        echo $this->Html->script('public/assets/advanced-datatable/media/js/jquery'); 
        echo $this->Html->script('public/assets/advanced-datatable/media/js/jquery.dataTables'); 
        echo $this->Html->script('public/assets/data-tables/DT_bootstrap'); 
        
        echo $this->Html->script('public/js/bootstrap.min'); 
        echo $this->Html->script('public/js/jquery.dcjqaccordion.2.7');
        echo $this->Html->script('public/js/jquery.scrollTo.min'); 
        echo $this->Html->script('public/js/jquery.nicescroll'); 
        echo $this->Html->script('public/js/jquery.sparkline'); 
        echo $this->Html->script('public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart'); 
        echo $this->Html->script('public/js/owl.carousel'); 
        echo $this->Html->script('public/js/jquery.customSelect.min'); 
        echo $this->Html->script('public/js/respond.min');
        
        echo $this->Html->script('public/js/common-scripts');
        echo $this->Html->script('public/js/sparkline-chart');
        echo $this->Html->script('public/js/easy-pie-chart');
        echo $this->Html->script('public/js/count');
        echo $this->Html->script('public/assets/bootstrap-datepicker/js/bootstrap-datepicker');
        echo $this->Html->script('public/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker');
        echo $this->Html->script('public/js/advanced-form-components');
        echo $this->Html->script('public/assets/bootstrap-inputmask/bootstrap-inputmask.min');
        ?>
            <script>

                //owl carousel

                $(document).ready(function () {
                    $("#owl-demo").owlCarousel({
                        navigation: true,
                        slideSpeed: 300,
                        paginationSpeed: 400,
                        singleItem: true,
                        autoPlay: true

                    });
                });

                //custom select box

                $(function () {
                    $('select.styled').customSelect();
                });

                /* Formating function for row details */


                $(document).ready(function () {
                    /*
                     * Insert a 'details' column to the table
                     */
                    var nCloneTh = document.createElement('th');
                    var nCloneTd = document.createElement('td');
                    nCloneTd.innerHTML = '<img src="<?php echo URL; ?>public/assets/advanced-datatable/examples/examples_support/details_open.png">';
                    nCloneTd.className = "center";

                    $('#hidden-table-info thead tr').each(function () {
                        this.insertBefore(nCloneTh, this.childNodes[0]);
                    });

                    $('#hidden-table-info tbody tr').each(function () {
                        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
                    });

                    /*
                     * Initialse DataTables, with no sorting on the 'details' column
                     */
                    var oTable = $('#hidden-table-info').dataTable({
                        "aoColumnDefs": [
                            {"bSortable": false, "aTargets": [0]}
                        ],
                        "aaSorting": [[1, 'asc']]
                    });

                    /* Add event listener for opening and closing details
                     * Note that the indicator for showing which row is open is not controlled by DataTables,
                     * rather it is done here
                     */
                    $('#hidden-table-info tbody td img').live('click', function () {
                        var nTr = $(this).parents('tr')[0];
                        if (oTable.fnIsOpen(nTr))
                        {
                            /* This row is already open - close it */
                            this.src = "<?php echo URL; ?>public/assets/advanced-datatable/examples/examples_support/details_open.png";
                            oTable.fnClose(nTr);
                        }
                        else
                        {
                            /* Open this row */
                            this.src = "<?php echo URL; ?>public/assets/advanced-datatable/examples/examples_support/details_close.png";
                            oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
                        }
                    });
                });
            </script>
            <script type="text/javascript" charset="utf-8">
                $(document).ready(function () {
                    $('#example').dataTable({
                        "aaSorting": [[4, "desc"]]
                    });
                });
            </script>

    </body>
</html>
