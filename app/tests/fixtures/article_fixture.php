<?php
/* Article Fixture generated on: 2011-07-27 07:07:21 : 1311778221 */
class ArticleFixture extends CakeTestFixture {
	var $name = 'Article';

	var $fields = array(
		'id' => array('type'=>'integer', 'type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'content' => array('type'=>'text', 'type' => 'text', 'null' => true, 'default' => NULL),
		'filename' => array('type'=>'string', 'type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'filename' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>