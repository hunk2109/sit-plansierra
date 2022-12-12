SELECT 
  poa_valores.parametro, 
  poa_parametros.parametro, 
  poa_parametros.hoja,
  sum(poa_valores.valor::float
  ) 
 


FROM 
  public.poa_parametros, 
  public.poa_valores
WHERE 
  poa_valores.codigo_parametro = poa_parametros.id
  GROUP BY
 poa_parametros.parametro,
  poa_valores.parametro,
  poa_parametros.hoja
  ;
