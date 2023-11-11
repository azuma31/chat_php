<?php
// チャットのメッセージを保存するための単純なファイルベースのアプローチ
$chatFile = 'chatlog.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';

    if (!empty($message)) {
        $formattedMessage = "User: $message\n";
        file_put_contents($chatFile, $formattedMessage, FILE_APPEND | LOCK_EX);
    }
} else {
    // チャットの履歴を読み込んでクライアントに送信
    $chatHistory = file_get_contents($chatFile);
    echo $chatHistory;
}
?>
