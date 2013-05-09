{function nav level=0}
<ul>
	{foreach $entries as $entry}
		{$classes = null}
		{if $entry.entry.isFirst}
			{$classes = "`$classes`first "}
		{/if}
		{if $entry.entry.isLast}
			{$classes = "`$classes`last "}
		{/if}
		{if $entry.entry.isActive}
			{$classes = "`$classes`isactive"}
		{/if}
		<li{if $classes} class="{$classes|trim}"{/if}>
			<a href="{$entry.entry.link}">{$entry.entry.title}</a>
		</li>
	{/foreach}
</ul>
	{/function}

{nav entries=$nav.entries}


