<!DOCTYPE html>
<html>
	{include file="head.tpl"}
	<body>

		<div class="pun">
			<div class="top-box"><div><!-- Top Corners --></div></div>
			<div class="punwrap">

				<div id="brdheader" class="block">
					<div class="box">
						<div id="brdtitle" class="inbox">
							<h1><a href="/">{$config.meta.title}</a></h1>
							<div id="brddesc"><p>{$config.meta.subTitle}</p></div>
						</div>
						<div id="brdmenu" class="inbox">
							{include file='nav.tpl'}
						</div>
					</div>
				</div>

				<div id="brdmain">

					{include file="notifications.tpl"}

					{$includeTemplate = $page.templateName}
					{include file="pages/$includeTemplate"}

				</div>

				<div id="brdfooter" class="block">
					<div class="box">
						<div id="brdfooternav" class="inbox">
							<div class="conl">
								Copyright &copy; 2013{if $now|date_format:'%Y' > 2013} - {$now|date_format:'%Y'}{/if} ohne-name.de
							</div>
							<div class="conr">

							</div>
							<div class="clearer"></div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</body>
</html>
