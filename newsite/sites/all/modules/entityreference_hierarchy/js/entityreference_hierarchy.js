/**
* @file
* Handles the expand / retract buttons
*
* This file handles the showing/fiding of the expand / retract buttons.
*/

(function($) {
  // If ajax is enabled.
  if (Drupal.ajax) {

    $(document).ready(function () {
      bindclicks();
    });

    $(document).ajaxComplete(function () {
      bindclicks();
    });

  };

function bindclicks() {

  $('a.entityreference_hierarchy_ajax_show').bind('click', function(){
    var bsid = $(this).attr('id');
    $(this).hide();
    bhid = bsid.replace('show', 'hide');
    $('#' + bhid).show();
  })

  $('a.entityreference_hierarchy_ajax_hide').bind('click', function(){
    var bhid = $(this).attr('id');
    ehid = bhid.replace('ajax_hide', 'entityreference_hierarchy');
    $('#' + ehid).html('');
    $(this).hide();
    bsid = bhid.replace('hide', 'show');
    $('#' + bsid).show();
  })

}

})(jQuery);
