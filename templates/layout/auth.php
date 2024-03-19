<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mosaddek">
        <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <link rel="shortcut icon" href="http://thevectorlab.net/flatlab/img/favicon.png">

        <title>iKash - Mamba USSD v2 || Tele10 Rwanda Limited</title>

        <!-- Bootstrap core CSS -->
    <?php
        //Bootstrap core CSS
        echo $this->Html->css('public/css/bootstrap.min');
        echo $this->Html->css('public/css/bootstrap-reset');
        
        //external css
        echo $this->Html->css('public/assets/font-awesome/css/font-awesome');
        
        //Custom styles for this template
        echo $this->Html->css('public/css/style');
        echo $this->Html->css('public/css/style-responsive');
    ?>


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="container">

 <?php
                echo $this->Flash->render();
                echo $this->fetch('content');
                ?>

        </div>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>


    </body>
</html>
