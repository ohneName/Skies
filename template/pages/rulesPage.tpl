<h1>Regeln</h1>

<hr />
Auch wenn wir darauf abzielen, das Spielgefühl aus Vanilla so wenig wie möglich zu verfälschen, sind doch Regeln zum gemeinsamen Spielen nötig. Diese sind hier aufgeführt.
<hr />

<div class="postmsg">
	<p>
		{$rulesPost.message|parseMessage}
	</p>
	<hr />

	<p>
		<h2>Letzte Änderung:</h2>
		{$lastPost.posted|date_format:'%d.%m.%Y'} durch <a href="{$boardUrl}profile.php?id={$lastPost.poster_id}">{$lastPost.poster}</a>
	</p>

	<p>
		{$lastPost.message|parseMessage}
	</p>

</div>
