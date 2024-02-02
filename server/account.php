<?php
// account_create.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // データベース接続処理（例）
    $db = new mysqli("your_host", "your_username", "your_password", "your_database");

    // エラーチェック
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // POSTデータの取得
    $username = $db->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // パスワードのハッシュ化

    // アカウント作成SQL
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    // SQL実行
    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
}
?>
