{include file='common/header.tpl'}

<link href="{$BASE_URL}css/addPerson.css" rel="stylesheet">

<div class="container">
	<h2 class="page-header">Account Creation</h2>
	<div class="well">

		<div class="well well-sm">
			<div id="creation_toggle" data-toggle="buttons">
				<label class="btn btn-primary active">
					<input  type="radio" name="quantity" value="individual" checked> Individual
				</label>
				<label class="btn btn-primary">
					<input type="radio" name="quantity" value="multiple"> Multiple
				</label>
			</div>
		</div>

		{include file='admin/addPersonIndividual.tpl'}

		{include file='admin/addPersonMultiple.tpl'}

	</div>
</div>

<script src="{$BASE_URL}js/peopleCreation.js"></script>

{include file='common/footer.tpl'}