<?php

require_once(__DIR__ . '/../../config.php');
global $DB;

$PAGE->set_url(new moodle_url('/local/message/manage.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Manage_messages');

$messages = $DB->get_records('local_message');
var_dump($messages);
echo $OUTPUT->header();

$templatecontext = (object)[
    'messages' => array_values($messages),
    'editurl'=> new moodle_url('/local/message/edit.php'),
    //'time'=>date('m/d/Y H:i:s', $messages['timeread'])
];
echo $OUTPUT->render_from_template('local_message/manage', $templatecontext);

echo $OUTPUT->footer();

