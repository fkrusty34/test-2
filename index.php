<?php
	// открываем файл =)
	$handle = fopen('test.csv', 'r');
	if ($handle !== FALSE) {
		echo '<table border="">';
		$flag = true;
		while (($data = fgetcsv($handle, 0, ';')) !== FALSE) {
			echo '<tr>';
			$num = count($data);
			if ($flag) {
				for ($i = 0; $i < $num; $i++) {
				$str = iconv('windows-1251', 'UTF-8', $data[$i]);
				echo '<th>'.$str.'</th>';
				}
			} else {
				for ($i = 0; $i < $num - 1; $i++) {
				$str = iconv('windows-1251', 'UTF-8', $data[$i]);
				echo '<td>'.$str.'</td>';
				}
			}
			if ($flag)
				$flag = false;
			else {
				$str = iconv('windows-1251', 'UTF-8', $data[$num-1]);
				echo '<td><img src="'.$str.'"></td>';
			}
			echo '</tr>';
		}
		echo '</table>';
		fclose($handle);
	}
?>