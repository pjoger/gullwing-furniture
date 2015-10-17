<?php

require_once('classes/translation.php');

$lang = '';
if (isset($_GET['lang']) && preg_match('/^[a-z]{2}$/',$_GET['lang'])) $lang = $_GET['lang'];
if ($lang == '' && isset($_COOKIE['lang']) && preg_match('/^[a-z]{2}$/',$_COOKIE['lang'])) $lang = $_COOKIE['lang'];
if ($lang == ''){
	$lang = 'ru';
} else {
	setcookie("lang", $lang,time()+3600*24*365);
}
$translate = new Translator($lang);

$phrase = 'Невозможно узнать поисковый запрос';
$referer = 'Прямой заход';	
if (isset($_SERVER['HTTP_REFERER'])) {$referer = $_SERVER['HTTP_REFERER'];}
if (stristr($referer, 'yandex.ru')) { $search = 'text='; $crawler = 'Yandex'; }
if (stristr($referer, 'yandex.ua')) { $search = 'text='; $crawler = 'Yandex'; }
if (stristr($referer, 'rambler.ru')) { $search = 'query='; $crawler = 'Rambler'; }
if (stristr($referer, 'google.ua')) { $search = 'q='; $crawler = 'Google'; }
if (stristr($referer, 'google.ru')) { $search = 'q='; $crawler = 'Google'; }
if (stristr($referer, 'google.com')) { $search = 'q='; $crawler = 'Google'; }
if (stristr($referer, 'mail.ru')) { $search = 'q='; $crawler = 'Mail.Ru'; }
if (stristr($referer, 'bing.com')) { $search = 'q='; $crawler = 'Bing'; }
if (stristr($referer, 'qip.ru')) { $search = 'query='; $crawler = 'QIP'; }

if (isset($crawler)) 
{
$phrase = urldecode($referer);
eregi($search.'([^&]*)', $phrase.'&', $phrase2);
$phrase = $phrase2[1];
$referer = $crawler;
}
 

if(!isset($_GET['page'])){
	$page = 'main';
} else {
	$page = addslashes(strip_tags(trim($_GET['page'])));
}
switch ($page){
	case 'about':
		$title = 'О нас';
		$meta_d = 'Описание страницы О нас';
		$meta_kw = 'Ключевые слова страницы О нас';
	break;
	case 'article':
		$title = 'Статья';
		$meta_d = 'Описание страницы Статья';
		$meta_kw = 'Ключевые слова страницы Статья';
	break;
	case 'foto':
		$title = 'Фотогалерея';
		$meta_d = 'Описание страницы Фотогалерея';
		$meta_kw = 'Ключевые слова страницы Фотогалерея';
	break;
	case 'contacts':
		$title = 'Наши контакты';
		$meta_d = 'Описание страницы Наши контакты';
		$meta_kw = 'Ключевые слова страницы Наши контакты';
	case 'prod':
		include ('pages/prod_info.php');
    switch_prod_info();
		$title = 'Продукты - '.$translate->t($prod_info['title']);
		$meta_d = $translate->t($prod_info['head_descr']);
		$meta_kw = $translate->t($prod_info['head_keywords']);
		$head_ext = '<link rel="stylesheet" href="css/prod.css" />';
	break;
	default:
		$page = 'main';
		$title = 'Главная';
		$meta_d = 'Изготовление, доставка и установка мебели на заказ';
		$meta_kw = 'элитная мебель для дома спальни гостиной';
		$head_ext = '
			<link rel="stylesheet" href="css/skin2/style.css" />
			<link rel="stylesheet" href="css/prod.css" />
		';
}
?>
<html>
	<head>
		<title>Gullwing Furniture - <?php echo $title; ?></title>
		<meta name="description" content="<?php echo $meta_d; ?>" />
		<meta name="keywords" content="<?php echo $meta_kw; ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="css/iview.css" />

		<?php if (isset($head_ext)) echo $head_ext; ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!--		<script src="js/jquery-1.7.1.min.js"></script> -->
		<script type="text/javascript" src="js/raphael-min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.js"></script>

		<script src="js/iview.js"></script>
		<script>
			$(document).ready(function(){
				$('#iview2').iView({
					fx: "fade",
					pauseTime: 7000,
					pauseOnHover: false,
					directionNav: true,
					directionNavHide: false,
					controlNav: true,
					controlNavNextPrev: false,
					controlNavTooltip: false,
					//autoAdvance: false,
					nextLabel: "Следующий",
					previousLabel: "Предыдущий",
					playLabel: "Автопоказ",
					pauseLabel: "Пауза",
					timer: "360Bar",
					timerBg: "#EEE",
					timerColor: "#000",
					timerDiameter: 0, //40,
					timerPadding: 0, //4,
					timerStroke: 0, //8,
					timerPosition: "top-right"
				});
			});
		</script>

	</head>

	<body>

		<div id="cont">
			<div id="header">
				<h1><a href="/"><img src="img/logo.png" width="200"/></a></h1>
				<div class="container">

					<div id="nav">
						<ul>
							<li class="<?php if ($page == 'main') echo 'active' ?>"><a href="/"><?php $translate->__('Main'); ?></a></li>
<!--							<li><a href="index2.html"><?php $translate->__('Description'); ?></a></li> -->
							<li class="<?php if ($page == 'prod') echo 'active' ?>">
								<b><?php $translate->__('Products'); ?></b>
								<ul>
									<li>
										<a href="/?page=prod&prod=table1" onclick="$('#table1_prod').show('slide', { direction: 'left' }, 'slow'); return false;">
                      <?php $translate->__('Table1_Name'); ?>
                    </a>
									</li>
									<li>
										<a href="/?page=prod&prod=table2" onclick="$('#table2_prod').show('slide', { direction: 'left' }, 'slow'); return false;">
                      <?php $translate->__('Table2_Name'); ?>
                    </a>
									</li>
									<li>
										<a href="/?page=prod&prod=table3" onclick="$('#table3_prod').show('slide', { direction: 'left' }, 'slow'); return false;">
                      <?php $translate->__('Table3_Name'); ?>
                    </a>
									</li>
								</ul>
							</li>
							<li class="<?php if ($page == 'about') echo 'active' ?>">
								<a href="/?page=about"><?php $translate->__('About'); ?></a>
							</li>
							<li class="<?php if ($page == 'contacts') echo 'active' ?>">
								<a href="/?page=contacts"><?php $translate->__('Contacts'); ?></a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="container">
			    <?php
			        include ('pages/'.$page.'.php');
			    ?>
			</div>
    </div>
	</body>
</html>
