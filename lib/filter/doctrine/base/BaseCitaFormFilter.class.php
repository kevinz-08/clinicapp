<?php

/**
 * Cita filter form base class.
 *
 * @package    clinicapp
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCitaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'paciente_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Paciente'), 'add_empty' => true)),
      'medico_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Medico'), 'add_empty' => true)),
      'fecha'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'hora'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'motivo'      => new sfWidgetFormFilterInput(),
      'estado'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'paciente_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Paciente'), 'column' => 'id')),
      'medico_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Medico'), 'column' => 'id')),
      'fecha'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'hora'        => new sfValidatorPass(array('required' => false)),
      'motivo'      => new sfValidatorPass(array('required' => false)),
      'estado'      => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('cita_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cita';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'paciente_id' => 'ForeignKey',
      'medico_id'   => 'ForeignKey',
      'fecha'       => 'Date',
      'hora'        => 'Text',
      'motivo'      => 'Text',
      'estado'      => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
