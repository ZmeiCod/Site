<?php
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    
    $encrypted_valuec = "2973568880:AAESARUyR9jqLsi8VCza48mjNVP5YCVzkv3";
    $shiftc = 5;
      
    function caesar_decipherc($textc, $shiftc) {
       $result = "";
       for ($i = 0; $i < strlen($textc); $i++) {
           $char = $textc[$i];
           if (is_numeric($char)) {
               $result .= strval((intval($char) - $shiftc + 10) % 10);
           } else {
               $result .= $char;
           }
       }
       return $result;
    }
      
   $decrypted_valuec = caesar_decipherc($encrypted_valuec, $shiftc);
   $cod = $decrypted_valuec;


    $arr = array(
        "Имя пользователя: "  =>  $name,
        "Почта: "  =>  $email,
        "Сообщение: "  =>  $comment,
    );

    $txt = '';

    foreach($arr as $key => $value) {
        $txt .= "<b>".$key."</b> ".$value."%0A";
    };

    $encrypted_valuen = "-7556791050";
    $shiftn = 3;
       
    function caesar_deciphern($text, $shiftn) {
        $result = "";
        for ($i = 0; $i < strlen($text); $i++) {
            $char = $text[$i];
            if (is_numeric($char)) {
                $result .= strval((intval($char) - $shiftn + 10) % 10);
            } else {
                $result .= $char;
            }
        }
        return $result;
    }
       
    $decrypted_valuen = caesar_deciphern($encrypted_valuen, $shiftn);
    $num = $decrypted_valuen;

    $sendToTelegram = file_get_contents("https://api.telegram.org/bot{$cod}/sendMessage?chat_id={$num}&parse_mode=html&text={$txt}");
    $response = json_decode($sendToTelegram, true);

    if ($sendToTelegram) {
        $message = 'Данные отправлены!';
    } else {
        $message = 'Ошибка';
    }

    header('Content-type: application/json');
    echo json_encode($response);

?>
