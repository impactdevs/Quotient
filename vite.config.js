import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/fullcalendarcss.css',
                'resources/css/bootstrapicons.css',
                'resources/css/toastify.css',
                'resources/css/bootstraptable.css',
                'resources/css/fontawesomeanimation.css',
                'resources/css/fontawesome.css',
                'resources/css/jquerydatatables.css',
                'resources/css/datatablesDatatables.css',
                'resources/css/select2.css',
                'resources/css/select2_1.css',
                'resources/css/select2bootstrap.css',
                'resources/js/app.js',
                'resources/js/jquery-3.7.1.js',
                'resources/js/toastify.js',
                'resources/js/jquery-datatables.min.js',
                'resources/js/datatables-buttons.min.js',
                'resources/js/buttons.html5.min.js',
                'resources/js/buttons.print.min.js',
                'resources/js/moment.min.js',
                'resources/js/bootstrap-table.min.js',
                'resources/js/tableExport.min.js',
                'resources/js/bootstrap-table-export.min.js',
                'resources/js/select2.min.js',
                'resources/js/custom-dashboard.js',
                'resources/js/custom-js.js'
            ],
            refresh: true,
        }),
    ],
});
