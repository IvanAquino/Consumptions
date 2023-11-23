import './bootstrap';
import 'flowbite';
import dayjs from 'dayjs';
import utc from 'dayjs/plugin/utc';
import timezone from 'dayjs/plugin/timezone';

dayjs.extend(utc);
dayjs.extend(timezone);

window.convertDateToUserTimezone = function (date) {
    const formats = {
        // All Mexico timezones
        'America/Mexico_City': 'DD/MM/YYYY HH:mm',
        'America/Cancun': 'DD/MM/YYYY HH:mm',
        'America/Merida': 'DD/MM/YYYY HH:mm',
        'America/Monterrey': 'DD/MM/YYYY HH:mm',
        'America/Matamoros': 'DD/MM/YYYY HH:mm',
        'America/Mazatlan': 'DD/MM/YYYY HH:mm',
        'America/Chihuahua': 'DD/MM/YYYY HH:mm',
        'America/Ojinaga': 'DD/MM/YYYY HH:mm',
        'America/Hermosillo': 'DD/MM/YYYY HH:mm',
        'America/Tijuana': 'DD/MM/YYYY HH:mm',
        'America/Bahia_Banderas': 'DD/MM/YYYY HH:mm',
    };

    let tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
    const format = formats[tz] || 'YYYY-MM-DD HH:mm:ss';
    return dayjs.utc(date).tz(tz).format(format);
};
