import $ from 'jquery';
import { saveOptionConfig } from './common';

export const init = () => {
    $(() => {
        const $body = $('body');
        const $container = $('#accessibility_fontface-container');
        if (!$container.length) {
            return;
        }

        const $classbuttons = $container.find('.accessibility_fontface-classbtn');
        const classes = [...$classbuttons].map(x => $(x).attr('data-class')).filter(x => x);
        if (!classes.length) {
            return;
        }

        $classbuttons.on('click', async(e) => {
            const classname = $(e.target).attr('data-class');
            $body.removeClass(classes);
            $body.addClass(classname);
            await saveOptionConfig('fontface', classname);
        });

        const $resetbutton = $container.find('.accessibility_fontface-resetbtn');
        if ($resetbutton.length) {
            $resetbutton.on('click', async() => {
                $body.removeClass(classes);
                await saveOptionConfig('fontface', null);
            });
        }
    });
};
