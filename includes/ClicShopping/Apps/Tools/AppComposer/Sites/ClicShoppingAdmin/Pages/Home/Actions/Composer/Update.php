<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\Tools\AppComposer\Sites\ClicShoppingAdmin\Pages\Home\Actions\Composer;

  use ClicShopping\OM\HTML;

  class Update
  {
    public function execute()
    {
      $CLICSHOPPING_Composer = Registry::get('Composer');

      if (isset($_GET['AppComposer']) && isset($_GET['update'])) {
        $file = HTML::sanitize($_POST['file']);

        $CLICSHOPPING_Composer->update($file);
      }
    }
  }