{include file='common/header.tpl'}

<link href="{$BASE_URL}css/requests.css" rel="stylesheet">
<script src="{$BASE_URL}js/pagination.js"></script>

{if $account == 'Admin'}
<script src="{$BASE_URL}js/requestListAdmin.js"></script>
{else}
<script src="{$BASE_URL}js/requestListStudent.js"></script>
{/if}

<input type="hidden" name="userID" value={$userID}>

<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Requests</h2>
{if $account == 'Admin'}
{include file='request/requestListAdmin.tpl'}
{else}
  {include file='request/requestListStudent.tpl'}
{/if}
</div>
<!-- END OF CONTAINER -->

{include file='common/footer.tpl'}
