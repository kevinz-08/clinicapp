<?php

/**
 * Paciente form base class.
 *
 * @method Paciente getObject() Returns the current form's model object
 *
 * @package    clinicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePacienteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'documento'        => new sfWidgetFormInputText(),
      'nombre'           => new sfWidgetFormInputText(),
      'apellido'         => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDate(),
      'email'            => new sfWidgetFormInputText(),
      'telefono'         => new sfWidgetFormInputText(),
      'pais_codigo'      => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'documento'        => new sfValidatorString(array('max_length' => 20)),
      'nombre'           => new sfValidatorString(array('max_length' => 100)),
      'apellido'         => new sfValidatorString(array('max_length' => 100)),
      'fecha_nacimiento' => new sfValidatorDate(array('required' => false)),
      'email'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefono'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'pais_codigo'      => new sfValidatorString(array('max_length' => 3, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Paciente', 'column' => array('documento')))
    );

    $this->widgetSchema->setNameFormat('paciente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Paciente';
  }

}
