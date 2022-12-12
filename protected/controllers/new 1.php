function actionGetActividadTodaActividad($finicial,$ffinal){
		//quitar el -1 de ((extract (year from current_date))-1) una vez engamos datos reales
		$mbd = new PDO('pgsql:host=localhost;port=5432;dbname=jbsoft', 'postgres', 'postgres');
		$rs = array();
		                 

		foreach($mbd->query('SELECT 

			
			sig_tipo_de_plantacion.fase as tipo_plantacion,
			count (ss_tipo_actividad.descripcion) as numero,
			sum(ss_control_supervision.cantidad_tarea) as tareas
			
  
		FROM 
			public.ss_control_supervision, 
			public.ss_tipo_actividad,
			public.ss_tipo_de_plantacion,
			public.sig_tipo_de_plantacion
	
 
 
		WHERE 
			ss_control_supervision.codigo_tipo_actividad = ss_tipo_actividad.codigo_tipo_actividad
			AND (ss_control_supervision.fecha_de_inspeccion >='.$finicial.' and ss_control_supervision.fecha_de_inspeccion <='.$ffinal.')  AND
			ss_control_supervision.codigo_tipo_de_plantacion = ss_tipo_de_plantacion.codigo_tipo_de_plantacion AND
			

			public.ss_tipo_de_plantacion.descripcion=public.sig_tipo_de_plantacion.descripcion and
sig_tipo_de_plantacion.fase <> \'Otros1\'
		GROUP BY   sig_tipo_de_plantacion.fase
		Order by sum(ss_control_supervision.cantidad_tarea) DESC' ) as $fila) {
			
		$b = null;
			$b['tipo'] = $fila['tipo_plantacion'];
			$b['plantas'] = (int)$fila['numero'];
			$b['tareas'] = (float)$fila['tareas'];
		
			array_push($rs, $b);
						
		}	
		echo json_encode($rs);
		
	}