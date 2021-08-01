<?php

$vanConversationData = file_get_contents('JSONdata/van.json', 'r');
$vanConversationDataArray = json_decode($vanConversationData, true);

echo '<div>
		<a href="marvinLogLoader.php"><button type="button">Marvin</button></a>&emsp;
		<a href="paulLogLoader.php"><button type="button">Paul</button></a>&emsp;
		<a href="vanLogLoader.php"><button type="button">Van</button></a><br>
	    <a href="svenLogLoader.php"><button type="button">Sven</button></a>&emsp;
		<a href="manuelLogLoader.php"><button type="button">Manuel</button></a>&emsp;
		<a href="groupLogLoader.php"><button type="button">Tellermitte Group</button></a>
	</div>';
	
$output = '<div style="display: table; width: 720px">';

$output .= '<table style="border:1px solid; font-size: 18pt;>';

for($i = count($vanConversationDataArray)-1; $i >= 0 ; $i--) {
	foreach($vanConversationDataArray[$i] as $key => $value) {

		switch ($key){
			case 'displayName':
				if (!$value) {
					$output .= '<tr><td style="border:1px solid; font-weight: bold"> Tarik </td></tr>';
				}
				else {
					$output .= '<tr><td style="border:1px solid; font-weight: bold">'.$value.'</td></tr>';
				}
				break;
			case 'originalarrivaltime':
				$output .= '<tr><td style="border:1px solid; color: red">'.$value.'</td></tr>';
				break;
			case 'content':
				$output .= '<tr><td style="border:1px solid; background-color: rgba(5,5,5,0.3); padding-left: 35px;">'.$value.'</td></tr>';
				break;
			default: 
				break;
		}		
	}
}
$output .= '</table></div>';
echo $output;
?>