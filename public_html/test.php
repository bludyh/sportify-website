<!--This file is for test purpose only-->
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
    spl_autoload_register(function ($class_name) {
        $file = dirname(filter_input(INPUT_SERVER, "DOCUMENT_ROOT")) . "/lib/classes/" . $class_name . ".php";
        if (file_exists($file)) {
            require_once($file);
        }
    });
    
$result = Database::ExecuteReader("SELECT * FROM rental WHERE visitor_id=:visitor_id", [":visitor_id" => 13]);

echo "<pre>"; print_r($result); echo "</pre>";
//
//$purchases = [];
//
//for ($i = 0; $i < count($result); $i++) {
//    $item = (object) Database::ExecuteReader("SELECT * FROM item WHERE item_id=:item_id", [":item_id" => $result[$i]["item_id"]])[0];
//    $item->store = (object) Database::ExecuteReader("SELECT * FROM store WHERE store_id=:store_id", [":store_id" => $item->store_id])[0];
//    
//    $purchases[$result[$i]["purchase_time"]][] = [
//        "item" => $item,
//        "purchase_quantity" => $result[$i]["purchase_quantity"]
//    ];
//}
//
//foreach ($purchases as $time => $purchaseDetails) {
//    echo $time;
//    echo "<pre>"; print_r($purchaseDetails); echo "</pre>";
//}


////Insert map coordinates into database
//if (isset($_POST)) {
//    $l = $_POST["left"];
//    $t = $_POST["top"];
//    $location = "Zone F";
//    $map_coords = '["' . $l . '","' . $t . '"]';
//    
//    $sql = "INSERT INTO camping_spot (location, map_coords) VALUES (:location, :map_coords)";
//    $param = array(":location" => $location, ":map_coords" => $map_coords);
//    Database::ExecuteNonQuery($sql, $param);
//    
//    echo($l . ":" . $t);
//    
//}
//    function ValidateCookie() {
//        if (isset($_COOKIE["remember-me"])) {
//            $visitorId = Database::ExecuteReader("SELECT visitor_id FROM auth_tokens WHERE identifier=:identifier", array(":identifier" => $_COOKIE["identifier"]))[0]["visitor_id"];
//            $visitor = new Visitor(array("visitor_id" => $visitorId));
//            if ($visitor->visitorId != NULL) {
//                $expire = Database::ExecuteReader("SELECT expire_date FROM auth_tokens WHERE identifier=:identifier", array(":identifier" => $_COOKIE["identifier"]))[0]["expire_date"];
//                if ($expire > time()) {
//                    $token = Database::ExecuteReader("SELECT token_key FROM auth_tokens WHERE identifier=:identifier", array(":identifier" => $_COOKIE["identifier"]))[0]["token_key"];
//                    $hashedToken = hash("sha256", $_COOKIE["token"]);
//                    if (hash_equals($token, $hashedToken)) {
//                        return TRUE;
//                    }
//                }
//            }
//        }
//        return FALSE;
//    }
//
//    var_dump(ValidateCookie());
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="js/jquery.js"></script>
        <style>
            #map {
                position: relative;
            }
            .overlay {
                position: absolute;
                z-index: 10;
            }
/*            input[type="checkbox"] {
                display: none;
            }*/
            .marker {
                width: 64px;
                height: 64px;
                transition: 0.3s ease;
                cursor: pointer;
            }
            .marker:hover {
                transform: scale(1.25, 1.25);
            }
            
        </style>
    </head>
    <body>
        <div id="map">
            <div id="base">
                <img src="images/map.png" width="1170px"/>
            </div>
            <div id="overlay">
            </div>
        </div>
        
        Script to get pixel coordinates inside an image
        <script type="text/javascript">
            $(document).ready(function() {
                $('img').click(function(e) {
                    var offset = $(this).offset();
                    var left = Math.floor(e.pageX - offset.left - 32);
                    var top = Math.floor(e.pageY - offset.top - 64);
                    
                    $.post("test.php", {left: left, top: top}).done(function(data){alert(data);});
                });
            });
        </script>

        <script type="text/javascript">
            $("input:checkbox").on('click', function() {
                // in the handler, 'this' refers to the box clicked on
                var $box = $(this);
                if ($box.is(":checked")) {
                  // the name of the box is retrieved using the .attr() method
                  // as it is assumed and expected to be immutable
                  var group = "input:checkbox[name='" + $box.attr("name") + "']";
                  // the checked state of the group/box on the other hand will change
                  // and the current value is retrieved using .prop() method
                  $(group).prop("checked", false);
                  $box.prop("checked", true);
                } else {
                  $box.prop("checked", false);
                }
              });
        </script>
    </body>
</html>-->