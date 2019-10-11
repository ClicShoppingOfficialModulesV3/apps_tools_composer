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

  namespace ClicShopping\Apps\Tools\AppComposer\Sites\ClicShoppingAdmin\Pages\Home\Actions;

  use ClicShopping\OM\Registry;
  use ClicShopping\OM\HTML;

  class ClearCache extends \ClicShopping\OM\PagesActionsAbstract
  {
    public function execute()
    {
      $CLICSHOPPING_AppComposer = Registry::get('AppComposer');
      $CLICSHOPPING_Composer = Registry::get('Composer');

      if(isset($_GET['ClearCache'])) {
        $result = $CLICSHOPPING_Composer->clearCache();
      }

      $CLICSHOPPING_AppComposer->redirect('AppComposer&message=' . rawurlencode($result));
    }
  }