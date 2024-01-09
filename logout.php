<?php
require_once 'user.php';
User2::logout();
header('Location: login_form.php');