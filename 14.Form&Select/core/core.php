<?php
$size = $_GET["size"] ?? 10;
$page = $_GET["page"] ?? 0;


$possiblePageSizes = [10, 20, 30, 40, 50];

$pictures = array_fill(0, 100, [
    "title" => "Másik kép",
    "thumbnail" => "https://i.imgur.com/WLlE8gb.jpg"
]);


$page = $_GET["page"] ?? 0;




$page = array_slice($pictures, ($page - 1) * $size, $size);


// array slice segitséggével kiválasztjuk a tömböt , megnézzük hogy hányadik elemtől szeretnénk, majd harmadiknak hogy hányat szeretnénk kivenni a tömbből
// Tehát hozzáadjuk a tömböt
// Kiszámoljuk hogy  page-1 az ha a page 1 abban az esetben 0 tól kezdi a számlálász hisz 0 * 10 az 0, igy 0-9-ig szedi majd ki az elemeket
// vagy  ha a page 2 abban az esetben 10 tól kezdi a számlálász hisz 2- 1 = 1 , 1 * 10 az 10, igy 10-19-ig szedi majd ki az elemeket

/**
 * Igy fog ez kijönni
 * 1 = 0 - 9
 * 2 = 10 - 19
 * 3 = 20 -29
 */


// Így már a $page tömbön gyalogolhatunk végig a foreach ciklusunkal
