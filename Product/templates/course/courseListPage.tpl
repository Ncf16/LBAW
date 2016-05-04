{include file='common/header.tpl'}
 
<link href="{$BASE_URL}css/courseList.css" rel="stylesheet">
<link href="{$BASE_URL}css/search.css" rel="stylesheet">
<script src="{$BASE_URL}js/search.js"></script>


<!-- CONTAINER -->
<div class="container">

<h2 class="page-header">Course List</h2>
<p>
  A course may take up to 3 years if it is a Bachelor's Degree or 5 years if it is a Master's or PhD. <br>Futhermore each course contains multiple curricular units grouped by year.
</p>
{include file='common/search.tpl'}

{include file='course/courseList.tpl'}



</div>
<!-- END OF CONTAINER -->

{include file='common/footer.tpl'}
