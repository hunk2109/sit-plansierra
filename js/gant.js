var cumulativeOffset = function(element) {
    var top = 0, left = 0;
    do {
        top += element.offsetTop  || 0;
        left += element.offsetLeft || 0;
        element = element.offsetParent;
    } while(element);

    return {
        top: top,
        left: left
    };
};

CanvasRenderingContext2D.prototype.roundRect = function (x, y, w, h, r) {
  if (w < 2 * r) r = w / 2;
  if (h < 2 * r) r = h / 2;
  this.beginPath();
  this.moveTo(x+r, y);
  this.arcTo(x+w, y,   x+w, y+h, r);
  this.arcTo(x+w, y+h, x,   y+h, r);
  this.arcTo(x,   y+h, x,   y,   r);
  this.arcTo(x,   y,   x+w, y,   r);
  this.closePath();
  return this;
}

function roundRect(ctx, x, y, width, height, radius, fill, stroke) {
  if (typeof stroke == "undefined" ) {
    stroke = true;
  }
  if (typeof radius === "undefined") {
    radius = 5;
  }
  ctx.beginPath();
  ctx.moveTo(x + radius, y);
  ctx.lineTo(x + width - radius, y);
  ctx.quadraticCurveTo(x + width, y, x + width, y + radius);
  ctx.lineTo(x + width, y + height - radius);
  ctx.quadraticCurveTo(x + width, y + height, x + width - radius, y + height);
  ctx.lineTo(x + radius, y + height);
  ctx.quadraticCurveTo(x, y + height, x, y + height - radius);
  ctx.lineTo(x, y + radius);
  ctx.quadraticCurveTo(x, y, x + radius, y);
  ctx.closePath();
  if (stroke) {
    ctx.stroke();
  }
  if (fill) {
    ctx.fill();
  }        
}

function rectangle() {

    this.color = "red";
	this.height = 30; 
	this.width = 160;
	this.x = 100;
	this.y = 100;
    this.draw = function() {
		context.beginPath();
		context.strokeStyle = "#df4b26";
		context.lineJoin = "round";
		context.lineWidth = 5;

		context.rect(this.x, this.y, this.width, this.height);
		
		var my_gradient=context.createLinearGradient(this.width-100+this.x,0+this.y,this.width+this.x,-50+this.y);
		my_gradient.addColorStop(0,this.color);
		my_gradient.addColorStop(1,"white");
		context.fillStyle=my_gradient;
		
		//context.fillStyle = this.color;
		context.save();
		context.shadowColor = '#999';
		context.shadowBlur = 20;
		context.shadowOffsetX = 15;
		context.shadowOffsetY = 15;
		context.fill();
		context.restore();
		
		context.lineWidth = 7;
		context.strokeStyle = 'black';
		context.stroke();
	
    };
}
function canvas_arrow(context, fromx, fromy, tox, toy){
    var headlen = 10;   // length of head in pixels
    var angle = Math.atan2(toy-fromy,tox-fromx);
	context.beginPath();
	context.lineWidth = 2;
	context.strokeStyle = '#444444';

    context.moveTo(fromx, fromy);
    context.lineTo(tox, toy);
    context.lineTo(tox-headlen*Math.cos(angle-Math.PI/6),toy-headlen*Math.sin(angle-Math.PI/6));
    context.moveTo(tox, toy);
    context.lineTo(tox-headlen*Math.cos(angle+Math.PI/6),toy-headlen*Math.sin(angle+Math.PI/6));
	context.stroke();
}
//context = document.getElementById('canvasInAPerfectWorld').getContext("2d");
var canvasWidth = 800;
var canvasHeight = 600;
var task_title_width = 100;
var maxt=0;//don't change estimated later
var scale=50;
var canvas_left_offset=10;
var rect_list=[]; 
var canvas;
var arrow_start_x;
var arrow_start_y;
var arrow_end_x;
var arrow_end_y;
var dragok = false;
var origin_rect = -1;
var dest_rect = -1;
var gantTool = -1;
var editor;

