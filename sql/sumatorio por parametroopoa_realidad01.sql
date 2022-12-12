SELECT 
   public.POA_Tipo_actividad.Codigo_Tipo_de_plantacion,
  public.SS_Tipo_de_plantacion.descripcion ,
  poa_parametros.hoja,
  sum(poa_valores.valor::float  ) ,
  sum(public.resumen_actividad_ano_actual.tareas)
 


FROM 
  public.poa_parametros, 
  public.poa_valores,
  public.ss_tipo_de_plantacion,
  public.poa_tipo_actividad,
  public.resumen_actividad_ano_actual
 
WHERE 
  poa_valores.codigo_parametro = poa_parametros.id and  public.poa_parametros.hoja = public.poa_tipo_actividad.hoja_POA and 
  public.POA_Tipo_actividad.Codigo_Tipo_de_plantacion = public.SS_Tipo_de_plantacion.codigo_tipo_de_plantacion and
  poa_parametros.hoja <> 'POA-Fondo' and
  public.SS_Tipo_de_plantacion.descripcion =  public.resumen_actividad_ano_actual.tipo_plantacion
  
  GROUP BY

  poa_parametros.hoja,
  public.POA_Tipo_actividad.Codigo_Tipo_de_plantacion,
  public.SS_Tipo_de_plantacion.descripcion 
  
  order By
  public.POA_Tipo_actividad.Codigo_Tipo_de_plantacion;
