<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<div class="comments">
	<?php if ($comments) : ?>

		<h3><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
	
		<ol class="commentList">
	
		<?php foreach ($comments as $comment) : ?>
	
			<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
	
				<p class="meta"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('M jS, Y') ?></a> <span class="commentEdit"><?php edit_comment_link('edit','',''); ?></span></p>
				
				<cite><?php comment_author_link() ?></cite> says:
				
				<?php if ($comment->comment_approved == '0') : ?>
				<p class="awaitingMod">* Your comment is awaiting moderation</p>
				<?php endif; ?>
	
				<?php comment_text() ?>
			</li>
	
		<?php
			/* Changes every other comment to a different class */
			$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
		?>
	
		<?php endforeach; /* end for each comment */ ?>
	
		</ol>

 	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
	
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="nocomments">Comments are closed.</p>
	
		<?php endif; ?>
	<?php endif; ?>


	<?php if ('open' == $post->comment_status) : ?>
	
	<h3 id="leaveReply"><a href="#">Leave a Reply</a></h3>
		
	<div class="reply">
		
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
			<?php if ( $user_ID ) : ?>
			
			<div class="row">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></div>
			
			<?php else : ?>
			
		<div class="row"><label for="author"><?php //if ($req) echo " (required)"; ?></label><input type="text" name="author" id="author" value="Your Name" size="22" tabindex="1" /></div> 
			
			<div class="row"><label for="email"><?php //if ($req) echo " (required)"; ?></label><input type="text" name="email" id="email" value="Email Address" size="22" tabindex="2" /></div>
			
			<div class="row"><label for="url"></label><input type="text" name="url" id="url" value="Your website" size="22" tabindex="3" /></div>
			
			<?php endif; ?>
			
			<div class="row rowTextarea"><label for="comment"></label><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4">Comment</textarea></div>
			
			<div class="row rowButtons"><input class="btn" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
			
			<?php do_action('comment_form', $post->ID); ?>
		
		</form>
	
	</div><!-- end reply -->
	
	<script type="text/javascript">
		$(document).ready( function() {
			$("#commentform").initFormDynamicDefaultValues();
		});
	</script>

	
	<?php endif; // If registration required and not logged in ?>

</div><!-- end comments -->

<?php endif; // if you delete this the sky will fall on your head ?>
