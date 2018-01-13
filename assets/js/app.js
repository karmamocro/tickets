$(() => {
    $(".button-collapse").sideNav();
    $('select').material_select();
});

// loading screen handler als het langer dan een seconde inlaad.
var timer;
 $(document).ajaxStart(function() {

   timer && clearTimeout(timer);
     timer = setTimeout(function()
     {
         $(".wait").removeClass("hide");
     },
     1000);
 });

 $(document).ajaxStop(function() {
   clearTimeout(timer);
   $(".wait").addClass("hide");
 });



//  menu section
let clicked = false;
$("#expand_menu").on("click", () => {
  if(!clicked){
    $("nav").css({"height": "128px", "background-color": "#0d47a1"});
    $("#expand_menu").removeClass("topRight");
    $("#expand_menu").addClass("bottomRight");
    clicked = true;
    setTimeout(function(){
      $(".icon_menu").css("transform", "rotate(180deg)");
    }, 500);
    $(".menuText").css("display", "block");
    $('#expand_menu').append('<i class="material-icons trans icon_menu">expand_more</i>')
    $("#expand_menu").css("background", "#2979ff");
  }else {
    $("nav").css({"height": "64px", "background-color": "#448aff"});
    $("#expand_menu").removeClass("topRight");
    $("#expand_menu").addClass("bottomRight");
    clicked = false;
    setTimeout(function(){
      $(".icon_menu").css("transform", "rotate(0deg)");
    }, 500);
    $(".menuText").css("display", "none");
    $('#expand_menu i').last().fadeOut( "fast", () => {
      $('#expand_menu i').last().remove();
    });
    $("#expand_menu").css("background", "#1a237e");

  }
});

// handeling links on table rows
$('tr.homeLink').on('click', (ev) => {
    window.location = ev.currentTarget.id;
});


// making the files that will be uploaded global
var files;
var fileNames = "";

// Upload btn text update
$('input#uploadedFile').change(function(){
    files = $(this)[0].files;
    $("#fileVal").html("");
    $.each(files, (index, value) => {
      $("#fileVal").append(` ${value.name} |`);
      fileNames += `${value.name}\n`;
    });
    if ($("#fileVal").html().length >= 85) {
      $("#fileVal").html(`${files.length} documenten gekozen`);
      $("#fileVal").attr( "data-tooltip", fileNames );
      $("#fileVal").tooltip();
    }
});


// Ajax Handler for adding a new ticket
$("#newTicketForm").on("submit", (ev) => {
  ev.preventDefault(); // preventing the submit just in case.

  // setting some vars
  let formData = new FormData($("#newTicketForm")[0]);
  let action = $("#newTicketForm").attr("action") ;
  let method = $("#newTicketForm").attr("method") ;


  // creating the ajax function
  $.ajax({
    url: action,
    type: method,
    mimeType: "multipart/form-data",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    error: (jqxhr, textStatus, errorThrown) => {
      console.log(jqxhr);
      console.log(textStatus);
      console.log(errorThrown);
    },
    success: (data) => {
      let info = JSON.parse(data);
      if (info.success === true) {
        swal({
          title: "Gelukt!",
          text: "Uw ticket is aangemaakt!",
          type: "success",
          confirmButtonText: "Ga terug"
        },
        function(){
          window.location = "index";
        });
      }
    }
  });

});

// Ajax Handler for responding to a ticket
$("#reactieForm").on("submit", (ev) => {
  ev.preventDefault(); // preventing the submit just in case.

  // setting some vars
  let formData = new FormData($("#reactieForm")[0]);
  let action = $("#reactieForm").attr("action") ;
  let method = $("#reactieForm").attr("method") ;
  let slug = $("#slug").val();


  // creating the ajax function
  $.ajax({
    url: action,
    type: method,
    mimeType: "multipart/form-data",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    error: (jqxhr, textStatus, errorThrown) => {
      console.log(jqxhr);
      console.log(textStatus);
      console.log(errorThrown);
    },
    success: (data) => {
      console.log(data);
      let info = JSON.parse(data);
      console.log(info);
      if (info.success === true) {
        swal({
          title: "Gelukt!",
          text: "Uw reactie is verstuurd!",
          type: "success",
          confirmButtonText: "Ga terug"
        },
        function(){
          window.location = "ticket.php?view="+slug;
        });
      }
    }
  });

});
