

// ARMAR OBJETO JSON


var contadorModulo = 0,
	contadorCurso = 0,
	br = '<br>',
	htmlPanel = '<input type="hidden" name="moduloxxx" value="yyy"><div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title"><strong>Módulo: </strong> yyy<button data-bloque="#bloqueCursosxxx" class="agregarCurso btn btn-primary btn-xs pull-right" data-modulo="moduloxxx" type="button"><span class="glyphicon glyphicon-plus-sign"></span> Agregar curso</button></h3></div><div id="bloqueCursosxxx" class="panel-body"></div></div>',
	htmlPanelBody = '<div class="form-group"><input name="_modulo_cursoxxx[]" type="text" class="form-control" placeholder="Titulo de curso"><input name="pruebaxxx[]" type="text" class="form-control" placeholder="Ingrese pruebas separados por coma"><button class="removerCurso btn btn-xs btn-danger pull-right" type="button"><span class="glyphicon glyphicon-plus-sign"></span> Quitar curso</button></div>';
	bloqueModulos = $('.bloqueModulos'),
	modulo = $('#modulo');
$(document).ready(function() {
	$('#agregarModulo').click(function() {
		tituloModulo = $.trim(modulo.val());
		if (tituloModulo.length == 0) {
			alert('Ingrese el título de módulo.');
			modulo.focus();
			return;
		}
		contadorModulo++;
		html = htmlPanel.replace('xxx', modulo.val());
		html = html.replace('yyy', contadorModulo);
		bloqueModulos.append(html);
		modulo.val('');
	});
	$('body').on('click', '.agregarCurso', function() {
		html = htmlPanelBody.replace('xxx', modulo.val());
	})
});