function getRectId(x, y){
	var ret = -1
	for (var i = 0; i < rect_list.length; i++){
		var r = rect_list[i];
		if (x > r.x && x < (r.x+r.width) &&
				y > r.y && y < (r.y+r.height))
		{
			ret = r.task.id ;
			console.log("rectangle clicked:"+r.task.id );
		}
	}
	return ret;
}
function dialogClose(){
	$('#myDialog').html(" ");
	
	var data=$("#jsondef").val();
	var subtask = editor.getValue();	
	var d= jQuery.parseJSON(data)
	for (i = 0 ; i < d.tasks.length; i++){
		if (d.tasks[i].id == subtask.id ) {
			d.tasks[i] = subtask;
			$("#jsondef").val(JSON.stringify(d));
			redraw(d);
			break
		}
	}
	console.log(editor.getValue());
}
function infoTask(origin){
	var data=$("#jsondef").val();
		
	var d= jQuery.parseJSON(data)
	for (i = 0 ; i < d.tasks.length; i++){
		if (d.tasks[i].id == origin ) {
			$('#myDialog').dialog ("open");
			var element = document.getElementById('myDialog');

			JSONEditor.defaults.options.theme = 'bootstrap2';
			var default_schema =  {
			  type: "object",
			  title: "Subtask",
			  properties: {
				name: {type: "string"},
				estado: {
				  type: "string",
				  enum: [
					"inactivo",
					"iniciado",
					"completado",
				  ],default: "inactivo"
				},
				responsable: {
				  type: "string"
				},
				duration:{ type: "number"},
				avisar_a:{
					type:"string"
				}
					//red
				//tipo analisis
				
			  }
			}
			// Set an option during instantiation
			editor = new JSONEditor(element, {
			  //theme: 'bootstrap2',
			  disable_properties: true,
			  disable_collapse:true,
			  //no_additional_properties: true,
			  schema: default_schema,
			  startval: d.tasks[i]
			});
			
			editor.on('ready',function() {
				
				// Now the api methods will be available
				var errors= editor.validate();
				if(errors.length) {
				// errors is an array of objects, each with a `path`, `property`, and `message` parameter
				// `property` is the schema keyword that triggered the validation error (e.g. "minLength")
				// `path` is a dot separated path into the JSON object (e.g. "root.path.to.field")
					console.log(errors);
				}
				else {
				// It's valid!
				}
			});
			break;
		}
	}
}
function conectTask(origin, dest){
	var data=$("#jsondef").val();
		
	var d= jQuery.parseJSON(data)
	for (i = 0 ; i < d.tasks.length; i++){
		if (d.tasks[i].id == dest ) {
			d.tasks[i].pre.push(origin);
			$("#jsondef").val(JSON.stringify(d));
			redraw(d);

			break;
		}
	}
}
function deleteTask(origin){
	var data=$("#jsondef").val();
		
	var d= jQuery.parseJSON(data)
	for (var i = 0 ; i < d.tasks.length; i++){
		for (var j = d.tasks[i].pre.length-1; j >= 0; j--){
			if (d.tasks[i].pre[j] == origin){
				d.tasks[i].pre.splice(j,1);
			}
		}
	}
	for (i = 0 ; i < d.tasks.length; i++){
		if (d.tasks[i].id == origin ) {
			d.tasks.splice(i, 1);
			$("#jsondef").val(JSON.stringify(d));
			redraw(d);
			break;
		}
	}
}

function myMove(e){
	if (dragok){
		var off = cumulativeOffset(canvas);
		arrow_end_x = (e.pageX - off.left)*canvas.width/canvas.clientWidth;
		arrow_end_y = (e.pageY - off.top)*canvas.height/canvas.clientHeight;
		var data=$("#jsondef").val();
		var jdata = jQuery.parseJSON(data)
		redraw(jdata);
		canvas_arrow(context, arrow_start_x, arrow_start_y, arrow_end_x, arrow_end_y);

	}
}

function myDown(e){
	var off = cumulativeOffset(canvas);

	arrow_start_x = (e.pageX - off.left)*canvas.width/canvas.clientWidth;
	arrow_start_y = (e.pageY - off.top)*canvas.height/canvas.clientHeight;

	origin_rect = getRectId(arrow_start_x, arrow_start_y);
	if (origin_rect > -1 ){

		if (gantTool == 1)//delete
		{	
			deleteTask(origin_rect);
		}else if (gantTool == 2)//link
		{
			dragok = true;
			canvas.onmousemove = myMove;
		}else if (gantTool == 3)//info
		{
			infoTask(origin_rect);
		}
	}
}
function myUp(){
	dest_rect = getRectId(arrow_end_x, arrow_end_y);
	if (dragok == true && 
	origin_rect > -1 && dest_rect > -1)
	{
		conectTask(origin_rect, dest_rect)
	}
	dragok = false;
	canvas.onmousemove = null;
}


