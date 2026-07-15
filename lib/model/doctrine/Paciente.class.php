<?php

/**
 * Paciente
 *
 * @package    clinicapp
 * @subpackage model
 */
class Paciente extends BasePaciente
{
  public function getNombreCompleto()
  {
    return $this->getNombre().' '.$this->getApellido();
  }

  public function getEdad()
  {
    if (!$this->getFechaNacimiento())
    {
      return null;
    }

    $nacimiento = new DateTime($this->getFechaNacimiento());
    $hoy = new DateTime('today');

    return $nacimiento->diff($hoy)->y;
  }

  public function __toString()
  {
    return sprintf('%s (%s)', $this->getNombreCompleto(), $this->getDocumento());
  }
}
