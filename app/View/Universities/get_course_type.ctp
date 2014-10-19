<?php foreach ($ctype as $key => $value): ?>
<option value="<?php echo $key; ?>"><?php switch ($value) {
						case 1:
							$typ='Artystyczne'; break;
						case 2:
							$typ='Ekonomiczne'; break;
						case 3:
							$typ='Humanistyczne'; break;
						case 4:
							$typ='Przyrodnicze'; break;
						case 5:
							$typ='Techniczne'; break;
						case 6:
							$typ='Inne'; break;
						default:
							$typ = 'Różne'; break;
					}
					echo $typ; ?></option>
<?php endforeach; ?>