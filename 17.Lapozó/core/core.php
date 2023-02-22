<?php
$page = $_GET["page"] ?? 1; // // Megadjuk az oldalak számát
$size = $_GET["size"] ?? 1; // Megadjuk a méretet

$possiblePageSizes = [10, 25, 30, 40, 50]; // Megadjuk av választható méretet

$pictures = array_fill(0, 100, [
    "title" => "Másik kép",
    "thumbnail" => "https://i.imgur.com/WLlE8gb.jpg"
]);  // Létrehozunk egy tömböt filleljük 0-100-ig








$content = array_slice($pictures, ($page - 1) * $size, $size);  // MEgmondjuk hogy hány darab elemet szeretnénk egyszerre lekérni
// pictures, (0) * 50 = 0, 50 = 0-49
// Így már a $content tömbön gyalogolhatunk végig a foreach ciklusunkal



// Hogy lapozhassunk a kiválasztott pagek között és megkapjuk a page-hez tartozó összes size-t létrehozzuk a paginate változót ami template stringel tér vissza
function paginate($total, $currentPage, $size) // Megkapja az összes elem számát, az aktuális page számát, a méretet => $_GET["size"];
{
    $page = 0; // Létrehozunk egy page változót
    $markup = ""; // Létrehozzuk az üres templateünket

    if($currentPage > 1) { // Ha a currentPage > 1 akkor konkatenálunk egy gombot az elejére!
        $previousPage = $currentPage - 1;
        $markup .= "<li class=\"page-item\"\>  
            <a class='page-link' href='/17.Lapozó/?page=$previousPage&size=$size'>Previous</a>
        </li>";
    }
    // Végig gyalogolnk az összes tömbelemen, és az $i értékét addig növeljük a $size értékével míg el nem érjük a totalt;
    for ($i = 0; $i < $total; $i += $size) {  // Tehát ha size értéke 10-es akkor az i értékét 10-esével fogjuk megnövelni ha 50-es akkor 50-esével fogjuk megnövelni. Tehát ha 50-esével akkor 2 lépésből megvan a 100, ha 10 akkor 10 lépésből
        $page++;   // A page értékét viszont csak 1-el növeljük
        // A templateünk pedig annyiszor tér vissza amennyi iterációt végrehajtunk a $page-t pedig beleírjuk értékként
        $isActive = $page == $currentPage ? 'active' : ''; // Egy ternary-val megnézzük mely fieldek aktivak majd azzal is térünk vissza
        $markup .= "<li class=\"page-item $isActive \"\>  
            <a class='page-link' href='/17.Lapozó/?page=$page&size=$size'>$page</a>
        </li>";
    };
    
    if($currentPage < $page) { // Ha currentPage < mint $page száma akkor konkatenálunk a végéhez egy gombot
        $nextPage = $currentPage + 1;
        $markup .= "<li class=\"page-item\"\>  
            <a class='page-link' href='/17.Lapozó/?page=$nextPage&size=$size'>Next</a>
        </li>";
    }


    return $markup;
}
