SELECT 

			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_plantacion,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_control,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_cliente,
			"15_Plantacion_completa_sin_geo_facturas_plus".apellido,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre,
			"15_Plantacion_completa_sin_geo_facturas_plus".cedula,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_cuenca,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_microcuenca,
			"15_Plantacion_completa_sin_geo_facturas_plus".cs_destino,
		TO_CHAR ("15_Plantacion_completa_sin_geo_facturas_plus".fecha::date, 'dd/mm/yyyy') as fecha,
			"15_Plantacion_completa_sin_geo_facturas_plus".plantas,
			"15_Plantacion_completa_sin_geo_facturas_plus".tareas,
			"15_Plantacion_completa_sin_geo_facturas_plus".inversion_plantas,
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_factura,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_municipio,
			"15_Plantacion_completa_sin_geo_facturas_plus".tp_descripcion_tipo_plantacion,
			"15_Plantacion_completa_sin_geo_facturas_plus".tp_descripcio_tipo_actividad,
			"15_Plantacion_completa_sin_geo_facturas_plus".nombre_proyecto,
		    fac_labores_codigo_factura.coste_labores,
			 "15_Plantaciones_en_sig".superficie,
			 sig_tipo_de_plantacion.fase
			 
		FROM  public.sig_tipo_de_plantacion,
			((public."15_Plantacion_completa_sin_geo_facturas_plus" left join 
			public.fac_labores_codigo_factura
		on
			"15_Plantacion_completa_sin_geo_facturas_plus".codigo_factura = fac_labores_codigo_factura.codigo_factura) 
			left join public."15_Plantaciones_en_sig" on 

		public."15_Plantaciones_en_sig".de_codigo_plantacion="15_Plantacion_completa_sin_geo_facturas_plus".codigo_plantacion)
		

		where 
		"15_Plantacion_completa_sin_geo_facturas_plus".tp_codigo_tipo_plantacion = sig_tipo_de_plantacion.codigo_tipo_de_plantacion

		