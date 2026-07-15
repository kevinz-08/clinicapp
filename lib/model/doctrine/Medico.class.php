<?php

/**
 * Medico
 *
 * @package    clinicapp
 * @subpackage model
 */
class Medico extends BaseMedico
{
  /**
   * Especialidades disponibles en la clinica.
   */
  public static function getEspecialidades()
  {
    return array(
      'Medicina General' => 'Medicina General',
      'Pediatria'        => 'Pediatria',
      'Cardiologia'      => 'Cardiologia',
      'Dermatologia'     => 'Dermatologia',
      'Ginecologia'      => 'Ginecologia',
      'Odontologia'      => 'Odontologia',
    );
  }

  public function getNombreCompleto()
  {
    return $this->getNombre().' '.$this->getApellido();
  }

  public function __toString()
  {
    return sprintf('%s - %s', $this->getNombreCompleto(), $this->getEspecialidad());
  }
}
