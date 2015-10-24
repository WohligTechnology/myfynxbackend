<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">
    <title>Invoice for Lyla Loves</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
   <?php
//        print_r($before);
    ?>
    <div class="container">
        <div class="row" style="width:400px;">
            
            <div class="col-xs-8">
                <div style="border:1px solid #ccc; padding:10px; font-size: 10px;"><b><?php echo $before['order']->firstname." ".$before['order']->lastname;?></b><br>
<!--                <b>Address:</b>-->
                    <div style="font-size: 8px;">
                        <?php
                            if($before['order']->shippingaddress=="")
                            {
                                echo $before['order']->billingaddress;
                                echo "<br>";
                                 echo $before['order']->billingcity;
                                echo "<br>";
                                 echo $before['order']->billingstate;
                                echo "<br>";
                                 echo $before['order']->billingpincode;
                            }
                            else
                            {
                                echo $before['order']->shippingaddress;
                                echo "<br>";
                                 echo $before['order']->shippingcity;
                                echo "<br>";
                                 echo $before['order']->shippingstate;
                                echo "<br>";
                                 echo $before['order']->shippingpincode;
                            }
                        ?>
                    </div>
                </div>

            </div>
            
            <div class="col-xs-3">
                <div class="logo">
                    <img src="<?php echo base_url('../img/logo.jpg'); ?>" alt="" style="width:62px;height:100px;">
                </div>
            </div>
        </div>
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- compiled and minified Bootstrap JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script>
        $(window).load(function () {
            window.print();
        });
    </script>
</body>

</html>
