/*
 * Importing the Axios library for making HTTP requests
 *
 * Axios is a promise-based HTTP client for the browser and Node.js.
 * It provides a simple and easy-to-use API for performing various HTTP requests such as GET, POST, PUT, DELETE. So on
 * Axios supports request and response interceptors, transformation of request and response data, cancellation of requests, and automatic transformation of JSON data.
 *
 * Key Features:
 * – Make XMLHttpRequests from the browser
 * – Make HTTP requests from Node.js
 * – Supports the Promise API
 * – Intercept request and response
 * – Transform request and response data
 * – Cancel requests
 * – Automatic transforms for JSON data
 * – Client-side support for protecting against XSRF
 *
 * Documentation: https://axios-http.com/docs/intro
 */
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/*
 * Importing the Bootstrap library for styling and responsive design
 *
 * Bootstrap is a popular front-end open-source toolkit for developing with HTML, CSS, and JS.
 * It includes design templates for typography, forms, buttons, navigation, and other interface components, as well as optional JavaScript extensions.
 *
 * Key Features:
 * – Responsive grid system
 * – Extensive prebuilt components
 * – Powerful plugins built on jQuery
 * – Sass variables and mixins for customization
 *
 * Documentation: https://getbootstrap.com/docs/5.3/
 */
import 'bootstrap';

/*
 * Importing the D3.js library for data-driven document manipulation
 *
 * D3.js is a powerful open-source library for producing dynamic, interactive data visualizations in web browsers.
 * It uses HTML, SVG, and CSS to bring data to life, allowing for intricate and highly customizable visual representations.
 * D3.js supports a wide array of visualizations such as bar charts, pie charts, line charts, scatter plots, and more.
 * Its flexibility and efficiency make it a favorite among data analysts and developers.
 *
 * Key Features:
 * – Flexible and powerful data manipulation
 * – Wide range of visualization types
 * – Interactive and dynamic data binding
 * – Highly customizable with support for transitions and animations
 * – Works well with large datasets
 * – Extensive community and plugin support
 * – Integrates seamlessly with web standards (HTML, SVG, CSS)
 *
 * Documentation: https://d3js.org/
 */
import * as d3 from "d3";
window.d3 = d3;

/*
 * Importing the Alpine.js framework for minimal and declarative JavaScript behavior
 *
 * Alpine.js is a lightweight JavaScript framework designed to handle simple interactions,
 * often used for UI components like dropdowns, modals, and tabs.
 * It allows developers to enhance the interactivity of their web applications with minimal effort,
 * leveraging a declarative style similar to Vue.js, but without the overhead of a large framework.
 *
 * Key Features:
 * – Simple, declarative API for handling frontend interactions
 * – Lightweight and minimal footprint
 * – Reactive data binding with minimal JavaScript
 * – Works well with existing frameworks or on its own
 * – No build tools or complex setup required
 * – Two-way data binding and event handling
 *
 * Documentation: https://alpinejs.dev/start-here
 */
import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.start();
