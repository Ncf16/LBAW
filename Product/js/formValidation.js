$(document).ready(function() {

    $('#newMeth').on('click', addMethods);
    $('#newProf').on('click', addMethods);
});

function addMethods(){

	var newMethod = $('<div/>').addClass('panel panel-default form-group');

	typeMethod(newMethod);
	classesMethod(newMethod);
	hoursMethod(newMethod);

	var buttonProfessor = $('<button/>').attr('type','button').addClass('btn btn-default').attr('id','newProf').text('Add New Professor');
	newMethod.append(buttonProfessor);
	$('#methods').append(newMethod);
}

function typeMethod(root){

	var parallelCols = $('<div/>').addClass('col-md-4');
	var label = $('<label/>').addClass('col-md-2 control-label').text('Type');
	var container = $('<div/>').addClass('col-md-9 inputGroupContainer');
	var inputGroup = $('<div/>').addClass('input-group').append($('<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>'));
	
	container.append(inputGroup);
	parallelCols.append(label);
	parallelCols.append(container);

	select = $('<select/>').attr('name','unit_type').attr('required','required').addClass('form-control')
	select.append($('<option selected="selected">Select Type</option>'));
	select.append($('<option>Lectures</option>'));
	select.append($('<option>Laboratory Practice</option>'));

	inputGroup.append(select);
	root.append(parallelCols);	
}


function classesMethod(root){

	var parallelCols = $('<div/>').addClass('col-md-4');
	var label = $('<label/>').addClass('col-md-2 control-label').text('Classes');
	var container = $('<div/>').addClass('col-md-9 inputGroupContainer');
	var inputGroup = $('<div/>').addClass('input-group').append($('<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>'));
	
	container.append(inputGroup);
	parallelCols.append(label);
	parallelCols.append(container);

	inputGroup.append($('<input name="unit_classes" placeholder="Number of classes" class="form-control" type="text">'));
	root.append(parallelCols);
}

function hoursMethod(root){

	var parallelCols = $('<div/>').addClass('col-md-4');
	var label = $('<label/>').addClass('col-md-2 control-label').text('Hours');
	var container = $('<div/>').addClass('col-md-9 inputGroupContainer');
	var inputGroup = $('<div/>').addClass('input-group').append($('<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>'));
	
	container.append(inputGroup);
	parallelCols.append(label);
	parallelCols.append(container);

	inputGroup.append($('<input name="unit_hours" placeholder="0" class="form-control"  type="number" min="1" max="6">'));
	root.append(parallelCols);
}