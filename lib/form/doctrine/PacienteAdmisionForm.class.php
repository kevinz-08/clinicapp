<?php

/**
 * Formulario de admision: registra un paciente junto con su primera cita
 * en una sola vista (formulario de Cita embebido en el de Paciente).
 *
 * @package    clinicapp
 * @subpackage form
 */
class PacienteAdmisionForm extends PacienteForm
{
  public function configure()
  {
    parent::configure();

    $cita = new Cita();
    $cita->Paciente = $this->getObject();

    $citaForm = new CitaForm($cita);
    unset($citaForm['paciente_id']);

    $this->embedForm('cita', $citaForm);
  }
}
