import './bootstrap'; //mengimpor file bootstrap
import '../css/app.css'; //mengimpor file CSS

import { createInertiaApp } from '@inertiajs/react' //menginisialisasi aplikasi Inertia.js dengan React
import { createRoot } from 'react-dom/client'
import Layout from "./Layouts/Layout";


createInertiaApp({
  title: title =>
    title? `${title} - Laravel Inertia React`: "Laravel Inertia React",
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true });
    let page = pages[`./Pages/${name}.jsx`];
        page.default.layout =
         page.default.layout ||((page) => <Layout children={page} />);
        return page;
      },
      setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
    progress: {
      color:"#fff",
      showSpinner: true
    }
});

