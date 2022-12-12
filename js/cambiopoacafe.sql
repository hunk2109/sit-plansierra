SELECT poa_cafe.ano,
    poa_cafe.fomento AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'tareas_fomentadas'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.rehabilitacion AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'tareas_rehabilitadas'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.mantenimiento AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'mantenimiento'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.plantulas_cafe AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'plantulas'::text AS descripcion
  FROM poa_cafe
  UNION 
  SELECT poa_cafe.ano,
    poa_cafe.plantas_cafe AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'plantas'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.plantas_sombra AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'plantas_sombra'::text AS descripcion
  FROM poa_cafe
  UNION
    SELECT poa_cafe.ano,
    poa_cafe.plantas_cafe AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'tareas_captadas'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.visitas_vive AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'visitas_vivero'::text AS descripcion
  FROM poa_cafe
  UNION  
  SELECT poa_cafe.ano,
    poa_cafe.visita_plan AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'visitas_plan'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.plantacion_superv AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'plantacion_supervivencia'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.asociaciones_eval AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'asociaciones_evaluadas'::text AS descripcion
  FROM poa_cafe
  UNION 
  SELECT poa_cafe.ano,
    poa_cafe.finaciam_mont AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'monto_financiado'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.tareas_financ AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'tareas_financiadas'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.charla_cap AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'charlas_captacion'::text AS descripcion
  FROM poa_cafe
  UNION 
  SELECT poa_cafe.ano,
    poa_cafe.diacampo_cap AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'diacampo_capacitacion'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.demostrac_cap AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'demostracion_capacitacion'::text AS descripcion
  FROM poa_cafe
  UNION
  SELECT poa_cafe.ano,
    poa_cafe.otras_cap AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'otras_capacitacion'::text AS descripcion
  FROM poa_cafe;

 
  
  
  