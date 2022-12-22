<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  use ClicShopping\OM\HTML;
  use ClicShopping\OM\Registry;

  $CLICSHOPPING_AppComposer = Registry::get('AppComposer');
  $CLICSHOPPING_Template = Registry::get('TemplateAdmin');
  $CLICSHOPPING_Page = Registry::get('Site')->getPage();

  $CLICSHOPPING_Composer = Registry::get('Composer');

  $json_array = $CLICSHOPPING_Composer->getLibrary();
?>
<div class="contentBody">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-block headerCard">
        <div class="row">
          <span class="col-md-1"><?php echo HTML::image($CLICSHOPPING_Template->getImageDirectory() . 'categories/composer.png', $CLICSHOPPING_AppComposer->getDef('heading_title'), '40', '40'); ?></span>
          <span class="col-md-4 pageHeading"><?php echo '&nbsp;' . $CLICSHOPPING_AppComposer->getDef('heading_title'); ?></span>
          <span class="col-md-7 text-end">
            <?php echo '&nbsp;' . HTML::button($CLICSHOPPING_AppComposer->getDef('text_clear_cache'), null, $CLICSHOPPING_AppComposer->link('ClearCache'), 'warning'); ?>
            <?php echo '&nbsp;' . HTML::button($CLICSHOPPING_AppComposer->getDef('text_update_all'), null, $CLICSHOPPING_AppComposer->link('Update'), 'success'); ?>
          </span>

        </div>
      </div>
    </div>
  </div>
  <div class="separator"></div>
<?php
  if ($CLICSHOPPING_Composer->checkComposerInstalled() === false) {
    echo '<div class="alert alert-warning" role="alert">' . $CLICSHOPPING_AppComposer->getDef('text_error_composer') . '</div>';
  }

  if ($CLICSHOPPING_Composer->checkExecEnabled() === false) {
    echo '<div class="alert alert-warning" role="alert">' . $CLICSHOPPING_AppComposer->getDef('text_error_exec') . '</div>';
  }

  if (isset($_GET['message']) && !empty($_GET['message'])) {
    echo '<div class="alert alert-info" role="alert">' . HTML::sanitize($_GET['message']) . '</div>';
  }

?>
  <div class="separator"></div>
    <table class="table table-sm table-hover table-striped">
      <thead>
      <tr class="dataTableHeadingRow">
        <th><?php echo $CLICSHOPPING_AppComposer->getDef('text_heading_library'); ?></th>
        <th><?php echo $CLICSHOPPING_AppComposer->getDef('text_heading_version_installed'); ?></th>
        <th><?php echo $CLICSHOPPING_AppComposer->getDef('text_heading_online_version'); ?></th>
        <th></th>
      </tr>
      </thead>
      <tbody>
    <?php
    if (\is_array($json_array)) {
      $i = 0;
      
      foreach ($json_array as $k => $v) {
        $online_version = $CLICSHOPPING_Composer->checkOnlineVersion($k);
    ?>
        <tr class="dataTableRow">
          <td><?php echo $k; ?></td>
          <td><?php echo $v; ?></td>
          <td><?php echo $online_version; ?></td>
          <td class="text-end">
            <?php
              echo HTML::form('update' . $i++, $CLICSHOPPING_AppComposer->link('Update'));
              echo HTML::hiddenField('library', $k);
              echo HTML::button($CLICSHOPPING_AppComposer->getDef('button_update'), null, null, 'warning', null, 'sm');
            ?>
            </form>
          </td>
        </tr>
    <?php
      }
    }
    ?>
      </tbody>
    </table>
    <div class="separator"></div>
    <div class="alert alert-info" role="alert"><?php echo $CLICSHOPPING_AppComposer->getDef('text_info_warning'); ?></div>
  </div>