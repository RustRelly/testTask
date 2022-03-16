<?php

class jsonFile{

public function readFile($link) {
  $content = file_get_contents($link);
  $data = json_decode($content);

  switch (json_last_error()) {
    case JSON_ERROR_NONE:
      $data_error = '';
      break;
    case JSON_ERROR_DEPTH:
      $data_error = 'Достигнута максимальная глубина стека';
      break;
    case JSON_ERROR_STATE_MISMATCH:
      $data_error = 'Неверный или не корректный JSON';
      break;
    case JSON_ERROR_CTRL_CHAR:
      $data_error = 'Ошибка управляющего символа, возможно неверная кодировка';
      break;
    case JSON_ERROR_SYNTAX:
      $data_error = 'Синтаксическая ошибка';
      break;
    case JSON_ERROR_UTF8:
      $data_error = 'Некорректные символы UTF-8, возможно неверная кодировка';
      break;
    default:
      $data_error = 'Неизвестная ошибка';
      break;
  }

  if($data_error !='') {
    echo $data_error;
    return -1;
  }
  else
    return $data;
 }
}
?>
