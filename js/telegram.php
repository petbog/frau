<?php

$name = $_POST['user_name'];
$number = $_POST['user_number'];
$data = $_POST['user_data'];
$time = $_POST['user_time'];
$phone = $_POST['user_phone'];
$token = "5951954877:AAEtAPBYQGAmmbfRom_S-vuyWNIKf8E2lv4";
$chat_id = "-791524548";
$arr = array(
  'Имя пользователя: ' => $name,
  'Колличество гостей: ' => $number,
  'Дата' => $data,
  'Время:' => $time,
  'Телефон:' => $phone
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram && $sendToTelegram2) {
  header('Location: thanks.html');
} else {
  echo "Error";
}
?>
