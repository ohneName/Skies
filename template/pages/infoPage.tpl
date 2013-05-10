<h1>Infos</h1>

{foreach $infoPosts as $post}
	<div class="postmsg">
		<p>
			{$post.message|parseMessage}
		</p>
	</div>
	<hr />
{/foreach}
