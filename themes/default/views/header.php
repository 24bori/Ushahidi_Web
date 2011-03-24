<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title><?php echo $site_name; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo $header_block; ?>
<?php
// Action::header_scripts - Additional Inline Scripts from Plugins
Event::run('ushahidi_action.header_scripts');
?>
<link rel="shortcut icon" href="/ushahidi/media/img/favicon.ico" type="image/x-icon" />
</head>

<body id="page">
<!-- wrapper -->
<div class="rapidxwpr floatholder">

<!-- header -->
<div id="header">

<!-- searchbox -->
<div id="searchbox">
<!-- languages -->
<?php echo $languages;?>
<!-- / languages -->

<!-- searchform -->
<?php echo $search; ?>
<!-- / searchform -->

</div>
<!-- / searchbox -->

<!-- logo -->
<div id="logo">

<h1><a href="/"><img src="/ushahidi//media/img/logo.gif" alt="東北沖地震 震災情報サイト sinsai.info: 3/11 東北地方太平洋沖地震,Earthquake Tohoku area in Japan 3/11" /></a></h1>
<span class="dnone"><?php echo $site_tagline; ?></span>

</div>
<!-- / logo -->

<!-- submit incident -->
<?php echo $submit_btn; ?>
<!-- / submit incident -->

</div>
<!-- / header -->

<!-- main body -->
<div id="middle">
<div class="background layoutleft">

<!-- mainmenu -->
<div id="mainmenu">
<ul>
<!-- <?php nav::main_tabs($this_page); ?> -->
<?php
$menu = "";

// Home
$menu .= "<li><a href=\"".url::site()."main\" ";
$menu .= ($this_page == 'home') ? " class=\"active\"" : "";
$menu .= ">".Kohana::lang('ui_main.home')."</a></li>";

// Reports List
$menu .= "<li><a href=\"".url::site()."reports\" ";
$menu .= ($this_page == 'reports') ? " class=\"active\"" : "";
$menu .= ">".Kohana::lang('ui_main.reports')."</a></li>";

// Reports Submit
//if (Kohana::config('settings.allow_reports'))
//{
//$menu .= "<li><a href=\"".url::site()."reports/submit\" ";
//$menu .= ($this_page == 'reports_submit') ? " class=\"active\"":"";
//$menu .= ">".Kohana::lang('ui_main.submit')."</a></li>";
//}

// Alerts
$menu .= "<li><a href=\"".url::site()."alerts\" ";
$menu .= ($this_page == 'alerts') ? " class=\"active\"" : "";
$menu .= ">".Kohana::lang('ui_main.alerts')."</a></li>";

// Contacts
if (Kohana::config('settings.site_contact_page'))
{
$menu .= "<li><a href=\"".url::site()."contact\" ";
$menu .= ($this_page == 'contact') ? " class=\"active\"" : "";
$menu .= ">".Kohana::lang('ui_main.contact')."</a></li>";	
}

// Custom Pages
$pages = ORM::factory('page')->where('page_active', '1')->find_all();
foreach ($pages as $page)
{
$menu .= "<li><a href=\"".url::site()."page/index/".$page->id."\" ";
$menu .= ($this_page == 'page_'.$page->id) ? " class=\"active\"" : "";
$menu .= ">".$page->page_tab."</a></li>";
}

echo $menu;
?>
</ul>

</div>
<!-- / mainmenu -->
