<?php

/**
 * Project form base class.
 *
 * @package    clinicapp
 * @subpackage form
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
  }

  /**
   * Agrega la clase form-control de Bootstrap a todos los widgets visibles.
   */
  protected function aplicarEstiloBootstrap()
  {
    foreach ($this->widgetSchema->getFields() as $nombre => $widget)
    {
      if (!$widget instanceof sfWidgetFormInputHidden)
      {
        $clase = trim($widget->getAttribute('class').' form-control');
        $widget->setAttribute('class', $clase);
      }
    }
  }
}
