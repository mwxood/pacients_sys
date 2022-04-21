const dataPicker = () => {

    const getDatePickerTitle = elem => {
        // From the label or the aria-label
        const label = elem.nextElementSibling;
        let titleText = '';
        if (label && label.tagName === 'LABEL') {
            titleText = label.textContent;
        } else {
            titleText = elem.getAttribute('aria-label') || '';
        }
        return titleText;
    }

    Datepicker.locales.bg = {
        days: ["Неделя", "Понеделник", "Вторник", "Сряда", "Четвъртък", "Петък", "Събота"],
        daysShort: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        daysMin: ["Нд", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
        months: ["Януари", "Февруари", "Март", "Април", "Май", "Юни", "Юли", "Август", "Септември", "Октомври", "Ноември", "Декември"],
        monthsShort: ["Ян", "Фев", "Мар", "Апр", "Мау", "Юн", "Юл", "Авг", "Сеп", "Окт", "Ном", "Дек"],
        today: "Today",
        clear: "Clear",
        titleFormat: "MM y",
        format: "mm/dd/yyyy",
        weekstart: 0
    }

    const elems = document.querySelectorAll('.datepicker_input');
    for (const elem of elems) {
        const datepicker = new Datepicker(elem, {
            'format': 'dd/mm/yyyy',
            title: getDatePickerTitle(elem),
            language: 'bg',
        });
    }
}

export default dataPicker;