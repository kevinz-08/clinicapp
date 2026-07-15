<?php

/**
 * Cita
 *
 * @package    clinicapp
 * @subpackage model
 */
class Cita extends BaseCita
{
  /**
   * Estados posibles de una cita.
   */
  public static function getEstados()
  {
    return array(
      'pendiente' => 'Pendiente',
      'atendida'  => 'Atendida',
      'cancelada' => 'Cancelada',
    );
  }

  public function getEstadoLabel()
  {
    $estados = self::getEstados();

    return isset($estados[$this->getEstado()]) ? $estados[$this->getEstado()] : $this->getEstado();
  }
}
