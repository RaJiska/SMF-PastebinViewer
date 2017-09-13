<?php

if (!defined('SMF'))
  die('Hacking attempt...');

function PastebinViewer_Process($post)
{
	if (!(preg_match_all('/\[pastebin\](.*?)\[\/pastebin\]/s', $post, $results)))
		return $post;
	foreach ($results[0] as $result)
	{
		preg_match('/(http|https)\:\/\/pastebin.com\/(.*?)$/s', $result, $pasteid);
		if (count($pasteid) >= 3)
			$pasteid = $pasteid[2];
		$replace = "<iframe src=\"https://pastebin.com/embed_iframe/$pasteid\" style=\"border:none;width:100%;height:400px\"></iframe>";
		$post = str_replace($result, $replace, $post);
	}
	return $post;
}
