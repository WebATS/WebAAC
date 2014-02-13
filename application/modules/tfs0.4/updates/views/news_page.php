<style type="text/css">

.newsTitle a {
	color:white;
	position: absolute;;
	margin-top: -5px;
}
</style>
<?php
$this->load->helper('date');
$datestring = '%d/%m/%Y -  %h:%i %a';
foreach($news as $post_data):
	$parsed = parse_post($post_data);

	$post = array(
	  'title' => $parsed['title'],
	  'description' => $parsed['description'],
	  'link' => $parsed['link'],
	  'published-at' => $post_data->{'unix-timestamp'},
	  'tags' => (@$post_data->tags == NULL ? array() : $post_data->tags)
	);
?>
<?php if(in_array(config_item('especial_tag'), $post_data->tags)): ?>
<div class="news">
	<div class="newsTitle"><a href="<?php echo $parsed['link']; ?>"><?php if($parsed['title']) { echo $parsed['title']; } else{ ?> Avatar Online <?php } ?></a> </div>
	<div class="newsBody" style="margin-left: 10px;">
		<p>
			<img class="Title" src="<?php text_global ('Ultimos Updates'); ?>" alt="Contentbox headline">
		<p>
		<?php echo $parsed['description']; ?>
	</div>
	<small><b>Posted on</b>: <?php echo mdate($datestring, $post_data->{'unix-timestamp'}); ?> 
	<?php if(is_array($post_data->tags)): echo '-'; foreach ($post_data->tags as $key):	?>
	#<a target="blank" href="http://avatarots.tumblr.com/tagged/<?php echo $key; ?>"><?php echo $key; ?></a>,
	<?php endforeach; endif; ?>
	</small>
		<p>
</div>

<?php endif; endforeach; ?>