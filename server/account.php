<?php
// server/account.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // データベース接続設定
    $host = "your_host";
    $username = "your_username";
    $password = "your_password";
    $database = "your_database";

    // データベース接続
    $db = new mysqli($host, $username, $password, $database);

    // 接続エラーの確認
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // 安全なデータ取得のためのエスケープ処理
    $user_name = $db->real_escape_string($_POST['username']);
    $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // パスワードのハッシュ化

    // アカウント作成SQL文
    $sql = "INSERT INTO users (username, password) VALUES ('$user_name', '$user_password')";

    // SQL実行
    if ($db->query($sql) === TRUE) {
        echo "New account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    // データベース接続解除
    $db->close();
}
?>
