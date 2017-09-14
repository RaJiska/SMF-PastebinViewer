<?php

if (!defined('SMF'))
  die('Hacking attempt...');

function PastebinViewer_Process($post)
{
	if (!(preg_match_all('/\[pastebin\](.*?)\[\/pastebin\]/s', $post, $results)))
		return $post;
	foreach ($results as $key => $result)
	{
		preg_match('/(http|https)\:\/\/pastebin.com\/(.*?)$/s', $results[1][$key], $pasteid);
		if (count($pasteid) >= 3)
			$pasteid = $pasteid[2];
		$replace = "<iframe src=\"https://pastebin.com/embed_iframe/$pasteid\" style=\"border:none;width:100%;height:400px\"></iframe>";
		$post = str_replace($results[0][$key], $replace, $post);
	}
	return $post;
}
