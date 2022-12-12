
  
  
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.superficiesist AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
  FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.cantidad_productores AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.sistemasriego AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.superficieriego AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'superficie riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.capacitacion AS suma,
    0 AS cuenca,
    0 AS microcuenca,
    'capacitacion'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  
  
   SELECT poa_familiar_sit.ano,
    poa_familiar_sit.baosup AS suma,
    1 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.baoprod AS suma,
    1 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.baoriego AS suma,
    1 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  
  
  
   
  
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.aminasup AS suma,
    2 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.aminaprod AS suma,
    2 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.aminariego AS suma,
    2 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  
  
  
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.maosup AS suma,
    3 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.maoprod AS suma,
    3 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.maoriego AS suma,
    3 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  
  
   SELECT poa_familiar_sit.ano,
    poa_familiar_sit.guayubinsup AS suma,
    4 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.guayubinprod AS suma,
    4 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.guayubinriego AS suma,
    4 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.maguacasup AS suma,
    5 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.maguacaprod AS suma,
    5 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.maguacariego AS suma,
    5 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.chacueysup AS suma,
    6 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.chacueyprod AS suma,
    6 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.chacueyriego AS suma,
    6 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  
  
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.gurabosup AS suma,
    7 AS cuenca,
    0 AS microcuenca,
    'superficie sist'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.guraboprod AS suma,
    7 AS cuenca,
    0 AS microcuenca,
    'cantidad productores'::text AS descripcion
   FROM poa_familiar_sit
  UNION
  SELECT poa_familiar_sit.ano,
    poa_familiar_sit.guraboriego AS suma,
    7 AS cuenca,
    0 AS microcuenca,
    'sistemas riego'::text AS descripcion
 FROM poa_familiar_sit