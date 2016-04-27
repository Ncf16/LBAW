<?php /* Smarty version Smarty-3.1.15, created on 2016-04-27 20:59:24
         compiled from "C:\xampp\htdocs\LBAW\frmk\templates\tweets\list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1200257210c0cc90ff7-45352443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac9aca8cff1fc13ad4a9070b0cfb7c27798f9f4f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\LBAW\\frmk\\templates\\tweets\\list.tpl',
      1 => 1461783544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1200257210c0cc90ff7-45352443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tweets' => 0,
    'BASE_URL' => 0,
    'tweet' => 0,
    'last_tweet_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57210c0ccc4f76_10929138',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57210c0ccc4f76_10929138')) {function content_57210c0ccc4f76_10929138($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<section id="tweets">
  <h2>Tweets</h2>

  <div id="new_tweets"></div>

  <?php  $_smarty_tpl->tpl_vars['tweet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tweet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tweets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tweet']->key => $_smarty_tpl->tpl_vars['tweet']->value) {
$_smarty_tpl->tpl_vars['tweet']->_loop = true;
?>

  <article class="tweet-data">
    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['tweet']->value['photo'];?>
">
    <span class="realname"><?php echo $_smarty_tpl->tpl_vars['tweet']->value['realname'];?>
</span>
    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/tweets/list_user.php?username=<?php echo $_smarty_tpl->tpl_vars['tweet']->value['username'];?>
" class="username">@<?php echo $_smarty_tpl->tpl_vars['tweet']->value['username'];?>
</a>

    <span class="time"><?php echo $_smarty_tpl->tpl_vars['tweet']->value['time'];?>
</span>
    <div class="tweet-text"><?php echo $_smarty_tpl->tpl_vars['tweet']->value['text'];?>
</div>
  </article>

  <?php } ?>

</section>

<script>last_tweet_id = <?php echo $_smarty_tpl->tpl_vars['last_tweet_id']->value;?>
</script>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/tweets.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
