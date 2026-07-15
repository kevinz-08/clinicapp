<?php

/**
 * Medico form base class.
 *
 * @method Medico getObject() Returns the current form's model object
 *
 * @package    clinicapp
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMedicoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'registro_medico' => new sfWidgetFormInputText(),
      'nombre'          => new sfWidgetFormInputText(),
      'apellido'        => new sfWidgetFormInputText(),
      'especialidad'    => new sfWidgetFormInputText(),
      'email'           => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'registro_medico' => new sfValidatorString(array('max_length' => 30)),
      'nombre'          => new sfValidatorString(array('max_length' => 100)),
      'apellido'        => new sfValidatorString(array('max_length' => 100)),
      'especialidad'    => new sfValidatorString(array('max_length' => 50)),
      'email'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Medico', 'column' => array('registro_medico')))
    );

    $this->widgetSchema->setNameFormat('medico[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Medico';
  }

}
