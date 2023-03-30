import $ from 'jquery';

export const init = (optionname, stylename) => {
    $(() => {
        const defaultattrname = `data-default-${stylename}`;
        const $container = $(`#${optionname}-container`);
        if (!$container.length) {
            return;
        }

        const $picker = $container.find(`#${optionname}-picker`);
        if (!$picker.length) {
            return;
        }
        $picker.on('change input propertychange', () => {
            const colour = $picker.val();
            if (!colour) {
                return;
            }
            if (!/#[0-9a-f]{6}/gi.exec(colour)) {
                return;
            }
            for (const element of [...$('*')]) {
                const $element = $(element);
                if (!$element.attr(defaultattrname)) {
                    $element.attr(defaultattrname, $element.css(stylename));
                }
                $element.css(stylename, colour);
            }
        });

        const $img = $container.find('img.colourdialogue');
        if ($img.length) {
            $img.on('click', () => {
                $picker.trigger('change');
            });
        }

        const $resetbtn = $container.find(`.${optionname}-resetbtn`);
        if ($resetbtn.length) {
            $resetbtn.on('click', () => {
                $picker.val('');
                for (const element of [...$('*')]) {
                    const $element = $(element);
                    const defaultcolour = $element.attr(defaultattrname) ?? '';
                    $element.css(stylename, defaultcolour);
                    $element.removeAttr(defaultattrname);
                }
            });
        }
    });
};
