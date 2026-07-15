<?php

/**
 * CitaTable
 */
class CitaTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CitaTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Cita');
    }

    /**
     * Arma la consulta del listado aplicando los filtros recibidos
     * (medico, estado y rango de fechas).
     *
     * @param array $filtros
     * @return Doctrine_Query
     */
    public function getQueryFiltrada(array $filtros = array())
    {
        $q = $this->createQuery('c')
          ->leftJoin('c.Paciente p')
          ->leftJoin('c.Medico m')
          ->orderBy('c.fecha DESC, c.hora ASC');

        if (!empty($filtros['medico_id']))
        {
            $q->andWhere('c.medico_id = ?', $filtros['medico_id']);
        }

        if (!empty($filtros['estado']))
        {
            $q->andWhere('c.estado = ?', $filtros['estado']);
        }

        if (!empty($filtros['desde']))
        {
            $q->andWhere('c.fecha >= ?', $filtros['desde']);
        }

        if (!empty($filtros['hasta']))
        {
            $q->andWhere('c.fecha <= ?', $filtros['hasta']);
        }

        return $q;
    }
}
