<div id="main_content">
	<h2>Статьи</h2>
	
	<? if($articles): ?>

		<? foreach ($articles as $key => $value) :?>
			
			<h3> <?=$value['title']?> </h3>
			<p> <?=$value['small_article']?> </p>
			<a href="http://<?=SITE_NAME;?>/aritcle/id/ <?=$value['id']?>">  Читить далее ...  </a>

		<? endforeach; ?>

	<? else: ?>
	
	<p> Статей нет!!! </p>

	<? endif; ?>

</div> <!-- end div main_contnet -->
<div class="clear"></div>
</div><!-- end div wrapper -->