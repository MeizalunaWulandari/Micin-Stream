<?php foreach ($status as $key => $val): ?>
	<?php 
		if ($val->url === 'http://104.251.123.41/A%20Light%20That%20Never%20Comes-Linkin%20Park%20And%20Steve%20Aoki.mp4') {
			return $key;

			var_dump($key);
		}
	?>
<?php endforeach ?>