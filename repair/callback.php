<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['name']) && !empty($_POST['phone'])){
  if (isset($_POST['name'])) {
    if (!empty($_POST['name'])){
  $name = strip_tags($_POST['name']);
  $nameFieldset = "Имя: ";
  }
}

if (isset($_POST['phone'])) {
  if (!empty($_POST['phone'])){
  $phone = strip_tags($_POST['phone']);
  $phoneFieldset = "Телефон: ";
  }
}

$token = "562106159:AAGdqaXrDOJAnRUSItOjqX-8GRho8xVb_Tk";
$chat_id = "-268170132";
$arr = array(
    $nameFieldset => $name,
    $phoneFieldset => $phone
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
 
  echo '<h5 class="text-success">Заявка принята, ожидайте звонка!</h5>';
    return true;
} else {
  echo '<h5 class="text-danger">Ошибка. Попробуйте ещё раз.</h5>';
}
} else {
  echo '<h5 class="text-warning">Ошибка. Вы заполнили не все поля!</h5>';
}
} else {
header ("Location: /");
}

?>