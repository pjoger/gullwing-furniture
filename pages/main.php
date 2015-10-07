		<div id="iview2">
			<div data-iview:image="photos/table_101.jpg">
				<a class="iview-caption caption1" data-x="200" data-y="90%" data-transition="fade" href="/?page=prod&prod=table1" onclick="$('#table1_prod').show('slide', { direction: 'left' }, 'slow'); return false;">
					<?php $translate->__('Table1_Comment'); ?>
				</a>
			</div>

			<div data-iview:image="photos/table_201.jpg">
				<a class="iview-caption caption1" data-x="200" data-y="90%" data-transition="fade" href="/?page=prod&prod=table2" onclick="$('#table2_prod').show('slide', { direction: 'left' }, 'slow'); return false;">
					<?php $translate->__('Table2_Comment'); ?>
				</a>
<!--				<a class="iview-caption caption2" data-x="50" data-y="320" data-transition="wipeRight" href="#">SUPPORTS ANIMATED CAPTIONS, VIDEO & IFRAME, SINGLE PAGE MULTI-USE</a>-->
			</div>

			<div data-iview:image="photos/table_301.jpg">
				<a class="iview-caption caption1" data-x="200" data-y="90%" data-transition="fade" href="/?page=prod&prod=table3" onclick="$('#table3_prod').show('slide', { direction: 'left' }, 'slow'); return false;">
					<?php $translate->__('Table3_Comment'); ?>
				</a>
			</div>
		</div>

		<div class="for_main">
		    <?php
		        include ('pages/prod_info.php');
            switch_prod_info('table1');
		        include ('pages/prod.php');
            switch_prod_info('table2');
		        include ('pages/prod.php');
            switch_prod_info('table3');
		        include ('pages/prod.php');
		    ?>
		</div>

