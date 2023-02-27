$(document).ready(function () {
   $("button[name='cryptbutton']").click(function () {
      let valtext = $.trim($("#textdecrytp").val());
      let valkey = $.trim($("#textkey").val());

      // Check if valtext not empty
      if (!valtext) {
         return $('#decryptRow').html("<span class='erreur-affiche'>Veuillez renseigner le text à crypter!</span>");
      } else {
         $('#decryptRow').html("");
      }

      // Check if valkey not empty
      if (!valkey) {
         return $('#keyErrorRow').html("<span class='erreur-affiche-key'>Veuillez renseigner la clé!</span>");
      } else {
         $('#keyErrorRow').html("");
      }

      // Ajax call
      $.ajax({
         type: "POST",
         url: "ajax/trtmServ.php",
         data: { "val": valtext.toUpperCase(), "key": valkey.toUpperCase(), "action": "C", "status": "OK" },
         success: function (response) {
            let ret = response.split("|");
            let retour = ret[1].split("=");
            switch (ret.length) {
               case 2:
                  $("#textcrytp").val(retour[1].toUpperCase());
                  $('#errordb').html("");
                  break;
               case 4:
                  $("#textcrytp").val(retour[1].toUpperCase());
                  $('#errordb').html("<span class='erreur-acces-db'>" + ret[3] + "</span>");
                  break;
               default:
                  return "Erreur interne";
            }
         }
      });
   });
   $("button[name='decryptbutton']").click(function () {
      let valtext = $.trim($("#textcrytp").val());
      let valkey = $.trim($("#textkey").val());

      // Check if valtext not empty
      if (!valtext) {
         return $('#cryptRow').html("<span class='erreur-affiche'>Veuillez renseigner le text à décrypter!</span>");
      } else {
         $('#cryptRow').html("");
      }

      // Check if valkey not empty
      if (!valkey) {
         return $('#keyErrorRow').html("<span class='erreur-affiche-key'>Veuillez renseigner la clé!</span>");
      } else {
         $('#keyErrorRow').html("");
      }

      // Ajax call
      $.ajax({
         type: "POST",
         url: "ajax/trtmServ.php",
         data: { "val": valtext.toUpperCase(), "key": valkey.toUpperCase(), "action": "D", "status": "OK" },
         success: function (response) {
            let ret = response.split("|");
            let retour = ret[1].split("=");

            switch (ret.length) {
               case 2:
                  $("#textdecrytp").val(retour[1].toUpperCase());
                  $('#errordb').html("");
                  break;
               case 4:
                  $("#textdecrytp").val(retour[1].toUpperCase());
                  $('#errordb').html("<span class='erreur-acces-db'>" + ret[3] + "</span>");
                  break;
               default:
                  return "Erreur interne";
            }
         }
      });
   });
});
// Reset button
$("button[name='cleanerform']").click(function () {
   $('form').find("textarea, :text").val("").end().find(":checked").prop("checked", false);
});