function drawGantt(){
	var canvasDiv = document.getElementById('canvasDiv');
	canvas = document.createElement('canvas');
	canvas.setAttribute('width', canvasWidth);
	canvas.setAttribute('height', canvasHeight);
	canvas.setAttribute('id', 'canvas');
	canvas.setAttribute('class', 'col-md-11');
	canvasDiv.appendChild(canvas);
	if(typeof G_vmlCanvasManager != 'undefined') {
		canvas = G_vmlCanvasManager.initElement(canvas);
	}
	context = canvas.getContext("2d");
	var data=$("#jsondef").val();
	var jdata = jQuery.parseJSON(data)
	redraw(jdata);
	$("div#myDialog").dialog ({
		autoOpen : false,
		close: dialogClose
	});	

	$('#canvas').on('mousemove', myMove);
	$('#canvas').on('mousedown',myDown); 
	$('#canvas').on('mouseup', myUp);	
	
	$('#update_btn').on('click', function(e){
		var data=$("#jsondef").val();
		var jdata = jQuery.parseJSON(data)
		redraw(jdata);
    });
	$('#zoomplus_btn').on('click', function(e){
		scale=scale*1.5;
		var data=$("#jsondef").val();
		var jdata = jQuery.parseJSON(data)
		redraw(jdata);
    });	
	$('#zoomminus_btn').on('click', function(e){
		scale=scale*0.7;
		var data=$("#jsondef").val();
		var jdata = jQuery.parseJSON(data)
		redraw(jdata);
    });	
	$('#zoomleft_btn').on('click', function(e){
		canvas_left_offset-=1*scale;
		if (canvas_left_offset < (50 - maxt*scale) ) canvas_left_offset = (50 - maxt*scale); 
		var data=$("#jsondef").val();
		var jdata = jQuery.parseJSON(data)
		redraw(jdata);
    });	
	$('#zoomright_btn').on('click', function(e){
		canvas_left_offset+=1*scale;
		if (canvas_left_offset >50 ) canvas_left_offset = 50; 
		var data=$("#jsondef").val();
		var jdata = jQuery.parseJSON(data)
		redraw(jdata);
    });
	$('#delete_btn').on('click', function(e){
		gantTool = 1;
    });
	$('#link_btn').on('click', function(e){
		gantTool = 2;
    });
	$('#info_btn').on('click', function(e){
		gantTool = 3;
    });
	$('#otro_btn').on('click', function(e){
		gantTool = -1;
    });
}

//funcion recursiva que calcula el camino más corto
function getStart(d, ii){
	var j;
	var duration=0; 
	var i; 
	for (var k = 0; k < d.tasks.length; k++){
		if (d.tasks[k].id == ii ){
			i = k;
			if (d.tasks[i].pre.length == 0){
				return d.tasks[i].duration;
			}else{
				for (j = 0; j < d.tasks[i].pre.length; j++){
					var d1 = getStart(d,d.tasks[i].pre[j]);
					duration = duration > d1? duration: d1; 
				}
				return duration+d.tasks[i].duration; 
			}
			break;
		}
	}

}
function vertical_lines(count){
	var i ; 
	var header = 20;
	context.beginPath();
	context.moveTo(0, header);
	context.lineTo(canvas.width, header);
	context.lineWidth = 1;
	context.strokeStyle = '#aaaaaa';
	context.lineCap = 'butt';
	context.stroke();
	context.fillStyle = "blue";
	context.font = "bold 8px Arial";
	for (i = 0 ; i < count; i++){
	  context.beginPath();
      context.moveTo(i*scale+canvas_left_offset+task_title_width, header);
      context.lineTo(i*scale+canvas_left_offset+task_title_width, canvas.height );
      context.lineWidth = 1;
      context.strokeStyle = '#aaaaaa';
      context.lineCap = 'butt';
      context.stroke();
	  context.fillText(i, i*scale+canvas_left_offset+task_title_width, header - 2);

	}
}


function redraw( d ){
	
	context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas
	var i ; 
	var y = 50;
	maxt=0;
	rect_list=[];
	for (i = 0 ; i < d.tasks.length; i++){
		var r1 = new rectangle();
		r1.color='blue';
		r1.width=d.tasks[i].duration*scale;
		r1.y = y ;
		y = y + r1.height + 10; 
		var start = getStart(d, d.tasks[i].id);
		r1.x = task_title_width+canvas_left_offset+start*scale-r1.width;
		r1.draw();
		r1.task = d.tasks[i];
		maxt =  maxt > start ? maxt : start;
		context.fillStyle = "black";
		context.font = "bold 12px Arial";
		context.fillText(d.tasks[i].name,  20, y -(r1.height/2));
		rect_list.push(r1);
	}
	
    vertical_lines(maxt+1);

	context.beginPath();
	context.strokeStyle = "white";
	context.lineWidth = 1;
	context.rect(0, 0, task_title_width, canvas.height);	
	context.fillStyle = 'white';
	context.save();
	context.fill();
	context.restore();
	context.strokeStyle = 'white';
	context.stroke();
	var y = 50;
	var r1 = new rectangle();	
	for (i = 0 ; i < d.tasks.length; i++){
		y = y + r1.height + 10; 
		context.fillStyle = "black";
		context.font = "bold 12px Arial";
		context.fillText(d.tasks[i].name,  20, y -(r1.height/2));

	}
			
	// for(var i=0; i < clickX.length; i++) {		
	// context.beginPath();
	// if(clickDrag[i] && i){
	  // context.moveTo(clickX[i-1], clickY[i-1]);
	 // }else{
	   // context.moveTo(clickX[i]-1, clickY[i]);
	 // }
	 // context.lineTo(clickX[i], clickY[i]);
	 // context.closePath();
	 // context.stroke();
	// }
}
