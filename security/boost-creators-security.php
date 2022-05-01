<?php

  /**
   * Remove meta generator from the head
   * @return String    Empty string
   */
  function bc_remove_version_generator() {
    return '';
  }
  add_filter('the_generator', 'bc_remove_version_generator');

?>