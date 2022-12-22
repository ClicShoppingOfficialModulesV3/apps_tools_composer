<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\Tools\AppComposer\Sites\ClicShoppingAdmin\Pages\Home\Actions\Configure;

  use ClicShopping\OM\Registry;

  class Process extends \ClicShopping\OM\PagesActionsAbstract
  {
    public function execute()
    {
      $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
      $CLICSHOPPING_AppComposer = Registry::get('AppComposer');

      $current_module = $this->page->data['current_module'];

      $m = Registry::get('AppComposerAdminConfig' . $current_module);

      foreach ($m->getParameters() as $key) {
        $p = mb_strtolower($key);

        if (isset($_POST[$p])) {
          $CLICSHOPPING_AppComposer->saveCfgParam($key, $_POST[$p]);
        }
      }

      $CLICSHOPPING_MessageStack->add($CLICSHOPPING_AppComposer->getDef('alert_cfg_saved_success'), 'success', 'AppComposer');

      $CLICSHOPPING_AppComposer->redirect('Configure&module=' . $current_module);
    }
  }
