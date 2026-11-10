<?php
session_start();
session_destroy();            // função que encerra a sessão
header("Location: login.html");
exit;