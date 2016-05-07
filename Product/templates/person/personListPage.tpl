{include file='common/header.tpl'}
 
 <link href="{$BASE_URL}css/personList.css" rel="stylesheet">
<link href="{$BASE_URL}css/search.css" rel="stylesheet">
<script src="{$BASE_URL}js/search.js"></script>
<script src="{$BASE_URL}js/personList.js"></script>

<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Person List</h2>
<input type="hidden" id="pageCount" value="{$people.0.nrPages}">

{include file='common/search.tpl'}

{include file='person/personList.tpl'}

<div class="clearfix"></div>
  	<ul class="pagination pull-right">
  	</ul>

</div>
<!-- END OF CONTAINER -->

{include file='common/footer.tpl'}
