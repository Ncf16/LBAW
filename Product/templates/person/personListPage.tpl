{include file='common/header.tpl'}
 
 <link href="{$BASE_URL}css/personList.css" rel="stylesheet">
<link href="{$BASE_URL}css/search.css" rel="stylesheet">
<script src="{$BASE_URL}js/search.js"></script>

<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Person List</h2>

{include file='common/search.tpl'}

{include file='person/personList.tpl'}

<div id="page_buttons">

</div>

</div>
<!-- END OF CONTAINER -->

{include file='common/footer.tpl'}
