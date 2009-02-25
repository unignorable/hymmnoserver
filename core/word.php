<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<?php include 'common/constants.xml'; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>HYMMNOSERVER - Word - ChronicleKey</title>
		<?php include 'common/resources.xml'; ?>
	</head>
	<body style="width: 500px;">
		<?php
			$word = $_GET['word'];
			if($word == NULL || trim($word) == ''){
				echo 'No word specified.';
				exit();
			}
			$dialect = $_GET['dialect'];
			if($dialect == NULL || trim($dialect) == '' || !is_numeric(trim($dialect))){
				echo 'No dialect specified.';
				exit();
			}
			$word = trim($word);
			$dialect = intval(trim($dialect));
			
			require '/home/flan/public_html/hymmnoserver.gobbledygook';
			if ($mysqli->connect_error) {
				printf("Connection failed: %s.", mysqli_connect_error());
				exit();
			}
			
			#Read the requested word from the database.
			$stmt = $mysql->prepare("SELECT word, meaning_english, meaning_japanese, kana, school, romaji, description, class FROM hymmnos WHERE word = ? AND school = ? LIMIT 1");
			$stmt->bind_param("si", $word, $dialect);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->num_rows != 1){
				echo 'Unknown word specified.';
				exit();
			}
			$stmt->bind_result($word, $meaning_english, $meaning_japanese, $kana, $dialect, $romaji, $notes, $class);
			$stmt->fetch();
			$stmt->free_result();
			$stmt->close();
			
			#Read all related words from the database.
			$stmt = $mysql->prepare("SELECT destination, destination_school FROM hymmnos_mapping WHERE source = ? AND source_school = ? ORDER BY destination ASC");
			$stmt->bind_param("si", $word, $dialect);
			$stmt->execute();
			$stmt->store_result();
			
			$links = array();
			$stmt->bind_result($link, $l_dialect);
			while($stmt->fetch()){
				array_push($links, array($link, $l_dialect));
			}
			
			$stmt->free_result();
			$stmt->close();
			
			$mysql->close();
		?>
		<?php include 'common/word.xml'; ?>
		<?php
			$footer_word = true;
			include 'common/footer.xml';
		?> 
	</body>
</html>
