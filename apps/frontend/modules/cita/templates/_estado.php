<?php $clases = array('pendiente' => 'label-warning', 'atendida' => 'label-success', 'cancelada' => 'label-default') ?>
<span class="label <?php echo isset($clases[$cita->getEstado()]) ? $clases[$cita->getEstado()] : 'label-default' ?>">
  <?php echo $cita->getEstadoLabel() ?>
</span>
