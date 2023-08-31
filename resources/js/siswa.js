import { TempusDominus } from '@eonasdan/tempus-dominus';

new TempusDominus(document.getElementById('jam_mulai'), {
  display: {
    viewMode: 'clock',
    components: {
      decades: false,
      year: false,
      month: false,
      date: false,
      hours: true,
      minutes: true,
      seconds: false
    },
  },
  localization: {
    format: 'HH:mm:ss',
  }
});

new TempusDominus(document.getElementById('jam_akhir'), {
    display: {
      viewMode: 'clock',
      components: {
        decades: false,
        year: false,
        month: false,
        date: false,
        hours: true,
        minutes: true,
        seconds: false
      },
    },
    localization: {
      format: 'HH:mm:ss',
    }
  });