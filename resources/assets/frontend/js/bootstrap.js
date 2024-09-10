/*
 * Importing the Axios library for making HTTP requests
 *
 * Axios is a promise-based HTTP client for the browser and Node.js.
 * It provides a simple and easy-to-use API for performing various HTTP requests such as GET, POST, PUT, DELETE. So on
 * Axios supports request and response interceptors, transformation of request and response data, cancellation of requests, and automatic transformation of JSON data.
 *
 * Key Features:
 * – Make XMLHttpRequests from the browser
 * – Make HTTP requests from Node.jss
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
