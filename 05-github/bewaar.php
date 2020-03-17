<?php
$path = 'fotos/';
$uploadfile = $path . basename($_FILES['fileToUpload']['name']);
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)){
    echo "gelukt";
}
else {
    echo "mislukt";
}

?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>