<?php

  /**
   * Remove meta generator from the head
   * @return String    Empty string
   */
  function we_provide_remove_version_generator() {
    return '';
  }
  add_filter('the_generator', 'we_provide_remove_version_generator');

?>