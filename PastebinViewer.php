<?php

if (!defined('SMF'))
  die('Hacking attempt...');

function PastebinViewer_Process($post)
{
	if (!(preg_match_all('/\[pastebin\](.*?)\[\/pastebin\]/s', $post, $results))
		return $post;
	foreach ($results[0] as $result)
	{
		$pasteid = preg_match('/(http|https)\:\/\/pastebin.com\/(.*?)$/s', $result);
		$replace = "[html]<iframe src=\"https://pastebin.com/embed_iframe/$pasteid\" style=\"border:none;width:100%\"></iframe>[/html]";
		$post = str_replace($result, $replace, $post);
	}
	return $post;
}
