 <?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . "database/person.php");

  $PEOPLE_PER_PAGE = 10;
  $page = 1;


  $nrPeople = countPeople()['nrpeople'];   // Count everyone, whether they are on the page or not
  $nrPages = ceil($nrPeople/$PEOPLE_PER_PAGE);


  if(!is_numeric($_GET['page']) || $_GET['page'] < 1){
  	header('Location: ' . $BASE_URL . 'pages/Person/personList.php?page=1');
  	exit;
  }else if($_GET['page'] > $nrPages && $nrPages > 0){
  	header('Location: ' . $BASE_URL . 'pages/Person/personList.php?page=' . $nrPages);
  }else{
  	$page = $_GET['page'];
  }

  //WHAT IF THERE ARE NO PEOPLE?

  $people = getPeople($page, $PEOPLE_PER_PAGE);
  $people[0]['totalCount'] = $nrPeople;
  $people[0]['nrPages'] = $nrPages;

  $smarty->assign('people', $people);
  $smarty->display('person/personListPage.tpl');
?>
