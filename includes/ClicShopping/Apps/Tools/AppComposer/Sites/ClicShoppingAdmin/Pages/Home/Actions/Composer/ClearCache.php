<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT
   * @licence MIT - Portion of osCommerce 2.4
   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\Tools\AppComposer\Sites\ClicShoppingAdmin\Pages\Home\Actions\Composer;

  class ClearCache
  {
    public function execute()
    {
      $CLICSHOPPING_Composer = Registry::get('Composer');

      if (isset($_GET['Composer']) && isset($_GET['ClearCache'])) {
        $CLICSHOPPING_Composer->clearCache();
      }
    }
  }