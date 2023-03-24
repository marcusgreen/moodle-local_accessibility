import $ from 'jquery';

export const init = () => {
    $(() => {
        const $moodlefooterbuttons = $('.btn-footer-popover');
        if (!$moodlefooterbuttons.length) {
            return;
        }
        $moodlefooterbuttons.css('bottom', '5rem');
    });
};
