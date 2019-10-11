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

  class Update extends \ClicShopping\OM\PagesActionsAbstract
  {
    public function execute()
    {
      $CLICSHOPPING_AppComposer = Registry::get('AppComposer');
      $CLICSHOPPING_Composer = Registry::get('Composer');

      if(isset($_GET['Update'])) {
        if (isset($_POST['library']) && !is_null($_POST['library'])) {
          $library = HTML::sanitize($_POST['library']);

          $result = $CLICSHOPPING_Composer->update($library);
        } else {
          $result = $CLICSHOPPING_Composer->update();
        }

        $CLICSHOPPING_AppComposer->redirect('AppComposer&message=' . rawurlencode($result));
      }
    }
  }