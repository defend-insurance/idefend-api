<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>iDefend Api</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        .container{margin-top: 80px}
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="./">iDefendAPI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Session</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="start-close.php">Start & Stop</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">User</a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="get-products.php">getProducts</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Policy</a>
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                    <a class="dropdown-item" href="get-products.php">Get client Products</a>
                    <a class="dropdown-item" href="get-claim-limits.php">Get client Claim limits for GAP</a>
                    <a class="dropdown-item" href="getting-car-model.php">Getting Car Model</a>
                    <a class="dropdown-item" href="coverage-counting.php">Coverage Counting</a>
                    <a class="dropdown-item" href="direct-create-quote.php">Direct create Quote</a>
                    <a class="dropdown-item" href="direct-create-policy.php">Direct create Policy</a>
                    <a class="dropdown-item" href="resend-sms.php">Resend SMS</a>
                    <a class="dropdown-item" href="sign.php">Sign</a>
                    <a class="dropdown-item" href="get-policy-list.php">Get Policy List</a>

                </div>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container" >

    <div class="row justify-content-md-center">
        <div class="col col-lg-12">


<?php
require_once "constants.php";

//ini_set('xdebug.var_display_max_depth', '-1');
//ini_set('xdebug.var_display_max_children', '-1');
//ini_set('xdebug.var_display_max_data', '-1');


