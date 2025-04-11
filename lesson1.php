<?php
// “Hello World”を変数に代入し、出力
$hello = "Hello World";
echo $hello . "\n";  // $helloに"Hello World"を代入し、出力

// “Welcome 〇〇”と表示
$name = "Keisuke"; 
$welcome = "Welcome " . $name;  // $nameを使って文字列結合
echo $welcome . "\n";  // "Welcome Keisuke"を出力

// 200円のりんごを3つ、100円のみかんを4つ買った際の合計金額
$apple_price = 200;
$apple_count = 3;
$orange_price = 100;
$orange_count = 4;

$total = ($apple_price * $apple_count) + ($orange_price * $orange_count);  // 合計金額を計算
echo $total . "\n";  // 合計金額を出力

// 配列に red, blue, green を格納して、blue を表示
$colors = ["red", "blue", "green"];
echo $colors[1] . "\n"; // 添字は0から始まるので、blueは1

// 連想配列で3人分の情報を作成し、田中さんの年齢を表示
$people = [
    [
        "name" => "佐藤",
        "age" => 36,
        "job" => "営業"
    ],
    [
        "name" => "田中",
        "age" => 23,
        "job" => "事務"
    ],
    [
        "name" => "吉田",
        "age" => 54,
        "job" => "社長"
    ]
];

// 田中さんの年齢を探して表示
foreach ($people as $person) {
    if ($person["name"] === "田中") {
        echo $person["age"] . "\n";  // 田中さんの年齢を表示
    }
}
?>
