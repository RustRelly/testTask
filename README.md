# testTask
1. В папке SQL находится файл со скриптом для создания базы данных и создания таблиц.
2. Скрипт index.php считывает данные из источников: <br>
    https://jsonplaceholder.typicode.com/posts <br>
    https://jsonplaceholder.typicode.com/comments <br>
   и заполняет таблицы базы данных данными из этих json'ов + выводит количество добавленных записей.
3. startPage.html в папке html представляет из себя страницу с полем ввода и кнопкой. По нажатию кнопки производится поиск по базе данных в соответствие с заднием. А именно     содержание подстроки, введенной в окно, в столбце, содержащем тело комментария. Результат выводится в таблице вместе с информацией о титуле записи, под которой оставлен. комментарий.
