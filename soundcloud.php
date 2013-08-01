<?php
echo file_get_contents("http://api.soundcloud.com/resolve.json?url=".$_GET["url"]."&client_id=".$_GET["client_id"]);