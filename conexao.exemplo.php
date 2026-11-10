<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli("localhost", "SEU_USUARIO", "SUA_SENHA", "NOME_DO_BANCO");