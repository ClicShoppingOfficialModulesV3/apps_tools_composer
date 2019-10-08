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

  use ClicShopping\OM\CLICSHOPPING;
  use ClicShopping\OM\HTML;
  use ClicShopping\OM\Registry;

  $CLICSHOPPING_AppComposer = Registry::get('AppComposer');
  $CLICSHOPPING_Template = Registry::get('TemplateAdmin');
  $CLICSHOPPING_Page = Registry::get('Site')->getPage();
/*
  $CLICSHOPPING_Composer = Registry::get('Composer');
  var_dump($CLICSHOPPING_Composer->update());
*/

  $json_file = CLICSHOPPING::getConfig('dir_root', 'Shop') . 'composer.json';
  $json_content = file_get_contents($json_file);
  $json_array = json_decode($json_content, true);
?>
<div class="contentBody">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-block headerCard">
        <div class="row">
          <span
            class="col-md-1"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . '/categories/composer.png', $CLICSHOPPING_AppComposer->getDef('heading_title'), '40', '40'); ?></span>
          <span
            class="col-md-5 pageHeading"><?php echo '&nbsp;' . $CLICSHOPPING_AppComposer->getDef('heading_title'); ?></span>
        </div>
      </div>
    </div>
  </div>
  <div class="separator"></div>
  <table border="0" width="100%" cellspacing="0" cellpadding="2">
    <td>
      <table class="table table-sm table-hover table-striped">
        <thead>
        <tr class="dataTableHeadingRow">
          <th><?php echo $CLICSHOPPING_AppComposer->getDef('text_heading_library'); ?></th>
          <th><?php echo $CLICSHOPPING_AppComposer->getDef('text_heading_version'); ?></th>
        </tr>
        </thead>
        <tbody>
<?php
        foreach ($json_array as $k => $v) {
          if (is_array($v)) {
            foreach ($v as $name => $value) {
?>
        <tr class="dataTableRow">
          <td><?php echo $name; ?></td>
          <td><?php echo $value; ?></td>
        </tr>
<?php
            }
          }
        }
?>
        </tbody>
      </table>
    </td>
  </table>
</div>