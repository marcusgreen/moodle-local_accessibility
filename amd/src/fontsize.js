import $ from 'jquery';
import { initoptionrange } from './optionrange';
import { saveOptionConfig } from './common';

export const init = (defaultclass = undefined) => {
    const classnames = [
        'accessibility-fontsize-050',
        'accessibility-fontsize-075',
        'accessibility-fontsize-125',
        'accessibility-fontsize-150',
        'accessibility-fontsize-175',
        'accessibility-fontsize-200'
    ];

    $(() => {
        const $body = $('body');

        const getuserdefault = () => {
            if (!defaultclass) {
                return undefined;
            }
            const match = /accessibility\-fontsize\-(\d+)/.exec(defaultclass);
            if (!match) {
                return undefined;
            }
            return parseFloat(match[1]) / 100;
        };

        initoptionrange('accessibility_fontsize', async(size) => {
            $body.removeClass(classnames);
            if (parseFloat(size) === 1.0) {
                await saveOptionConfig('fontsize', null);
                return;
            }
            const classname = 'accessibility-fontsize-' + Math.round(parseFloat(size) * 100).toString().padStart(3, '0');
            if (classnames.indexOf(classname) < 0) {
                return;
            }
            $body.addClass(classname);
            await saveOptionConfig('fontsize', classname);
        }, getuserdefault());
    });
};
