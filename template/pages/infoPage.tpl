<h1>Infos</h1>

{foreach $infoPosts as $post}
	<hr />
	<div class="postmsg">
		<p>
			{$post.message|parseMessage}
		</p>
	</div>
{/foreach}
