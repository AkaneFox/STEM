<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root@localhost"; // ваше имя пользователя для доступа к базе данных
$password = ""; // ваш пароль для доступа к базе данных
$dbname = "stem"; // название вашей базы данных

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы HTML и вставка их в базу данных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO Students (FirstName, LastName, Email, Course) VALUES ('$firstname', '$lastname', '$email', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
