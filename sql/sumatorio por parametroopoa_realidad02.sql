SELECT 
  resumen_actividad_ano_actual.codigo_tipo_actividad, 
  resumen_actividad_ano_actual.tipo_actividad, 
  resumen_actividad_ano_actual.tipo_plantacion, 
  resumen_actividad_ano_actual.numero, 
  resumen_actividad_ano_actual.tareas, 
  resumen_actividad_poa_actual.codigo_tipo_de_plantacion, 
   resumen_actividad_poa_actual.codigo_tipo_actividad,
  resumen_actividad_poa_actual.descripcion, 
  resumen_actividad_poa_actual.hoja, 
  resumen_actividad_poa_actual.sum
FROM 


  public.resumen_actividad_ano_actual FULL JOIN  
  public.resumen_actividad_poa_actual
on 
  resumen_actividad_ano_actual.tipo_plantacion = resumen_actividad_poa_actual.descripcion and ( resumen_actividad_poa_actual.codigo_tipo_actividad::int=1 and  resumen_actividad_ano_actual.codigo_tipo_actividad::int=1)
WHERE
   resumen_actividad_poa_actual.codigo_tipo_actividad::int=1
   


 