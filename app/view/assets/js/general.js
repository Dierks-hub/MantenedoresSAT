var loader_count = 0;
function ShowLoader() {
  if (loader_count == 0) {
    var loader = '<div id="loader">';
    loader += '<div class="loader-wrapper">';
    loader += '    <i class="fas fa-5x fa-cog fa-spin-1"></i>';
    // loader += '    <img class="ml-3" src="img/campus_unap_c_white.png">';
    loader += "  </div>";
    loader += "</div>";
    $("body").append(loader);
    $("#loader").fadeIn();
  }
  loader_count++;
}
function HideLoader() {
  loader_count--;
  if (loader_count == 0) {
    $("#loader").fadeOut(function () {
      $(this).remove();
    });
  }
}

function openModal(id,size,content,centered){
  var modalSize = '';
  var modalSizePx = '';
  var modalCentered = '';
  if(size=='sm' || size=='md' || size=='lg' || size=='xl'){
      modalSize = "modal-"+size;
  }else{
      if(size!=''){ 
          if(size.indexOf('px')!=-1){
              modalSizePx = "width:"+size;
          }
      }
  }
if(centered==1){
  modalCentered = "modal-dialog-centered";
}else{
  modalCentered = "";
}

  var modal='';
  modal+='    <div class="modal fade" id='+id+' tabindex="-1" role="dialog" aria-labelledby="'+id+'Label" data-keyboard="true" data-backdrop="true">';
  modal+='      <div class="modal-dialog '+modalCentered+' '+modalSize+'" role="document" style="'+modalSizePx+'">';
  modal+='        <div class="modal-content">';
  modal+=			content;
  modal+='        </div>';
  modal+='      </div>';
  modal+='    </div>';        
  $('body').append(modal);
  var modals = $('.modal').length;
  var zindexModal = 1050+((10*(parseInt(modals)-1)));
  var newmodal = $('#'+id).css("z-index",zindexModal);
 // console.log(zindexModal);
  $('.modal').unbind('shown.bs.modal');
  $('.modal').unbind('hidden.bs.modal');
  $('.modal').on('shown.bs.modal', function() {
      $('body').css('padding-right','-17px');
      var backdrops = $('.modal-backdrop ').length;
      var className = $('.modal-backdrop').attr('class');
      $("[class='modal-backdrop fade in']").addClass("backdrop_"+backdrops);
      var zindex = $("[class='modal-backdrop fade in backdrop_"+backdrops+"']").css("z-index");
      var modal = $("[class='modal fade in']").css("z-index");
      var zindexNumber = (parseInt(zindex))+((10*(parseInt(backdrops)-1)+1));
      $("[class='modal fade in']").addClass("modal_"+backdrops);
      //console.log(zindexNumber);
      $("[class='modal-backdrop fade in backdrop_"+backdrops+"']").css("cssText", "opacity: 0.5 !important; z-index:"+zindexNumber);
  });
  $('.modal').on('hide.bs.modal', function() {
     var backdrops = $('.modal-backdrop ').length;
     $("[class='modal-backdrop fade in backdrop_"+backdrops+"']").css("cssText", "opacity: 0 !important;"); 
  });
  $('.modal').on('hidden.bs.modal', function() {
     var className = $(this).attr('class');
     var nextIndex = className.slice(-1)-1;
     $(this).remove();    
     if($('.modal').length>0){
         $('body').addClass('modal-open');
     }
     if(nextIndex>0){
         $("[class='modal fade in modal_"+nextIndex+"']").attr("tabindex","-1");
     }
  });
  $('#'+id).modal('show');
}