<?php

/**
 * Cita form.
 *
 * @package    clinicapp
 * @subpackage form
 */
class CitaForm extends BaseCitaForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);

    $this->widgetSchema['paciente_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Paciente',
      'add_empty' => 'Seleccione un paciente',
      'order_by'  => array('apellido', 'asc'),
    ));
    $this->widgetSchema['medico_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Medico',
      'add_empty' => 'Seleccione un medico',
      'order_by'  => array('apellido', 'asc'),
    ));
    $this->widgetSchema['fecha'] = new sfWidgetFormInput(array('type' => 'date'));
    $this->widgetSchema['hora'] = new sfWidgetFormInput(array('type' => 'time'));
    $this->widgetSchema['estado'] = new sfWidgetFormChoice(array(
      'choices' => Cita::getEstados(),
    ));
    $this->widgetSchema['motivo']->setAttribute('rows', 3);

    $this->validatorSchema['estado'] = new sfValidatorChoice(array(
      'choices' => array_keys(Cita::getEstados()),
    ));

    // Una cita nueva no puede agendarse en el pasado
    if ($this->isNew())
    {
      $this->validatorSchema['fecha'] = new sfValidatorDate(
        array('min' => strtotime('today')),
        array('min' => 'La fecha de la cita no puede ser anterior a hoy.')
      );
    }

    $this->widgetSchema->setLabels(array(
      'paciente_id' => 'Paciente',
      'medico_id'   => 'Medico',
      'fecha'       => 'Fecha',
      'hora'        => 'Hora',
      'motivo'      => 'Motivo de la consulta',
      'estado'      => 'Estado',
    ));

    $this->aplicarEstiloBootstrap();
  }
}
