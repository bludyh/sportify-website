/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $("#modal-trigger").click(function() {
        $("#myModal").css({
            display: "block"
        });
    });

    $(".close").click(function(){
        $("#myModal").css({
            display: "none"
        });
    });
});