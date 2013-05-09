{$boardUrl = 'http://ufen.skyirc.net/forum/'}

<h1>News</h1>
<hr />

<p>
	Willkommen auf der Website des Minecraft-Servers ohne Name!
</p>

<hr />
<div id="punviewtopic">
	{foreach $news as $entry}

		<div class="blockpost newspost">
			<h2>
				<span class="conr">Geschrieben von <a href="{$boardUrl}profile.php?id={$entry.posterId}">{$entry.poster}</a></span>
				<span>Titel: <strong><a href="{$boardUrl}viewtopic.php?pid={$entry.id}">{$entry.subject}</a></strong></span>
			</h2>
			<div class="box">
				<div class="inbox">
					<div class="postbody">
						<div class="postleft">
							<dl>
								<dt><strong><a href="{$boardUrl}viewtopic.php?pid={$entry.id}">{$entry.timePosted|date_format:'%d.%m.%Y'}</a></strong></dt>
								<dd class="usertitle">Uhrzeit: {$entry.timePosted|date_format:'%H:%M'}</dd>
								<dd>Kommentare: {$entry.replyCount}</dd>
							</dl>
						</div>
						<div class="postright">
							<h3>Regeln</h3>
							<div class="postmsg">
								{$entry.message}
							</div>
							<div class="postsignature postmsg"><hr /></div>
						</div>
					</div>
				</div>
				<div class="inbox">
					<div class="postfoot clearb">
						<div class="postfootright">
							<ul>
								<li><span><a href="{$boardUrl}viewtopic.php?pid={$entry.id}">Zum Beitrag</a></span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	{/foreach}
</div>
