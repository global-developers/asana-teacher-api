<?php

/*
 |------------------------------------------------
 | 
 |------------------------------------------------
 */
if(!function_exists('page_prop'))
{
	function page_prop(array $page_prop = array())
	{
		return implode(' ', array_map(function($prop, $value){return $prop.'="'.$value.'"';},array_keys($page_prop), $page_prop));
	}
}

/*
 |------------------------------------------------
 |
 |------------------------------------------------
 */
if (!function_exists('process_parent_nav')) {
	/**
	 * @param array $nav_item
	 * @return string 
	 */
	function process_parent_nav(array $nav_item)
	{
		$nav_htm = '';
		
		$url = isset($nav_item["url"]) ? $nav_item["url"] : "#";
		$url_target = isset($nav_item["url_target"]) ? 'target="'.$nav_item["url_target"].'"' : "";
		$icon_badge = isset($nav_item["icon_badge"]) ? '<em>'.$nav_item["icon_badge"].'</em>' : '';
		$icon = isset($nav_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$nav_item["icon"].'">'.$icon_badge.'</i>' : "";
		$nav_title = isset($nav_item["title"]) ? $nav_item["title"] : "(No Name)";
		$label_htm = isset($nav_item["label_htm"]) ? $nav_item["label_htm"] : "";
		$nav_htm .= '<a href="'.$url.'" '.$url_target.' title="'.$nav_title.'">'.$icon.' <span class="menu-item-parent">'.$nav_title.'</span>'.$label_htm.'</a>';

		if (isset($nav_item["sub"]) && $nav_item["sub"])
			$nav_htm .= process_sub_nav($nav_item["sub"]);

		return '<li '.(isset($nav_item["active"]) ? 'class = "active"' : '').'>'.$nav_htm.'</li>';
	}
}

/*
 |------------------------------------------------
 |
 |------------------------------------------------
 */
if(!function_exists('process_sub_nav'))
{
	/**
	 * @param array $nav_item
	 * @return $sub_item_htm string
	 */
	function process_sub_nav($nav_item) {
		$sub_item_htm = "";
		if (isset($nav_item["sub"]) && $nav_item["sub"]) {
			$sub_nav_item = $nav_item["sub"];
			$sub_item_htm = process_sub_nav($sub_nav_item);
		} else {
			$sub_item_htm .= '<ul>';
			foreach ($nav_item as $key => $sub_item) {
				$url = isset($sub_item["url"]) ? $sub_item["url"] : "#";
				$url_target = isset($sub_item["url_target"]) ? 'target="'.$sub_item["url_target"].'"' : "";
				$icon = isset($sub_item["icon"]) ? '<i class="fa fa-lg fa-fw '.$sub_item["icon"].'"></i>' : "";
				$nav_title = isset($sub_item["title"]) ? $sub_item["title"] : "(No Name)";
				$label_htm = isset($sub_item["label_htm"]) ? $sub_item["label_htm"] : "";
				$sub_item_htm .=
					'<li '.(isset($sub_item["active"]) ? 'class = "active"' : '').'>
						<a href="'.$url.'" '.$url_target.'>'.$icon.' '.$nav_title.$label_htm.'</a>
						'.(isset($sub_item["sub"]) ? process_sub_nav($sub_item["sub"]) : '').'
					</li>';
			}
			$sub_item_htm .= '</ul>';
		}
		return $sub_item_htm;
	}
}

if(!function_exists('cut_name'))
{
	function cut_name($full_name) {
		$name = explode(" ", $full_name);
		if (isset($name[0]) && isset($name[2]))
			$full_name = implode(" ", [$name[0], $name[2]]);				
		return $full_name;
	}
}