<?php

//lancer la session
session_start();

session_destroy();

header ("Location: /PHPcours/TODO/index.php" );