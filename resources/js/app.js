require('bootstrap');
require('./script');

// icon
require('./fontawesome');

// navbar
require('./nav');

import Dropzone from 'dropzone';

// // mdbootstrap
import * as mdb from 'mdb-ui-kit'; // lib
import { Input } from 'mdb-ui-kit'; // module

// dropzone
document.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;

window.$=window.jQuery=require('jquery');
require('./announcementImages');