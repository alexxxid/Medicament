function modifier(id, newnom) {
  if (Array.isArray(newnom)) {

    var temp = $('#ALED' + id).attr("href").replace("iddefaut", id).replace("newNom", newnom[0]).replace("newFamille", newnom[1]).replace("newPrix", newnom[2]).replace("newContreIndication", newnom[3]).replace("newEffet", newnom[4]);
    // C ICI QUE CA MARCHE PAS ALOOEAZLEAZELAZELAZELAZELAZ ALED 
  } else {
    var temp = $('#ALED' + id).attr("href").replace("iddefaut", id).replace("newNom", newnom);
  }

  $('#ALED' + id).attr("href", temp);
}

(function ($) {
  $(function () {
    $('#loader').toggle();
    $("#loaderContainer").hide();
    $('select').not('.disabled').formSelect();
    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.tabs').tabs();
    $('.dropdown-trigger').dropdown({
      onCloseEnd: function () {
        var idMed = $(this).siblings("select").attr("id");
        alert(idMed);
        // alert($(this).children(".selected").text());
        modifier(idMed, [$('#nomMed' + idMed).val(), $('#familleMed' + idMed).val(), $('#prixMed' + idMed).val(), $('#contreIndicationMed' + idMed).val(), $('#effetMed' + idMed).val()]);

        alert($(this).focusedIndex);
      }
    }
    );
    $(".dropdown-content.select-dropdown").focusout(function () {
      var idMed = $(this).siblings("select").attr("id").replace("familleMed", "");
      // alert($(this).children(".selected").text());
      modifier(idMed, [$('#nomMed' + idMed).val(), $('#familleMed' + idMed).val(), $('#prixMed' + idMed).val(), $('#contreIndicationMed' + idMed).val(), $('#effetMed' + idMed).val()]);
    });
    $('ul.tabs').tabs({
      swipeable: true,
      responsiveThreshold: 1920,
      duration: 200
    });
    $('.modal').modal();
    // $('.modal-trigger').leanModal();
    $('input#input_text, textarea#textarea2').characterCounter();
    $('.fixed-action-btn').floatingActionButton({
      direction: 'top',
      hoverEnabled: false
    });
    $('.tooltipped').tooltip({

    });
    handleDeleteButtons();
    $('.valider').click(function () {
      valid(this);
    });
    var e = $("#submitMedicament");
    e.next().insertBefore(e);

  }); // end of document ready
})(jQuery); // end of jQuery name space 

function fuction() {

}

$(document).ready(function () {
  // M.updateTextFields();
});

