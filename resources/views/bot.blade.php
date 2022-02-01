<?php
//$data_bot = json_decode(file_get_contents('php://input'), TRUE);
const TOKEN = '5226880364:AAGqTjdy_VYPkblNCSDAs7wXOnNtzu2kgsg';
const BASE_URL = 'https://api.telegram.org/bot'.TOKEN.'/';
//dd($data_bot);
//$way_read_file = "$cf/counter_db/visit.csv";

//echo __FILE__;

$link = mysqli_connect('db18.freehost.com.ua:3306', 'vanilla1_test1', 'IQt7mddww', 'vanilla1_test1');

$sql = 'SELECT name FROM testbots where id=5';
$result = $link->query('SELECT name FROM testbots where id=5');
$mess = $link->query('SELECT message FROM bots WHERE id = (SELECT MAX(id) FROM bots)');
$messbot = mysqli_fetch_all($mess, 1);

echo '<pre>';
echo ($messbot[0]['message']);
echo '<br>';

function readOne($link, $num){
    $sql = 'SELECT * FROM testbots where id='.$num.'';
    $result = mysqli_query($link, $sql);
    $categories = mysqli_fetch_all($result, 1);
        return $categories;
}

//function readAll($link){
//    $sql = 'SELECT * FROM testbots';
//    $result = mysqli_query($link, $sql);
//    $categories = mysqli_fetch_all($result, 1);
//    $names = [];
//    foreach ($categories as $cat){
//        $names[] = $cat['name'];
////        var_dump ($cat);
//    }
//    $a = array_combine($names, $categories);
////    var_dump ($a);
//    return $a;
//}

$sql = 'SELECT * FROM testbots';
$result = mysqli_query($link, $sql);
$categories = mysqli_fetch_all($result, 1);
$names = [];
foreach ($categories as $cat){
    $names[] = $cat['name'];
//        var_dump ($cat);
}
$a = array_combine($names, $categories);


//echo '<pre>';
//print_r($names);
//echo '<br>';

//while ($row = mysqli_fetch_array($result)) {
//    print("name: " . $row['desc'] . "; id: . " . $row['qty'] . "<br>");
//}

//$query = "SELECT name FROM `my_sql_table` where id=5";

//echo __DIR__;

$db = readOne($link, 4);
$dbOne = readOne($link, 1);
//echo ($dbOne[0]['name']);
//print_r($result);
$mass = $a;

$update = json_decode(file_get_contents('php://input'));

//file_put_contents(__DIR__ . '/logs.txt', print_r($update, 1), FILE_APPEND);

//api.telegram.org/bot5226880364:AAGqTjdy_VYPkblNCSDAs7wXOnNtzu2kgsg/setWebhook?url=https://test.vanilla.in.ua/lrvl/example-app/resources/views/bot.blade.php

$chat_id = $update->message->chat->id ?? '';
$text = $update->message->text ?? '';

//$keyboard = array(
//    array(
//        array('text'=>'home'),
//        array('text'=>'купити'),
//        array('text'=>'наступне')
//    )
//);
$f = $dbOne[0]['name'];

$itemid = 1;

$keyhi = [
    [
        ['text' => 'our items']
    ]
];




$keyboard2 = [];
$keyboard3 = [[['text' => '-- BUY NOW --']]];

foreach ($names as $key => $name){
//    var_dump($name);
//    echo '<br>';
    $keyboard2[] =
        [
            ['text' => ''.$name.'']
        ];
    $keyboard3[] =
        [
            ['text' => ''.$name.'']
        ];
}
//    print_r($keyboard3);
//    echo '<br>';


foreach ($mass as $key => $val){
//    echo $key;
    echo "<pre>";
    var_dump($val['availability']);
if($text == '/start'){
    $res = send_request('sendMessage', [
        'chat_id'=> $chat_id,
        'text'=> ''.$messbot[0]['message'].'',
        'disable_web_page_preview' => false,
        'reply_markup' => json_encode(array('resize_keyboard' => true, 'keyboard' => $keyhi))
    ]);
    break;
}elseif($text == 'our items'){
    $res = send_request('sendMessage', [
        'chat_id'=> $chat_id,
        'text' => 'check our products',
        'disable_web_page_preview' => false,
        'reply_markup' => json_encode(array('resize_keyboard' => true, 'keyboard' => $keyboard2))

    ]);
    break;
}elseif($text == $key){
    if($val['availability'] == 0){
    $res = send_request('sendPhoto', [
        'chat_id'=> $chat_id,
        'caption' => ''.$mass[$key]['desc']. '
        --> not availeble now :( ..',
        'photo'     => ''.$mass[$key]['img'].'',
        'disable_web_page_preview' => false,
        'reply_markup' => json_encode(array('resize_keyboard' => true, 'keyboard' => $keyboard2))
    ]);
    }else{
        $res = send_request('sendPhoto', [
            'chat_id'=> $chat_id,
            'caption' => ''.$mass[$key]['desc']. '
            --> buy it right now :) <--',
            'photo'     => ''.$mass[$key]['img'].'',
            'disable_web_page_preview' => false,
            'reply_markup' => json_encode(array('resize_keyboard' => true, 'keyboard' => $keyboard3))
        ]);
    }
    break;
}
}

//var_dump ($mass['Product 16']);

function send_request($method, $params = []){
    if(!empty($params)){
        $url = BASE_URL . $method . '?' . http_build_query($params);
    }else{
        $url = BASE_URL . $method;
    }
    return json_decode(file_get_contents($url));
}
