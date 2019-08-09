<?php
require_once ('./websockets.php');     // 引用下載的websockets
class EchoServer extends WebSocketServer {    // 繼承WebSocketServer
    protected function process($user, $message) {   // 當有client端進來就process(處理、接收資料)
        echo "got message: $message \r\n";
        $this->send ( $user, $message );   // 用send()送資料
    }
    protected function connected($user) {   // 有連線時，紀錄該user
    }
    protected function closed($user) {      // 關掉連線，也需傳user參數
    }
}

$echo = new EchoServer ( "0.0.0.0", "9000" );

try {
    $echo->run ();
} catch ( Exception $e ) {
    $echo->stdout ( $e->getMessage () );
}

?>