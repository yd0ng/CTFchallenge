<?php
libxml_disable_entity_loader(false);
$data = @file_get_contents('php://input');
$resp = '';
//$flag='flag{d710ef49-3f46-4792-9a26-68835ff90c02}';
if($data != false){
    $dom = new DOMDocument();
    $dom->loadXML($data, LIBXML_NOENT);
    ob_start();
    $res  = $dom->textContent;
    $resp = ob_get_contents();
    ob_end_clean();
    if ($res){
        die($res);
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>welcome</title>
    <link rel="stylesheet" href="./style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body class="contactBody">
<div class="wrapper">
    <div class="title">


    </div>


    <form method="post" class="form">
        <h1 id="title">请输入姓名</h1>
        <br/>
        <br/>
        <br/>
        <input type="text" class="name entry " id="name" name="name" placeholder="Your Name"/>
    </form>
    <button class="submit entry" onclick="func()">Submit</button>

    <div class="shadow"></div>
</div>

</body>
</html>
<script type="text/javascript">
    function play() {
        return false;
    }
    function func() {
        // document.getElementById().value
        var xml = '' +
            '<\?xml version="1.0" encoding="UTF-8"\?>' +
            '<feedback>' +
            '<author>' + document.getElementById('name').value+ '</author>' +
            '</feedback>';
        console.log(xml);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4) {
                // console.log(xmlhttp.readyState);
                // console.log(xmlhttp.responseText);
                var res = xmlhttp.responseText;
                document.getElementById('title').textContent = res
            }
        };
        xmlhttp.open("POST", "index.php", true);
        xmlhttp.send(xml);
        return false;
    };
</script>
</body>
</html>