<?php

/*получаем значения полей из формы*/
$name = $_POST['user_name'];
$number = $_POST['user_number'];
$data = $_POST['user_data'];
$time = $_POST['user_time'];
$phone = $_POST['user_phone'];

/*функция для создания запроса на сервер Telegram */
function parser($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    if($result == false){     
      echo "Ошибка отправки запроса: " . curl_error($curl);
      return false;
    }
    else{
      return true;
    }
}

/*собираем сообщение*/
$message .= "Новое сообщение из формы";
$message .= "Имя: ".$name;
$message .= "колличество:".$number;
$message .= "дата:".$data;
$message .= "время:".$time;
$message .= "телефон:".$phone;

/*токен который выдаётся при регистрации бота */
$token = "5951954877:AAEtAPBYQGAmmbfRom_S-vuyWNIKf8E2lv4";
/*идентификатор группы*/
$chat_id = "-791524548";
/*делаем запрос и отправляем сообщение*/
parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");
?>
