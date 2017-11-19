<ul>
<?php
include('libs/db_get_discutions_by_theme.lib.php');
foreach($discutions as $discution){?>
	<li><a href="?action=read&id=<? echo $discution['_id']; ?>">
		<?echo $discution['subject'];?>
		</a>
	</li>
<?}?>
</ul>