<?php

require_once 'connect.php';

$sql = "DESCRIBE recipes type";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$type = $row['Type'];
preg_match_all("/'([^']+)'/", $type, $enum);
$enum = $enum[1];

echo "<select name='recipetype'>";
foreach ($enum as $value) {
    echo "<option value='$value'>$value</option>";
}
echo "</select>";

$conn->close();
?>
