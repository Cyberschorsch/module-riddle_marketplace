<?php

/**
 * @file
 * Definition of \Drupal\riddle_marketplace\Plugin\CKEditorPlugin\RiddleButton.
 */

namespace Drupal\riddle_marketplace\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginInterface;
use Drupal\ckeditor\CKEditorPluginButtonsInterface;
use Drupal\Component\Plugin\PluginBase;
use Drupal\editor\Entity\Editor;
use Drupal\Core\Url;
use Drupal\ckeditor\CKEditorPluginBase;

/**
 * Defines the "RiddleButton" plugin.
 *
 * @CKEditorPlugin(
 *   id = "RiddleButton",
 *   label = @Translation("RiddleButton")
 * )
 */
class RiddleButton extends CKEditorPluginBase implements CKEditorPluginInterface, CKEditorPluginButtonsInterface {

  /**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::getDependencies().
   */
  function getDependencies(Editor $editor) {
    return array();
  }

  /**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::getLibraries().
   */
  function getLibraries(Editor $editor) {
    return array();

  }

  /**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::isInternal().
   */
  function isInternal() {
    return FALSE;
  }

  /**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::getFile().
   */
  function getFile() {
    return drupal_get_path('module', 'riddle_marketplace') . '/src/Plugin/CKEditorPlugin/editor_plugin.js';
  }

  /**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginButtonsInterface::getButtons().
   */
  function getButtons() {

    return array(
      'RiddleButton' => array(
        'label' => 'Riddles',
        'image' => drupal_get_path('module', 'riddle_marketplace') . '/images/riddle.jpg',
        'image_alternative' => 'Riddles',
        'attributes' => array(),
      )
    );
  }

  /**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::getConfig().
   */
  public function getConfig(Editor $editor) {
    $riddleFeedService = \Drupal::service('riddle_marketplace.feed');

    return array('data' => json_encode($riddleFeedService->getFeed()));
  }

  /**
   * Gets the plugin_id of the plugin instance.
   *
   * @return string
   *   The plugin_id of the plugin instance.
   */
  public function getPluginId() {
    return 'RiddleButton';
  }

  /**
   * Gets the definition of the plugin implementation.
   *
   * @return array
   *   The plugin definition, as returned by the discovery object used by the
   *   plugin manager.
   */
  public function getPluginDefinition() {
    // TODO: Implement getPluginDefinition() method.
  }
}
