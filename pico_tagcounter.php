<?php

/**
 * Tag count Pico plugin
 *
 * @author D.B.C.
 * @link https://github.com/DBC-Works
 * @license http://opensource.org/licenses/MIT
 */
class Pico_TagCounter {
	private $count_tag;
	private $tag_counter;

	/*
	 * Constructor
	 */
	public function __construct() {
		$this->tag_counter = array();
	}

	/*
	 * Callback functions
	 */
	public function plugins_loaded() {
	}

	public function config_loaded(&$settings) {
	}

	public function request_url(&$url) {
	}

	public function before_load_content(&$file)	{
	}

	public function after_load_content(&$file, &$content) {
	}

	public function before_404_load_content(&$file) {
	}
	
	public function after_404_load_content(&$file, &$content) {
	}

	public function before_read_file_meta(&$headers) {
		$headers['count_tag'] = 'CountTag';
	}

	public function file_meta(&$meta) {
		$this->count_tag = $meta['count_tag'];
	}

	public function before_parse_content(&$content) {
	}

	public function after_parse_content(&$content) {
	}

	public function get_page_data(&$data, $page_meta) {
	}

	public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page) {
		if ($this->count_tag != NULL) {
			foreach ($pages as $page) {
				$tags = $page['tags'];
				if (!is_array($tags)) {
					$tags = explode(',', $tags);
				}
				foreach ($tags as $tag) {
					if ($tag != '') {
						if (isset($this->tag_counter[$tag])) {
							$this->tag_counter[$tag] += 1;
						}
						else {
							$this->tag_counter[$tag] = 1;
						}
					}
				}
			}
		}
	}

	public function before_twig_register() {
	}

	public function before_render(&$twig_vars, &$twig, &$template) {
		if ($this->count_tag != NULL) {
			arsort($this->tag_counter);
			$twig_vars['tag_count'] = $this->count_tag == 'ForClient'
									? json_encode($this->tag_counter)
									: $this->tag_counter;
		}
	}

	public function after_render(&$output) {
	}
}

?>
