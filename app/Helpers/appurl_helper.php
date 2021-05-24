<?php

function baseUrl($uri = '', ?string $protocol = null)
{
	return base_url($uri, $protocol);
}

function createGetParam($params, $except = '')
{
	if (! empty($except))
	{
		unset($params[$except]);
	}

	$getQuery = http_build_query ($params);
	return $getQuery;
}
