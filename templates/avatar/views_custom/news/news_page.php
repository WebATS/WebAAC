<img class="Title" src="<?php text_global ('News'); ?>" alt="Contentbox headline">

<style type="text/css">

.newsTitle a {
	color:white;
	position: absolute;;
	margin-top: -5px;
	margin-left: 5px;
}
</style>
<?php
$this->load->helper('date');
$datestring = '%d/%m/%Y -  %h:%i %a';
$i = '0';
foreach($news as $post_data):
	if(isset($post_data->tags) and array_keys($post_data->tags, $this->config->item('especial_tag'))):
	$i++;
	$parsed = parse_post($post_data);

	$post = array(
	  'title' => $parsed['title'],
	  'description' => $parsed['description'],
	  'link' => $parsed['link'],
	  'published-at' => $post_data->{'unix-timestamp'},
	);

	if(isset($post_data->tags))
	{
		$post['tags'] = $post_data->tags;
	}
?>

<div class="news">
	<div class="newsTitle"><img style="margin-left: -12px; margin-top: -10px;" src="<?php echo site_url().TPLLAYOUTDIR; ?>images/global/menu/icon-news.gif"> <a href="<?php echo $parsed['link']; ?>"><?php if($parsed['title']) { echo $parsed['title']; } else{ ?> Avatar Online <?php } ?></a> </div>
	<div class="newsBody" style="margin-left: 10px;">

		<?php echo $parsed['description']; ?>
	</div>
	<small><b>Posted on</b>: <?php echo mdate($datestring, $post_data->{'unix-timestamp'}); ?> 
	<?php if(is_array($post_data->tags)): echo '-'; foreach ($post_data->tags as $key):	?>
	#<a target="blank" href="http://<?php echo $this->config->item('user_tumblr'); ?>.tumblr.com/tagged/<?php echo $key; ?>"><?php echo $key; ?></a>,
	<?php endforeach; endif; ?>
	</small>
		<p>
</div>

<?php if($i == $this->config->item('news_show')) break; endif; endforeach; ?>