<?php
namespace System;

class bb_parser{
	private $bbcode;
	public function __construct(){
		require_once PROJECT_DOCUMENT_ROOT.'/inc/BBcode/stringparser_bbcode.class.php';
		$this->bbcode = new StringParser_BBCode();
		$this->add();
	}
	
	public function convertlinebreaks ($text) {
    	return preg_replace ("/\015\012|\015|\012/", "\n", $text);
	}

	// Alles bis auf Neuezeile-Zeichen entfernen
	public function bbcode_stripcontents ($text) {
    	return preg_replace ("/[^\n]/", '', $text);
	}

	public function do_bbcode_url ($action, $attributes, $content, $params, $node_object) {
    	$action = 'validate';
    	if (!isset ($attributes['default'])) {
        	$url = $content;
        	$text = htmlspecialchars ($content);
    	} else {
        	$url = $attributes['default'];
        	$text = $content;
    	}
    	if ($action == 'validate') {
        	if (substr ($url, 0, 5) == 'data:' || substr ($url, 0, 5) == 'file:'
          		|| substr ($url, 0, 11) == 'javascript:' || substr ($url, 0, 4) == 'jar:') {
            	return false;
        	}
        	return true;
    	}
    	return '<a href="'.htmlspecialchars ($url).'">'.$text.'</a>';
	}

	// Funktion zum Einbinden von Bildern
	public function do_bbcode_img ($action, $attributes, $content, $params, $node_object) {
    	if ($action == 'validate') {
        	if (substr ($content, 0, 5) == 'data:' || substr ($content, 0, 5) == 'file:'
          	|| substr ($content, 0, 11) == 'javascript:' || substr ($content, 0, 4) == 'jar:') {
            	return false;
        	}
        	return true;
    	}
    	return '<img src="'.htmlspecialchars($content).'" alt="">';
	}
	private function add(){
		$this->bbcode->addFilter (STRINGPARSER_FILTER_PRE, 'convertlinebreaks');

		$this->bbcode->addParser (array ('block', 'inline', 'link', 'listitem'), 'htmlspecialchars');
		$this->bbcode->addParser (array ('block', 'inline', 'link', 'listitem'), 'nl2br');
		$this->bbcode->addParser ('list', 'bbcode_stripcontents');

		$this->bbcode->addCode ('b', 'simple_replace', null, array ('start_tag' => '<b>', 'end_tag' => '</b>'),
                  'inline', array ('listitem', 'block', 'inline', 'link'), array ());
		$this->bbcode->addCode ('i', 'simple_replace', null, array ('start_tag' => '<i>', 'end_tag' => '</i>'),
                  'inline', array ('listitem', 'block', 'inline', 'link'), array ());
		$this->bbcode->addCode ('url', 'usecontent?', 'do_bbcode_url', array ('usecontent_param' => 'default'),
                  'link', array ('listitem', 'block', 'inline'), array ('link'));
		$this->bbcode->addCode ('link', 'callback_replace_single', 'do_bbcode_url', array (),
                  'link', array ('listitem', 'block', 'inline'), array ('link'));
		$this->bbcode->addCode ('img', 'usecontent', 'do_bbcode_img', array (),
                  'image', array ('listitem', 'block', 'inline', 'link'), array ());
		$this->bbcode->addCode ('bild', 'usecontent', 'do_bbcode_img', array (),
                  'image', array ('listitem', 'block', 'inline', 'link'), array ());
		$this->bbcode->setOccurrenceType ('img', 'image');
		$this->bbcode->setOccurrenceType ('bild', 'image');
		$this->bbcode->setMaxOccurrences ('image', 2);
		$this->bbcode->addCode ('list', 'simple_replace', null, array ('start_tag' => '<ul>', 'end_tag' => '</ul>'),
                  'list', array ('block', 'listitem'), array ());
		$this->bbcode->addCode ('*', 'simple_replace', null, array ('start_tag' => '<li>', 'end_tag' => '</li>'),
                  'listitem', array ('list'), array ());
		$this->bbcode->setCodeFlag ('*', 'closetag', BBCODE_CLOSETAG_OPTIONAL);
		$this->bbcode->setCodeFlag ('*', 'paragraphs', true);
		$this->bbcode->setCodeFlag ('list', 'paragraph_type', BBCODE_PARAGRAPH_BLOCK_ELEMENT);
		$this->bbcode->setCodeFlag ('list', 'opentag.before.newline', BBCODE_NEWLINE_DROP);
		$this->bbcode->setCodeFlag ('list', 'closetag.before.newline', BBCODE_NEWLINE_DROP);
		$this->bbcode->setRootParagraphHandling (true);		
	}
	
	public function pars_Text($text){
		return $this->bbcode->parse($text);
	}
	
}
?>