<?php
/**
 * @file
 * Contains \Drupal\mgm_tools_display\Plugin\Layout\MultiColumnDisplay
 */

namespace Drupal\mgm_tools_display\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\layout_plugin\Plugin\Layout\LayoutBase;

class MultiColumnDisplay extends LayoutBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function buildRegions(array $build) {
    // Append the prefix before buildRegions.
    $build['landing-top']['#prefix'] = '<div class="landing-display-' . $class . '">';

    // Build the regions via PageBlockDisplayVariant::buildRegions.
    $build = parent::buildRegions($build);

    // Add suffix for wrapper after buildRegions.
    $build['landing-bottom']['#suffix'] = '</div>';

    return $build;
  }
  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $configuration = $this->getConfiguration();
    // Allow to configure the variant class, even when adding a new display.
    $form['extra_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Extra classes'),
      '#description' => $this->t('Configure the wrapper class that will be used for this display.'),
      '#default_value' => $configuration['extra_classes'],
    ];
    $form['row_classes'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Row classes'),
        '#description' => $this->t('Configure the wrapper class for each enclosing row. For example, the default is "row" in order to work with ZURB Foundation themes.'),
        '#default_value' => $this->configuration['row_classes'] ?: 'row',
    ];
    $form['top_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Top classes'),
      '#description' => $this->t('This class affects only the top row, which has no default classes other than "region-top."'),
      '#default_value' => $configuration['top_classes'],
    ];
    $form['primary_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Primary classes'),
      '#description' => $this->t('Class for first section, if added, within the primary row.'),
      '#default_value' => $configuration['primary_classes'],
    ];
    $form['primary_second_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Primary Second classes'),
      '#description' => $this->t('Class for second section, if added, within the primary row.'),
      '#default_value' => $configuration['primary_second_classes'],
    ];
    $form['primary_third_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Primary (Third) classes'),
      '#description' => $this->t('Class for third section, if added, within the primary row.'),
      '#default_value' => $configuration['primary_third_classes'],
    ];
    $form['middle_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Middle classes'),
      '#description' => $this->t('Class for middle section, if added.'),
      '#default_value' => $configuration['middle_classes'],
    ];
    $form['bottom_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Bottom classes'),
      '#description' => $this->t('Class for first section, if added, within the bottom row.'),
      '#default_value' => $configuration['bottom_classes'],
    ];
    $form['bottom_second_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Bottom (Second) classes'),
      '#description' => $this->t('Class for second section, if added, within the bottom row.'),
      '#default_value' => $configuration['bottom_second_classes'],
    ];
    $form['bottom_third_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Bottom (Third) classes'),
      '#description' => $this->t('Class for third section, if added, within the bottom row.'),
      '#default_value' => $configuration['bottom_third_classes'],
    ];
    return $form;
  }

  /**
   * @inheritDoc
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);

    $this->configuration['extra_classes'] = $form_state->getValue('extra_classes');
    $this->configuration['row_classes'] = $form_state->getValue('row_classes');
    $this->configuration['top_classes'] = $form_state->getValue('top_classes');
    $this->configuration['primary_classes'] = $form_state->getValue('primary_classes');
    $this->configuration['primary_second_classes'] = $form_state->getValue('primary_second_classes');
    $this->configuration['primary_third_classes'] = $form_state->getValue('primary_third_classes');
    $this->configuration['middle_classes'] = $form_state->getValue('middle_classes');
    $this->configuration['bottom_classes'] = $form_state->getValue('bottom_classes');
    $this->configuration['bottom_second_classes'] = $form_state->getValue('bottom_second_classes');
    $this->configuration['bottom_third_classes'] = $form_state->getValue('bottom_third_classes');
  }
}
?>
