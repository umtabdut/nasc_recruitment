	<?php
	define('ORG', 'National Assembly Service Commission');
	define('CHARS', 'aaaabbbbccccddddeeeeffffgggghhhhiiiijjjjkkkkllllmmmmnnnnooooppppqqqqrrrrssssttttuuuuvvvvwwwwxxxxyyyyzzzz-AAAABBBBCCCCDDDDEEEEFFFFGGGGHHHHIIIIJJJJKKKKLLLLMMMMNNNNOOOOPPPPQQQQRRRRSSSSTTTTUUUUVVVVWWWWXXXXYYYYZZZZ_000111222333444555666777888999');
	define('CHARS_HEX', 'aabbccddeeff000111222333444555666777888999');

	$current_page_name = explode('.', basename($_SERVER['PHP_SELF']));
	$current_page_name_only = $current_page_name[0];

	// SEVER VARIABLES
	define ('SITE_HOST', $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] );
	define ('SITE_NAME', 'recruitment');
	//define ('SITE_COM', '');
	// define ('SITE_COM', '.com');

	// there is need of adding the site_name after the host
	// define ('SITE', SITE_HOST .'/umtab');
	define ('SITE', SITE_HOST);

	
	// there is need of adding the site_name after the host
	// define ('SITE_DOMAIN_NAME', SITE_HOST .'/umtab');
	define ('SITE_DOMAIN_NAME', SITE_HOST);
	define ('CURRENT_TIMESTAMP',  time());
	define ('PAGE', SITE_HOST ."". $_SERVER['REQUEST_URI'] );
	define ('PAGE_NAME', $current_page_name_only );

	//URL FILE EXTENSIONS
	define('DOT_HTML', '.html');
	define('DOT_PHP', '.php');

	define ('SUM_XS_TXT', 80);
	define ('SUM_MIN_TXT', 120);
	define ('SUM_MID_TXT', 180);
	define ('SUM_MAX_TXT', 240);

	$page = isset($_GET['page']) ? $_GET['page'] : 0;
	$limit=0; // GET IT FROM THE USE TABLE
	$limit = $limit > 0 ? $limit : 20;

	define ('LMT_PER_PG', $limit);

	$start = ($page > 1 ? ceil($page * LMT_PER_PG - LMT_PER_PG) : 0);
	define ('START', $start);

	//line break
	define('BR', '<br>');
	define('SPACE', '&nbsp;');

	$loggedIn = isset($_SESSION['user_id']) ? true : false;
	define('LOGGED_IN', $loggedIn);

	$tab = isset($_GET['tab']) ? mysqli_real_escape_string($conn, $_GET['tab']) : '';
	
	$u_id = LOGGED_IN ? $_SESSION['user_id'] : 0;
	define('U_ID', $u_id);
	$is_admin = isset($_SESSION['is_admin']) ?  $_SESSION['is_admin'] : false;
	define('IS_ADMIN', $is_admin);