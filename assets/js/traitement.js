$(document).ready(function () {
   $("button[name='cryptbutton']").click(function () {
      let valtext = $.trim($("#textdecrytp").val());
      let valkey = $.trim($("#textkey").val());


      if (!valtext) {
         return $('#decryptRow').html("<span class='erreur-affiche'>Veuillez renseigner le text à crypter!</span>");
      } else {
         $('#decryptRow').html("");
      }
      if (!valkey) {
         return $('#keyErrorRow').html("<span class='erreur-affiche-key'>Veuillez renseigner la clé!</span>");
      } else {
         $('#keyErrorRow').html("");
      }

      $.ajax({
         type: "POST",
         url: "ajax/trtmServ.php",
         data: { "val": valtext.toUpperCase(), "key": valkey.toUpperCase(), "action": "C", "status": "OK" },
         success: function (response) {
            let ret = response.split("|");
            let retour = ret[0].split("=");
            $('#cryptRow').html("");
            $("#textcrytp").val(retour[1].toUpperCase());
         }
      });
   });
   $("button[name='decryptbutton']").click(function () {
      let valtext = $.trim($("#textcrytp").val());
      let valkey = $.trim($("#textkey").val());

      if (!valtext) {
         return $('#cryptRow').html("<span class='erreur-affiche'>Veuillez renseigner le text à décrypter!</span>");
      } else {
         $('#cryptRow').html("");
      }
      if (!valkey) {
         return $('#keyErrorRow').html("<span class='erreur-affiche-key'>Veuillez renseigner la clé!</span>");
      } else {
         $('#keyErrorRow').html("");
      }

      $.ajax({
         type: "POST",
         url: "ajax/trtmServ.php",
         data: { "val": valtext.toUpperCase(), "key": valkey.toUpperCase(), "action": "D", "status": "OK" },
         success: function (response) {
            let ret = response.split("|");
            let retour = ret[0].split("=");
            $('#decryptRow').html("");
            $("#textdecrytp").val(retour[1].toUpperCase());
         }
      });
   });
});
$("button[name='cleanerform']").click(function () {
   $('form').find("textarea, :text").val("").end().find(":checked").prop("checked", false);
});