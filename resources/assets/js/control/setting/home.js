/**
 * Created by targaryen on 2017/4/8.
 */
//noinspection NpmUsedModulesInstalled
require('simple-module');
require('simple-hotkeys');
//noinspection NpmUsedModulesInstalled
require('simple-uploader');
require('to-markdown');
require('marked');
require('simditor-markdown');

const $ = require('jquery');
let Simditor = require('simditor');
let textarea = $('#storyDesc');

if (textarea.length > 0) {
    new Simditor({
        textarea: textarea,
        markdown: false,
        toolbar: ['bold', 'italic', 'strikethrough', 'blockquote', 'alignment']
    });
}
