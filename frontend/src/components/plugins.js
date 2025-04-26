import { createVuetify } from 'vuetify';
import 'vuetify/styles';
import '@mdi/font/css/materialdesignicons.css'; // Ensure MDI Icons are loaded

export default createVuetify({
  icons: {
    defaultSet: 'mdi', // Use MDI Icons
  },
});
