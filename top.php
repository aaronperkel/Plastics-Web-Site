<?php
$phpSelf = htmlspecialchars($_SERVER['PHP_SELF']);
$pathParts = pathinfo($phpSelf);
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reusable Water Bottles</title>
        <meta name="author" content="Aaron Perkel">
        <meta name="description" content="Most people know that
        reusable water bottles are better than single use, but do
        we actually know why? Here I will explain why we should actually
        be using reusable bottles.">
        
        <meta name="viewport" content="width=device-width, 
        initial-scale=1.0">

        <link href="css/custom.css?version=<?php print time(); ?>" 
            rel="stylesheet" 
            type="text/css">

        <link href="css/layout-desktop.css?version=<?php print time(); ?>" 
            rel="stylesheet" 
            type="text/css">

        <link href="css/layout-tablet.css?version=<?php print time(); ?>" 
            media="(max-width: 820px)"
            rel="stylesheet" 
            type="text/css">

        <link href="css/layout-phone.css?version=<?php print time(); ?>" 
            media="(max-width: 430px)"
            rel="stylesheet" 
            type="text/css">
    </head>
    <?php

    print '<body class="' . $pathParts['filename'] . '">';
    print '<!-- #################   Body element    ################# -->';
    include 'database-connect.php';
    include 'header.php';
    include 'nav.php';
    ?>