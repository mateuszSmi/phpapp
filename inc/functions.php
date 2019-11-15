<?php

// $pages = array(
// 'Witam' => 'Witamy',
// 'formularz' => 'Formularz',
// 'klasa' => 'Klasy'
// );


$ret=array();//tablica asocjacyjna, ktora bedzie zawierala wyniki zapytan


function get_menu($id){
global $db,$ret;
db_query('SELECT * FROM menu', $ret);
//print_r($ret);
 foreach ($ret as $k => $t) {
echo '
<li class="nav-item">
    <a class="nav-link" href="?id='.$t['plik'].'">'.$t['tytul'].'</a>
</li>
';
}
}


function get_page_title($id){
global $ret;
foreach ($ret as $k => $t) {
	if ($t['plik'] == $id){
		echo $t['tytul'];
		return;
	}
}
//tytul domuslny
	echo 'Aplikacja PHP';
}

function get_page_content($id){
if (file_exists($id.'.html'))
	include($id.'.html');
else
	include('404.html');

}
function clrtxt(&$el, $maxdl=30) {
    if (is_array($el)) {
        return array_map('clrtxt', $el);
    } else {
        $el = trim($el);
        $el = substr($el, 0, $maxdl);
        if (get_magic_quotes_gpc()) $el = stripslashes($el);
        $el = htmlspecialchars($el, ENT_QUOTES);
        return $el;
    }
}
?>