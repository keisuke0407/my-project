<?php
// 変数A, Bを用意し、それぞれに数値を代入し、どちらが大きいか判別する
// 変数 $a と $b に数値を代入
$a = 10;
$b = 15;

// $a と $b の大小を比較
if ($a > $b) {
    // $a が大きい場合
    echo "Aの方が大きい\n";
} elseif ($b > $a) {
    // $b が大きい場合
    echo "Bの方が大きい\n";
} else {
    // $a と $b が同じ値の場合
    echo "AとBは同じ値です\n";
}

// 奇数か偶数かを判断するプログラム
// $numberが奇数か偶数かを判断(例えば7)
$number = 7;

// $number が偶数か奇数かを判定
if ($number % 2 == 0) {
    // $number が偶数の場合
    echo "$number は偶数\n";
} else {
    // $number が奇数の場合
    echo "$number は奇数\n";
}

// 0から100の点数を変数に代入し、成績判定するプログラム
// 変数 $score に点数を代入
$score = 85;

// 成績を判定するためのif文
if ($score == 100) {
    // 100点の場合
    echo "AA\n";
} elseif ($score >= 90) {
    // 90点以上の場合
    echo "A\n";
} elseif ($score >= 80) {
    // 80点以上の場合
    echo "B\n";
} elseif ($score >= 70) {
    // 70点以上の場合
    echo "C\n";
} elseif ($score >= 60) {
    // 60点以上の場合
    echo "D\n";
} else {
    // 60点未満の場合
    echo "E\n";
}

// ある整数を変数に代入し、正の数か負の数かゼロのいずれかを判定するプログラム
// 整数を$number に代入
$number = -3;

// 正の数、負の数、ゼロのパターンに分ける
if ($number > 0) {
    // 正の数の場合
    echo "$number は正の数です\n";
} elseif ($number < 0) {
    // 負の数の場合
    echo "$number は負の数です\n";
} else {
    // ゼロの場合
    echo "$number はゼロです\n";
}

// 年齢を入力し、条件によってバスの料金を出力するプログラム
// 年齢を$ageに代入
$age = 10;

// if文を使って年齢に基づくバス料金を判断
if ($age >= 0 && $age <= 5) {
    // 0から5才の場合
    echo "バス料金は無料です\n";
} elseif ($age >= 6 && $age <= 12) {
    // 6才から12才の場合
    echo "バス料金は200円です\n";
} elseif ($age >= 13 && $age <= 70) {
    // 13才から70才の場合
    echo "バス料金は500円です\n";
} else {
    // 70才より上の場合
    echo "バス料金は無料です\n";
}
?>
