<?php
/*

if(!isset($_GET['prod'])){
	$prod = 'table1';
} else {
	$prod = addslashes(strip_tags(trim($_GET['prod'])));
}

switch ($prod){
	case 'table1':
		$prod_info = array(
			'prefix'					=> 'table_',
			'title'						=> 'TableName1',
			'descr'						=> 'TableDescription',
			'files_template'	=> '/photos/table_1%02d.jpg',
			'thumb_template'	=> '/photos/table_1%02d_64.jpg',
			'files_amount'		=> 2,
		);
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
	break;
	default:
		$prod_info = array(
			'prefix'					=> 'table_',
			'title'						=> 'TableName1',
			'descr'						=> 'TableDescription',
			'files_template'	=> '/photos/table_1%02d.jpg',
			'thumb_template'	=> '/photos/table_1%02d_64.jpg',
			'files_amount'		=> 2,
		);
}

*/
// include ('pages/prod_table1.php');

?>

<script type="text/javascript">
function ShowPhoto(prefix,t){
	$('#'+prefix+'prod_photo').show();
	file = $(t).attr("href");
	$('#'+prefix+'prod_nav_ul a').toggleClass('active',false);
	$(t).toggleClass('active',true);
	$('#'+prefix+'photo').stop(true,true).hide().attr('src',file).fadeIn();
	return false;
}
</script>

<div id="<?php echo $prod_info['prefix'] ?>prod" class="prod">
	<div class="prod_about">
		<?php if ($page == 'main'){ ?>
			<a href="javascript:void(0)" onclick="$('#<?php echo $prod_info['prefix'] ?>prod').hide('slide', { direction: 'left' }, 'slow'); return false;" class="prod_close"></a>
		<?php } else { ?>
			<a href="/" class="prod_close">x</a>
		<?php } ?>
		<div class="prod_logo">
			<a href="/"><img src="img/logo.png" width="160"/></a>
		</div>
		<div class="prod_descr">
			<h1><?php $translate->__($prod_info['title']); ?></h1>
			<div class="prod_text">
				<?php $translate->__($prod_info['descr']); ?>
			</div>
		</div>
		<div class="prod_nav">
			<ul id="<?php echo $prod_info['prefix'] ?>prod_nav_ul">
				<?php
					for ($i=1; $i <= $prod_info['files_amount']; $i++){
						$photo = sprintf($prod_info['files_template'],$i);
						$thumb = sprintf($prod_info['thumb_template'],$i);
						$pref=$prod_info['prefix'];
						$active = '';
						if ($page == 'prod' && $i==1) $active = 'active';
						echo <<<EOT
							<li>
								<a href="$photo" onclick="return ShowPhoto('$pref',this)" class="$active">
									<img src="$thumb" width="64" height="64"/>
								</a>
							</li>
EOT;
					}
				?>
			</ul>
		</div>
	</div>
	<div id="<?php echo $prod_info['prefix'] ?>prod_photo" class="prod_photo">
		<img id="<?php echo $prod_info['prefix'] ?>photo" src="<?php printf($prod_info['files_template'],1); ?>" width="100%"/>
	</div>
</div>


