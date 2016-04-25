/**
 * @file
 * Contains Javascript required to format the form
 */

(function ($, Drupal) {

  "use strict";

  Drupal.behaviors.MGMToolsSlideshow = {
    attach: function (context, settings) {
      settings.MGMToolsSlideshow.slick.autoplaySpeed = 4000;
      $('.mgm-tools-slideshow > .field-items').slick(settings.MGMToolsSlideshow.slick);
    }
  };

}(jQuery, Drupal));
