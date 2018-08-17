/**
* @file
* Handles the autoload
*
* This file activates the initial links of the entity label
* to load the first generation of linked entities.
*/

(function($) {
  // If ajax is enabled.
  if (Drupal.ajax) {
    $(document).ready(function () {

      $('.entityreference_hierarchy_entity a.entityreference_hierarchy_ajax_show').click();

    });
  };

})(jQuery);
