<?php

/**
 * Paciente form.
 *
 * @package    clinicapp
 * @subpackage form
 */
class PacienteForm extends BasePacienteForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['fecha_nacimiento'] = new sfWidgetFormInput(array('type' => 'date'));
    $this->widgetSchema['pais_codigo']->setAttribute('placeholder', 'Codigo ISO de 3 letras, ej: COL');

    $this->validatorSchema['documento'] = new sfValidatorRegex(
      array('pattern' => '/^[0-9]{5,20}$/'),
      array('invalid' => 'El documento debe tener entre 5 y 20 digitos.')
    );
    $this->validatorSchema['email'] = new sfValidatorEmail(
      array('required' => false),
      array('invalid' => 'El correo electronico no es valido.')
    );
    $this->validatorSchema['telefono'] = new sfValidatorRegex(
      array('pattern' => '/^[0-9 +\-]{7,20}$/', 'required' => false),
      array('invalid' => 'El telefono solo admite digitos, espacios, + y -.')
    );
    $this->validatorSchema['fecha_nacimiento'] = new sfValidatorDate(
      array('required' => false, 'max' => time()),
      array('max' => 'La fecha de nacimiento no puede ser futura.')
    );
    $this->validatorSchema['pais_codigo'] = new sfValidatorRegex(
      array('pattern' => '/^[A-Za-z]{3}$/', 'required' => false),
      array('invalid' => 'Use el codigo ISO de 3 letras del pais (ej: COL).')
    );

    $this->widgetSchema->setLabels(array(
      'documento'        => 'Documento de identidad',
      'nombre'           => 'Nombres',
      'apellido'         => 'Apellidos',
      'fecha_nacimiento' => 'Fecha de nacimiento',
      'email'            => 'Correo electronico',
      'telefono'         => 'Telefono',
      'pais_codigo'      => 'Pais (codigo ISO)',
    ));

    $this->aplicarEstiloBootstrap();
  }
}
