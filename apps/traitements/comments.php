if (isset($_POST['action']))
{
	$action = $_POST['action'];
	if ($action == 'create')
	{
		if (isset($_POST['title'], $_POST['content'], $_POST['picture']))
		{
			$manager = new ArticleManager($db);
			$article = $manager->create($_POST['title'], $_POST['content'], $_POST['picture'], "toto");
			header('Location: index.php?page=article&id='.$article->getId());
			exit;
		}
	}
}
