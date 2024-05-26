import Alpine from 'alpinejs'
import rupiahFormatPlugin from './components/rupiahFormatPlugin.js'
import fetchData from './components/fetchData.js';


Alpine.data('fetchData', fetchData)
Alpine.plugin(rupiahFormatPlugin)

window.Alpine = Alpine

Alpine.start()