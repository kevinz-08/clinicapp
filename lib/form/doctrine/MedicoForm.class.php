<?php

/**
 * Medico form.
 *
 * @package    clinicapp
 * @subpackage form
 */
class MedicoForm extends BaseMedicoForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['especialidad'] = new sfWidgetFormChoice(array(
      'choices' => Medico::getEspecialidades(),
    ));

    $this->validatorSchema['especialidad'] = new sfValidatorChoice(array(
      'choices' => array_keys(Medico::getEspecialidades()),
    ));
    $this->validatorSchema['email'] = new sfValidatorEmail(
      array('required' => false),
      array('invalid' => 'El correo electronico no es valido.')
    );

    $this->widgetSchema->setLabels(array(
      'registro_medico' => 'Registro medico',
      'nombre'          => 'Nombres',
      'apellido'        => 'Apellidos',
      'especialidad'    => 'Especialidad',
      'email'           => 'Correo electronico',
    ));

    $this->aplicarEstiloBootstrap();
  }
}
