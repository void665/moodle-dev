<?php
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/message/classes/form/edit.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/message/edit.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Edit_messages');

$mform = new edit();


if ($mform->is_cancelled()) {
    redirect($CFG->wwwroot . '/local/message/manage.php', 'You canceled');
} else if ($fromform = $mform->get_data()) {
    $recordtoinsert = new stdClass();
    $recordtoinsert->messagetext = $fromform->messagetext;
    $recordtoinsert->messagetype = $fromform->messagetype;

    $DB->insert_record('local_message', $recordtoinsert);

    redirect($CFG->wwwroot . '/local/message/manage.php', 'Message with title "'.$fromform->messagetext. '" created');
}

echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
