import $ from 'jquery';

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

        $classbuttons.on('click', e => {
            const $this = $(e.target);
            $body.removeClass(classes);
            $body.addClass($this.attr('data-class'));
        });

        const $resetbutton = $container.find('.accessibility_fontface-resetbtn');
        if ($resetbutton.length) {
            $resetbutton.on('click', () => {
                $body.removeClass(classes);
            });
        }
    });
};
