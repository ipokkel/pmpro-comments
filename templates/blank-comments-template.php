<?php
/**
 * Comments template for non-members.
 *
 * @package PMPro Comments
 */
?>
<div id="comments" class="comments-area pmpro_comments-non-member">
	<?php echo wp_kses_post( pmpro_comments_non_member_text() ); ?>
</div>
