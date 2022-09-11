<?php

$serverName = $_SERVER["SCRIPT_FILENAME"];
$arrayServerName = explode("/", $serverName);
// $arrayServerName[5] === fileName
switch ($arrayServerName[5]) {
    case 'index.php';
    case 'index';
    case '':
        $title = "Cloud | Login";
        break;

    case 'feed.php':
    case 'feed':
        $title = "Cloud | Feed";
        break;
    
    case 'profile.php':
    case 'profile':
        $title = "Cloud | Profile";
        break;

    case 'settings.php':
    case 'settings':
        $title = "Cloud | Settings";
        break;

    default:
        $title = 'Cloud';
        break;
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/css/iziModal.css" integrity="sha512-uZ+G0SzK4GMUDUzxzbIeLGLjYgAhQ2KrIV4bWIP5o6URt5XVcn8S02eW6C1DH35bqq/XX1jYwlhhNPPIE1+q1A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/includes/modal.inc/modal-styles.css">
    <link rel="stylesheet" href="assets/includes/inc.news/inc.menu-news.css">
    <link rel="stylesheet" href="assets/includes/inc.feed/inc.menu-feed.css">
    <link rel="stylesheet" href="assets/includes/inc.navegation/inc.menu-navegation.css">
    <title><?=$title?></title>
</head>